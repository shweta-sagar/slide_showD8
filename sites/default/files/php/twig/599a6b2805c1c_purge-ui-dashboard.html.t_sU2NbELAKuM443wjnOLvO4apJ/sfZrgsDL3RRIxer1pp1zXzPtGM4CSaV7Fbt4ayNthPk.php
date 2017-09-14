<?php

/* modules/contrib/purge/modules/purge_ui/templates/purge-ui-dashboard.html.twig */
class __TwigTemplate_70261aef11cfba3fba8a937de47adde0a8a65acaf5c4d34c1192440b64ae577e extends Twig_Template
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
        $filters = array("without" => 18);
        $functions = array();

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array(),
                array('without'),
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

        // line 11
        echo "<div class=\"layout-purgeui-dashboard clearfix\">
  ";
        // line 12
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["build"]) ? $context["build"] : null), "info", array()), "html", null, true));
        echo "
  <div class=\"layout-region layout-region-purgeui-secondary\">
    ";
        // line 14
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["build"]) ? $context["build"] : null), "diagnostics", array()), "html", null, true));
        echo "
    ";
        // line 15
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute((isset($context["build"]) ? $context["build"] : null), "logging", array()), "html", null, true));
        echo "
  </div>
  <div class=\"layout-region layout-region-purgeui-main\">
    ";
        // line 18
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, twig_without((isset($context["build"]) ? $context["build"] : null), "logging", "diagnostics", "info"), "html", null, true));
        echo "
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/purge/modules/purge_ui/templates/purge-ui-dashboard.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 18,  55 => 15,  51 => 14,  46 => 12,  43 => 11,);
    }

    public function getSource()
    {
        return "{#
/**
 * @file
 * Two column template borrowed from node-edit-form.html.twig to show the
 * diagnostics overview right on the Purge configuration dashboard.
 *
 * Available variables:
 * - build: The render array.
 */
#}
<div class=\"layout-purgeui-dashboard clearfix\">
  {{ build.info }}
  <div class=\"layout-region layout-region-purgeui-secondary\">
    {{ build.diagnostics }}
    {{ build.logging }}
  </div>
  <div class=\"layout-region layout-region-purgeui-main\">
    {{ build|without('logging', 'diagnostics', 'info') }}
  </div>
</div>
";
    }
}
