<?php

/* modules/contrib/views_slideshow/templates/views-slideshow-pager-field-item.html.twig */
class __TwigTemplate_f4a369621c02288e5e8757ae70694c8f81c8ea78bcd74265f8efdf417aeb7720 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array();
        $filters = array();
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array(),
                array(),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setTemplateFile($this->getTemplateName());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 18
        echo "<div id=\"views_slideshow_pager_field_item_";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["location"]) ? $context["location"] : null), "html", null, true));
        echo "_";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["vss_id"]) ? $context["vss_id"] : null), "html", null, true));
        echo "_";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["count"]) ? $context["count"] : null), "html", null, true));
        echo "\" ";
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["attributes"]) ? $context["attributes"] : null), "addClass", array(0 => (isset($context["classes"]) ? $context["classes"] : null)), "method"), "html", null, true));
        echo ">
  ";
        // line 19
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, (isset($context["item"]) ? $context["item"] : null), "html", null, true));
        echo "
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/views_slideshow/templates/views-slideshow-pager-field-item.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 19,  43 => 18,);
    }

    public function getSource()
    {
        return "{#
/**
 * @file
 * Default theme implementation for a views slideshow pager item.
 *
 * Available variables:
 * - classes: Classes to apply to the element.
 * - count: The page number.
 * - location: Location of pager.
 * - item: Rendered field(s) making up item.
 * - vss_id: The slideshow's id.
 *
 * @see template_preprocess_views_slideshow_pager_field_item()
 *
 * @ingroup vss_templates
 */
#}
<div id=\"views_slideshow_pager_field_item_{{ location }}_{{ vss_id }}_{{ count }}\" {{ attributes.addClass(classes) }}>
  {{ item }}
</div>
";
    }
}
