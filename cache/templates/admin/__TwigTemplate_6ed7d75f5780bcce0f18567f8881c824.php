<?php

/* Snippets/DashboardVersionCheck.html */
class __TwigTemplate_6ed7d75f5780bcce0f18567f8881c824 extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<div class=\"DashboardPanel DashboardPanelFeatured DashboardInfoMessage\" id=\"DashboardVersionCheck\" style=\"";
        echo twig_safe_filter((isset($context['HideDashboardVersionCheck']) ? $context['HideDashboardVersionCheck'] : null));
        echo "\">
\t<div class=\"DashboardPanelContent\">
\t\t";
        // line 3
        echo twig_safe_filter((isset($context['VersionCheckMessage']) ? $context['VersionCheckMessage'] : null));
        echo "
\t</div>
\t<script type=\"text/javascript\">
\t\tvar currentVersionNumber = '";
        // line 6
        echo twig_safe_filter((isset($context['CurrentVersionNumber']) ? $context['CurrentVersionNumber'] : null));
        echo "';
\t</script>
</div>";
    }

}
