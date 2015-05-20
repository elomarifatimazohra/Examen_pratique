<?php

/* tacheBundle:Default:ajouter.html.twig */
class __TwigTemplate_4a1d5703efcba9344cd0664c3b4abf339a205c82c4184f0b926920a4109de4d8 extends Twig_Template
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

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "    <div style=\"margin-left:540px;width:200px;margin-top: 50px;height: 400px;padding-left: 16px;background-color: #868686;border-radius:30px;border:solid #000000\" >
        <br><br>
        <h1 style=\"\">TODO.COM</h1>
    ";
        // line 7
        echo         $this->env->getExtension('form')->renderer->renderBlock($this->getContext($context, "f"), 'form');
        echo "

</div>
";
    }

    public function getTemplateName()
    {
        return "tacheBundle:Default:ajouter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 7,  31 => 4,  28 => 3,);
    }
}
