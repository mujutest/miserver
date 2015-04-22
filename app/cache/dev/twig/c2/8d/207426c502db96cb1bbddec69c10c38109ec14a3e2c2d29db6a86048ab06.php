<?php

/* AcmeMinticBundle:News:show.html.twig */
class __TwigTemplate_c28d207426c502db96cb1bbddec69c10c38109ec14a3e2c2d29db6a86048ab06 extends Twig_Template
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
        echo "<h1>News</h1>

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
                <th>Name</th>
                <td>";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "name", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>Callid</th>
                <td>";
        // line 18
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "callId", array()), "html", null, true);
        echo "</td>
            </tr>
            <tr>
                <th>News</th>
                <td>
                    ";
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "news", array()));
        foreach ($context['_seq'] as $context["key"] => $context["value"]) {
            echo " 
                        <p>";
            // line 24
            echo twig_escape_filter($this->env, $context["value"], "html", null, true);
            echo ".</p>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 25
        echo "</td>
            </tr>
        </tbody>
    </table>

    <ul class=\"record_actions\">
        <li>
            <a href=\"";
        // line 32
        echo $this->env->getExtension('routing')->getPath("news");
        echo "\">
                Back to the list
            </a>
        </li>
        <li>
            <a href=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("news_edit", array("id" => $this->getAttribute((isset($context["entity"]) ? $context["entity"] : $this->getContext($context, "entity")), "id", array()))), "html", null, true);
        echo "\">
                Edit
            </a>
        </li>
        <li>";
        // line 41
        echo         $this->env->getExtension('form')->renderer->renderBlock((isset($context["delete_form"]) ? $context["delete_form"] : $this->getContext($context, "delete_form")), 'form');
        echo "</li>
    </ul>
";
    }

    public function getTemplateName()
    {
        return "AcmeMinticBundle:News:show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 41,  100 => 37,  92 => 32,  83 => 25,  75 => 24,  69 => 23,  61 => 18,  54 => 14,  47 => 10,  39 => 4,  36 => 3,  11 => 1,);
    }
}
