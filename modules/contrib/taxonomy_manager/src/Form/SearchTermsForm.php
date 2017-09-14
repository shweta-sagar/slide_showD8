<?php

namespace Drupal\taxonomy_manager\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\taxonomy\TermStorageInterface;
use Drupal\taxonomy\VocabularyInterface;
use Drupal\Core\Url;
use Drupal\Core\Database\Database;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Form for deleting given terms.
 */
class SearchTermsForm extends FormBase {

  /**
   * The taxonomy term storage.
   *
   * @var \Drupal\taxonomy\TermStorageInterface
   */
  protected $termStorage;

  /**
   * @var \Drupal\Core\Database\Database $database
   */
  protected $database;

  /**
   * MoveTermsForm constructor.
   *
   * @param \Drupal\taxonomy\TermStorageInterface $termStorage
   *   The taxonomy term storage.
   *
   */
  public function __construct(TermStorageInterface $termStorage) {
    $this->termStorage = $termStorage;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
        $container->get('entity_type.manager')->getStorage('taxonomy_term')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, VocabularyInterface $taxonomy_vocabulary = NULL, $selected_terms = []) {

    // Cache form state so that we keep the parents in the modal dialog.
    $form_state->setCached(TRUE);
    $form['voc'] = ['#type' => 'value', '#value' => $taxonomy_vocabulary];
    $form['search_string'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Search String'),
      '#autocomplete_route_name' => 'taxonomy_manager.admin_vocabulary.searchautocomplete',
      '#autocomplete_route_parameters' => ['taxonomy_vocabulary' => $taxonomy_vocabulary->id()],
      '#required' => TRUE,
      '#description' => $this->t('You can search directly for exisiting terms. If your input doesn\'t match an existing term, it will be used for filtering root level terms (useful for non-hierarchical vocabularies).'),
    ];
    if (!empty($selected_terms)) {
      $form['selected_terms'] = ['#type' => 'hidden', '#value' => $selected_terms];
      $form['search_option'] = [
          '#type' => 'checkbox',
          '#title' => $this->t('Search under selected terms.'),
      ];
    }

    $form['search_button'] = [
      '#type' => 'submit',
      '#value' => $this->t('Search'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {

  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    /**
     * @var VocabularyInterface
     */
    $taxonomy_vocabulary = $form_state->getValue('voc');
    $db = Database::getConnection();
    $query = $db->select('taxonomy_term_field_data', 'tfd');
    $query->fields('tfd', ['tid', 'name']);
    $query->condition('vid', $taxonomy_vocabulary->id(), "=");
    if ($form_state->getValue('search_option')) {
      $selected_terms = self::getChildTerm($form_state->getValue('selected_terms'));
      foreach ($selected_terms as $selected_term) {
        foreach ($selected_term as $term) {
          $selected_term_list[] = $term;
        }
      }
      $query->condition('tid', $selected_term_list, "IN");
    }
    $search_string = $form_state->getValue('search_string');
    $search_terms = explode(', ', $search_string);
    $db_or = db_or();
    foreach ($search_terms as $search_term) {
      $db_or->condition('name', '%' . $search_term . '%', "LIKE");
    }
    $result = $query->condition($db_or)
        ->execute()->fetchAllKeyed();
    $search_keys = [];
    foreach ($result as $key => $row) {
      $search_keys[] = $key;
      $search_link = \Drupal::l(t($row), Url::fromRoute('taxonomy_manager.admin_vocabulary', ['taxonomy_vocabulary' => $taxonomy_vocabulary->id(), 'term_id' => $key]));
      drupal_set_message(t('@link (' . $key . ')', ['@link' => $search_link]));
    }
    if (!empty($search_keys)) {
      $form_state->setRedirect('taxonomy_manager.admin_vocabulary', ['taxonomy_vocabulary' => $taxonomy_vocabulary->id(), 'tid' => $search_keys[0], 'terms' => $search_keys]);
    }
    else {
      $form_state->setRedirect('taxonomy_manager.admin_vocabulary', ['taxonomy_vocabulary' => $taxonomy_vocabulary->id()]);
    }
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'taxonomy_manager.search_form';
  }

  /**
   * Helper function that returns the number of child terms.
   */
  public static function getChildTerm($tid) {
    static $tids = [];
    $tids[] = $tid;
    $database = Database::getConnection();
    $query = $database->select('taxonomy_term_hierarchy', 'h');
    $query->fields('h');
    $query->condition('h.parent', $tid, 'IN');
    $result = $query->execute()->fetchCol();
    if (!empty($result)) {
      SearchTermsForm::getChildTerm($result);
    }
    return $tids;
  }

}
