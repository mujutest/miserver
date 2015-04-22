<?php

/* AcmeMinticBundle:CallAditionalInfo:show.html.twig */
class __TwigTemplate_035fde14a3c0449a37710099f770174d3d5a21f2a06c0e1de637a06dc0cd12e2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        try {
            $this->parent = $this->env->loadTemplate("::base.html.twig");
        } catch (Twig_Error_Loader $e) {
            $e->setTemplateFile($this->getTemplateName());
            $e->setTemplateLine(1);

            throw $e;
        }

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<h1>CallAditionalInfo</h1>

    <table class=\"record_properties\">
        <tbody>
            <tr>
                <th>Id</th>
                <td>";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Call_id</th>
                <td>";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "callid", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Condone</th>
                <td>";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "condone", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Credit</th>
                <td>";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "credit", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Lefts</th>
                <td>";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "lefts", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Paid</th>
                <td>";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "paid", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Recomendations</th>
                <td>
                    ";
        // line 35
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "recomendations", array()));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            echo " 
                        <p>";
            // line 36
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo ".</p>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 37
        echo "</td>
                <td>
            </tr>
            <tr>
                <th>Cc</th>
                <td>";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "cc", array()), "html", null, true);
        echo "</td>
            </tr>
        </tbody>
    </table>

    <ul class=\"record_actions\">
        <li>
            <a href=\"";
        // line 49
        echo $this->env->getExtension('routing')->getPath("calladitionalinfo");
        echo "\">
                Back to the list
            </a>
        </li>
        <li>
            <a href=\"";
        // line 54
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("calladitionalinfo_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">
                Edit
            </a>
        </li>
        <li>";
        // line 58
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
        echo "</li>
    </ul>
";
    }

    public function getTemplateName()
    {
        return "AcmeMinticBundle:CallAditionalInfo:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 58,  129 => 54,  121 => 49,  111 => 42,  104 => 37,  96 => 36,  90 => 35,  82 => 30,  75 => 26,  68 => 22,  61 => 18,  54 => 14,  47 => 10,  39 => 4,  36 => 3,  11 => 1,);
    }
}
