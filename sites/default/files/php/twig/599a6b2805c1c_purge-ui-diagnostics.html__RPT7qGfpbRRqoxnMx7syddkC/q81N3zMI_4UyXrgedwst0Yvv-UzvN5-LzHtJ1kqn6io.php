<?php

/* modules/contrib/purge/modules/purge_ui/templates/purge-ui-diagnostics.html.twig */
class __TwigTemplate_11ae18a018f5b9d9baec5f3637de2582f6d9bbca9039e3d095d0c7fa327b1fe5 extends Twig_Template
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
        $tags = array("for" => 20, "if" => 21);
        $filters = array("split" => 36);
        $functions = array("attach_library" => 17);

        try {
            $this->env->getExtension('sandbox')->checkSecurity(
                array('for', 'if'),
                array('split'),
                array('attach_library')
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

        // line 17
        echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->env->getExtension('drupal_core')->attachLibrary("purge_ui/diagnostics"), "html", null, true));
        echo "
<table class=\"purge-ui-diagnostic-report\">
  <tbody>
  ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["diagnostics"]) ? $context["diagnostics"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["diagnostic"]) {
            // line 21
            echo "    ";
            if (($this->getAttribute($context["diagnostic"], "severity_status", array()) == "ok")) {
                // line 22
                echo "    <tr class=\"purge-ui-diagnostic-report__entry purge-ui-diagnostic-report__entry--";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["diagnostic"], "severity_status", array()), "html", null, true));
                echo " color-success\">
    ";
            } else {
                // line 24
                echo "    <tr class=\"purge-ui-diagnostic-report__entry purge-ui-diagnostic-report__entry--";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["diagnostic"], "severity_status", array()), "html", null, true));
                echo " color-";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["diagnostic"], "severity_status", array()), "html", null, true));
                echo "\">
    ";
            }
            // line 26
            echo "      ";
            if (twig_in_filter($this->getAttribute($context["diagnostic"], "severity_status", array()), array(0 => "warning", 1 => "error"))) {
                // line 27
                echo "        <td class=\"purge-ui-diagnostic-report__status-title purge-ui-diagnostic-report__status-icon purge-ui-diagnostic-report__status-icon--";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["diagnostic"], "severity_status", array()), "html", null, true));
                echo "\">
      ";
            } else {
                // line 29
                echo "        <td class=\"purge-ui-diagnostic-report__status-title\">
      ";
            }
            // line 31
            echo "        ";
            echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["diagnostic"], "title", array()), "html", null, true));
            echo "
      </td>
      <td>
        <div class=\"purge-ui-diagnostic-report__entry__value\">
          ";
            // line 35
            if (twig_in_filter(", ", $this->getAttribute($context["diagnostic"], "value", array()))) {
                // line 36
                echo "          ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_split_filter($this->env, $this->getAttribute($context["diagnostic"], "value", array()), ", "));
                foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                    // line 37
                    echo "            ";
                    echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $context["value"], "html", null, true));
                    echo "<br />
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 39
                echo "          ";
            } else {
                // line 40
                echo "            ";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["diagnostic"], "value", array()), "html", null, true));
                echo "
          ";
            }
            // line 42
            echo "        </div>
        ";
            // line 43
            if ($this->getAttribute($context["diagnostic"], "description", array())) {
                // line 44
                echo "          <div class=\"purge-ui-diagnostic-report__entry__description\">";
                echo $this->env->getExtension('sandbox')->ensureToStringAllowed($this->env->getExtension('drupal_core')->escapeFilter($this->env, $this->getAttribute($context["diagnostic"], "description", array()), "html", null, true));
                echo "</div>
        ";
            }
            // line 46
            echo "      </td>
    </tr>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['diagnostic'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "  </tbody>
</table>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/purge/modules/purge_ui/templates/purge-ui-diagnostics.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  135 => 49,  127 => 46,  121 => 44,  119 => 43,  116 => 42,  110 => 40,  107 => 39,  98 => 37,  93 => 36,  91 => 35,  83 => 31,  79 => 29,  73 => 27,  70 => 26,  62 => 24,  56 => 22,  53 => 21,  49 => 20,  43 => 17,);
    }

    public function getSource()
    {
        return "{#
/**
 * @file
 * purge_ui's visualization of Purge's diagnostics.
 *
 * Available variables:
 * - diagnostics: each diagnostic item contains:
 *   - title: The title of the diagnostic.
 *   - value: (optional) The diagnostic's status.
 *   - description: (optional) The diagnostic's description.
 *   - severity_title: The title of the severity.
 *   - severity_status: Indicates the severity status.
 *
 * @ingroup themeable
 */
 #}
{{ attach_library('purge_ui/diagnostics') }}
<table class=\"purge-ui-diagnostic-report\">
  <tbody>
  {% for diagnostic in diagnostics %}
    {% if diagnostic.severity_status == 'ok' %}
    <tr class=\"purge-ui-diagnostic-report__entry purge-ui-diagnostic-report__entry--{{ diagnostic.severity_status }} color-success\">
    {% else %}
    <tr class=\"purge-ui-diagnostic-report__entry purge-ui-diagnostic-report__entry--{{ diagnostic.severity_status }} color-{{ diagnostic.severity_status }}\">
    {% endif %}
      {% if diagnostic.severity_status in ['warning', 'error'] %}
        <td class=\"purge-ui-diagnostic-report__status-title purge-ui-diagnostic-report__status-icon purge-ui-diagnostic-report__status-icon--{{ diagnostic.severity_status }}\">
      {% else %}
        <td class=\"purge-ui-diagnostic-report__status-title\">
      {% endif %}
        {{ diagnostic.title }}
      </td>
      <td>
        <div class=\"purge-ui-diagnostic-report__entry__value\">
          {% if ', ' in diagnostic.value %}
          {% for value in diagnostic.value|split(', ') %}
            {{value}}<br />
          {% endfor %}
          {% else %}
            {{ diagnostic.value }}
          {% endif %}
        </div>
        {% if diagnostic.description %}
          <div class=\"purge-ui-diagnostic-report__entry__description\">{{ diagnostic.description }}</div>
        {% endif %}
      </td>
    </tr>
  {% endfor %}
  </tbody>
</table>
";
    }
}
