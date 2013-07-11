<?php

/* products.images.process.tpl */
class __TwigTemplate_37a829632cdf9951a453bf8f7732224c extends Twig_Template
{
    public function display(array $context)
    {
        // line 1
        echo "<div id=\"ProgressContainer\">
\t<table id=\"OuterPanel\" cellSpacing=\"0\" cellPadding=\"0\" width=\"95%\">
\t\t<tr>
\t\t\t<td class=\"Intro\">
\t\t\t\t<div>";
        // line 5
        echo getLang("ProcessingImagesIntro");
        echo "</div>
\t\t\t</td>
\t\t</tr>
\t\t<tr>
\t\t\t<td class=\"Intro\">
\t\t\t\t<div class=\"IntroItem\">
\t\t\t\t\t<div>
\t\t\t\t\t\t<div style=\"position: relative;border: 1px solid #ccc; width: 300px; padding: 0px; margin: 0 auto;\">
\t\t\t\t\t\t\t<div id=\"progressBarPercentage\" style=\"margin: 0; padding: 0; background: url(images/progressbar.gif) no-repeat; height: 20px; width: 0%;\">
\t\t\t\t\t\t\t\t&nbsp;
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div style=\"position: absolute; top: 2px; left: 0; text-align: center; width: 300px; font-weight: bold;\" id=\"progressPercent\">&nbsp;</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div id=\"progressBarStatus\" style=\"text-align: center;\">&nbsp;</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</td>
\t\t</tr>
\t</table>
</div>
<script type=\"text/javascript\">
\tProcessProductImages.updateProgress(0, '";
        // line 26
        echo getLang("LoadingProcessImages");
        echo "');
\tProcessProductImages.runProcess(0);
</script>";
    }

}
