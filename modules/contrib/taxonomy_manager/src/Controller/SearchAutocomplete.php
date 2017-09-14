<?php

namespace Drupal\taxonomy_manager\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\taxonomy\VocabularyInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Component\Utility\Tags;
use Drupal\Component\Utility\Unicode;
use Drupal\Core\Database\Database;

/**
 * Controller routines for taxonomy_manager routes.
 */
class SearchAutocomplete  extends ControllerBase {

  /**
   * List of vocabularies, which link to Taxonomy Manager interface.
   *
   * @return array
   *   A render array representing the page.
   */
  public function ListTerm(Request $request, VocabularyInterface $taxonomy_vocabulary = NULL) {
    $result = [];
    // Get the typed string from the URL, if it exists.
    if ($input = $request->query->get('q')) {
      $typed_string = Tags::explode($input);
      $typed_string = Unicode::strtolower(array_pop($typed_string));
      $db = Database::getConnection();
      $query = $db->select('taxonomy_term_field_data', 'tfd');
      $query->groupBy('name');
      $query->fields('tfd', ['name']);

      $query->condition('vid', $taxonomy_vocabulary->id(), "=");
      $query->condition('name', '%' .$typed_string . '%', "LIKE");
      $result = $query->execute()->fetchCol();
    }

    return new JsonResponse($result);
  }
}