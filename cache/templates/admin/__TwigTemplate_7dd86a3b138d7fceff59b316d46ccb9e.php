<?php

/* settings.emailintegration.mailchimp.tpl */
class __TwigTemplate_7dd86a3b138d7fceff59b316d46ccb9e extends Twig_Template
{
    protected $parent;

    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'common' => array(array($this, 'block_common')),
        );
    }

    public function display(array $context)
    {
        if (null === $this->parent) {
            $this->parent = clone $this->env->loadTemplate("settings.emailintegration.common.tpl");
            $this->parent->pushBlocks($this->blocks);
        }
        $this->parent->display($context);
    }

    // line 3
    public function block_common($context, $parents)
    {
        echo "\t";
        // line 4
        $context['formBuilder'] = $this->env->loadTemplate("macros/forms.tpl", true);
        echo "\t";
        // line 5
        $context['util'] = $this->env->loadTemplate("macros/util.tpl", true);
        echo "
\t";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "startForm", array(), "method"), "1");
        echo "

\t\t";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "heading", array($this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "MailChimpIntegrationSettings", array(), "any"), ), "method"), "1");
        echo "

\t\t";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "startRow", array(array("label" => ($this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "MailChimpApiKey", array(), "any")) . (":"), "required" => true), ), "method"), "1");
        echo "
\t\t\t";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "input", array("text", ($this->getAttribute((isset($context['module']) ? $context['module'] : null), "id", array(), "any")) . ("[apikey]"), $this->getAttribute($this->getAttribute((isset($context['module']) ? $context['module'] : null), "object", array(), "any"), "GetValue", array("apikey", ), "method"), array("class" => "Field250"), ), "method"), "1");
        echo "
\t\t\t";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['util']) ? $context['util'] : null), "tooltip", array("MailChimpApiKey", "MailChimpApiKeyHelp", ), "method"), "1");
        echo "

\t\t\t<input type=\"button\" class=\"button ";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['module']) ? $context['module'] : null), "id", array(), "any"), "1");
        echo "_verifyApiKey\" style=\"width:100px;\" value=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "MailChimpVerifyApi", array(), "any"), "1");
        echo "\" />

\t\t\t&nbsp;
\t\t\t<a href=\"#\" class=\"EmailIntegration_MailChimp_ApiKeyHelp\">";
        // line 18
        echo getLang("WhereCanIFindMyApiKey");
        echo "</a>

\t\t\t<span class=\"apiConfiguredContainer\" ";
        // line 20
        if ((!$this->getAttribute($this->getAttribute((isset($context['module']) ? $context['module'] : null), "object", array(), "any"), "isConfigured", array(), "any"))) {
            echo "style=\"display:none;\"";
        }
        echo ">
\t\t\t\t&nbsp;
\t\t\t\t<input type=\"button\" class=\"button ";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['module']) ? $context['module'] : null), "id", array(), "any"), "1");
        echo "_refreshLists\" style=\"width:100px;\" value=\"";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['lang']) ? $context['lang'] : null), "EmailIntegrationRefreshLists", array(), "any"), "1");
        echo "\" />
\t\t\t</span>
\t\t";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "endRow", array(), "method"), "1");
        echo "

\t";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context['formBuilder']) ? $context['formBuilder'] : null), "endForm", array(), "method"), "1");
        echo "

\t";
        // line 28
        $this->getParent($context, $parents);
        echo "
\t<script language=\"javascript\" type=\"text/javascript\">//<![CDATA[
\tif (typeof lang == 'undefined') { lang = {}; }
\tlang.MailChimpApiRequired = \"";
        // line 32
        echo Interspire_Template_Extension::jsFilter(getLang("MailChimpApiRequired"), "'");
        echo "\";
\tlang.MailChimpApiVerifyRequired = \"";
        // line 33
        echo Interspire_Template_Extension::jsFilter(getLang("MailChimpApiVerifyRequired"), "'");
        echo "\";
\t//]]></script>

";
    }

}
