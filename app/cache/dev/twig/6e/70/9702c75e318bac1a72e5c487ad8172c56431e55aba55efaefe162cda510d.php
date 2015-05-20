<?php

/* tacheBundle:Default:afficher.html.twig */
class __TwigTemplate_6e709702c75e318bac1a72e5c487ad8172c56431e55aba55efaefe162cda510d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "<div style=\"border:solid #000000 1px; width:300px;margin: auto  auto;margin-top:100px;background-color: #868686;border-radius:30px\">

    <h1  style=\"font-size: 50px;margin-left:240px\"> <a style=\"text-decoration:none\" href=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("Ajouter");
        echo "\" >+</a>
    </h1>
    <h1 style=\"text-align:center;color: #FFFFFF;\">Liste Tâches 2015</h1>
    <table border=\"0\" style=\"border-collapse: collapse;margin-left: 33%\">
        <tr><td>A faire:</td></tr>
        ";
        // line 10
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "Tache"));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 11
            echo "        <tr  >
            <td>
           <ul>
           <li ><a href=\"";
            // line 14
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("consulter", array("id" => $this->getAttribute($this->getContext($context, "p"), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "p"), "titre"), "html", null, true);
            echo "</a></li>

           </ul>
</td></tr>

        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "    </table>
    <table>
<tr><td>Elomari Alaoui Fatima Zohra Copyright....</td></tr>
    </table>

    </div>
";
    }

    public function getTemplateName()
    {
        return "tacheBundle:Default:afficher.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 20,  52 => 14,  47 => 11,  43 => 10,  35 => 5,  31 => 3,  28 => 2,);
    }
}
