<?php

/* tacheBundle:Default:Consulter.html.twig */
class __TwigTemplate_2e986eaab9b210fd6076fc0cb285ff8915bc4c5b9d0d5e8c443f501af8dc510a extends Twig_Template
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
        echo "    <div style=\"border:solid #000000; width:300px;margin: auto  auto;margin-top:100px;background-color: #868686;border-radius:30px\">

    <h1 style=\"font-size: 50px;margin-left:240px\"> <a style=\"text-decoration: none\" href=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("Ajouter");
        echo "\">+</a>
    </h1>
    <h1 style=\"color:white;text-align: center; text-decoration: underline\">Liste des  Taches 2015</h1>
    <table border=\"0\" style=\"border-collapse: collapse;margin-left: 33%\">
        <tr><td></td></tr>

<tr style=\"text-align:center; padding-left:10px\">
<p style=\" padding-left:10px\">
            ";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "Tache"), "titre"), "html", null, true);
        echo " : <br><br>



        ";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "Tache"), "description"), "html", null, true);
        echo " <br><br>
        a faire Avant le :
        ";
        // line 19
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "Tache"), "date"), "Y-m-d H:i:s"), "html", null, true);
        echo "<br><br><br>
         Copyright.....
    </p>
        </td>
        </tr>








    </table>
    </div>
";
    }

    public function getTemplateName()
    {
        return "tacheBundle:Default:Consulter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 19,  53 => 17,  46 => 13,  35 => 5,  31 => 3,  28 => 2,);
    }
}
