<?php

/**
 * @package    Alligo.Template.Fititntv3
 * @author     Emerson Rocha Luiz <emerson@alligo.com.br>
 * 
 * @copyright  Copyright (C) 2013 Alligo Ltda.
 * @license    GNU General Public License version 3. See license.txt
 */
defined('_JEXEC') or die;

// Getting params from template
$params = JFactory::getApplication()->getTemplate(true)->params;

$app = JFactory::getApplication();
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

// Detecting Active Variables
$option = $app->input->getCmd('option', '');
$view = $app->input->getCmd('view', '');
$layout = $app->input->getCmd('layout', '');
$task = $app->input->getCmd('task', '');
$itemid = $app->input->getCmd('Itemid', '');
$sitename = $app->getCfg('sitename');

if ($task == "edit" || $layout == "form") {
    $fullWidth = 1;
} else {
    $fullWidth = 0;
}

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Add Stylesheets
$doc->addStyleSheet('templates/' . $this->template . '/css/template.css');

// Load optional rtl Bootstrap css and Bootstrap bugfixes
JHtmlBootstrap::loadCss($includeMaincss = false, $this->direction);

// Add current user information
$user = JFactory::getUser();

// Adjusting content width
if ($this->countModules('position-7') && $this->countModules('position-8')) {
    $span = "span6";
} elseif ($this->countModules('position-7') && !$this->countModules('position-8')) {
    $span = "span9";
} elseif (!$this->countModules('position-7') && $this->countModules('position-8')) {
    $span = "span9";
} else {
    $span = "span12";
}

// Logo file or site title param
if ($this->params->get('logoFile')) {
    $logo = '<img src="' . JURI::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
} elseif ($this->params->get('sitetitle')) {
    $logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($this->params->get('sitetitle')) . '</span>';
} else {
    $logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
<jdoc:include type="head" />  <!--[if lt IE 9]><script src="<?php echo $this->baseurl ?>/media/jui/js/html5.js"></script><![endif]-->
  <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-478966-13']);
    _gaq.push(['_setDomainName', 'www.fititnt.org']);
    _gaq.push(['_addIgnoredRef', 'www.fititnt.org']);
    _gaq.push(['_trackPageview']);
    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>
</head>
<body class="site <?php
        echo $option
        . ' view-' . $view
        . ($layout ? ' layout-' . $layout : ' no-layout')
        . ($task ? ' task-' . $task : ' no-task')
        . ($itemid ? ' itemid-' . $itemid : '')
        . ($params->get('fluidContainer') ? ' fluid' : '');
        ?>" itemscope itemtype="http://schema.org/WebPage">
    <div class="body">
        <div class="container<?php echo ($params->get('fluidContainer') ? ' fluid' : ''); ?>">
            <div class="header">
                <div class="header-inner clearfix">
                    <h1 class="brand pull-left">
                      <a href="<?php echo $this->baseurl; ?>">
                        <img alt="Programador &amp; consultor focado em Web Standards .::. Joomla!, PHP, Javascript, UI/UX" title="<?php echo JText::_('TPL_FITITNTV3_BACK_TO_FRONTPAGE'); ?>" width="150" height="64" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAABACAMAAADPuH7iAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAADNQTFRF8r+/2UBA/O/vzxAQ0iAg7J+f9c/P1jAw32Bg6Y+P76+v4nBw+d/f3FBQ5oCAzAAA////nO5BRgAAABF0Uk5T/////////////////////wAlrZliAAABkklEQVR42uzZ63aDIAwAYIKAeCnw/k87J7XDoDJYLZyz5FerNHxWBTHMNRmMWMT63yzFGFNtsfgAdg3/1axx+eO1BbuXNXbWhqzw83GYtYW5lSWtbZDFuyZZg02xYkS0JX0kvzzAF+t5tT/G5VZsiOXP4cOd91GF5TOGQxYeIGJWNEDcxfrjBU4sYhErCKn7ZW8HB5P7EcviiPowuAWLkuEW4NP/tDDB7CYkFqHcn2IpgXbzFliqw/sFr8+KVdb21VmTVwm9TFX6dTZlgnVyE71jqmbBv7N1xZ4wUTZAvJc1BWuG3m8a67N2wx2LpJVYsB89e7yxEmveswZ8cdVhPfAKIpX7MyyJWLwN1pya0+uwXJMsIBaxiEUsYhGLWMRqkaXTrLmUpUtYQ/QAHLH86rnn2SycO4O1rWIEAKhjFmzrL4Api4VzZ7Bcd/UOApdCIIuFc+ewTJIVFI4yWaactb07OGcFZbZMFsqdw3Jcp1huFGUslDuzdMq/6ymM8YsmShojSwrLYW6q7BOLWC3ElwADANs3QeEEqCaUAAAAAElFTkSuQmCC"/>
                      </a>
                    </h1>
                    <jdoc:include type="modules" name="position-0" style="semantico" class="header-search pull-right"role="search"/>
                </div>
            </div>
            <?php if ($this->countModules('position-1')) : ?>
                <div id="menu-principal" class="navigation" role="navigation">
                    <jdoc:include type="modules" name="position-1" style="semantico" class="nav" tag="nav"/>
                </div>
            <?php endif; ?>
            <jdoc:include type="modules" name="banner" style="xhtml" />
            <div class="row-fluid">
                <?php if ($this->countModules('position-8')) : ?>
                    <div id="sidebar" class="span3">
                        <div class="sidebar-nav" role="navigation">
                            <jdoc:include type="modules" name="position-8" style="xhtml" />
                        </div>
                    </div>
                <?php endif; ?>
                <div id="content" class="<?php echo $span; ?>">
                    <jdoc:include type="modules" name="position-3" style="xhtml" />
                    <jdoc:include type="message" />
                    <div role="main">
                    <jdoc:include type="component" />
                    </div>
                    <jdoc:include type="modules" name="position-2" style="none" />
                </div>
                <?php if ($this->countModules('position-7')) : ?>
                    <div id="aside" class="span3">
                        <jdoc:include type="modules" name="position-7" style="well" />
                    </div>
                <?php endif; ?>
            </div>
            <nav>
              <h1 class="hidden">Navegação Complementar</h1>
              <div class="row-fluid">
                <div class="span3">
                <jdoc:include type="modules" name="position-9" style="" />
                </div>
                <div class="span3">
                <jdoc:include type="modules" name="position-10" style="" />
                </div>
                <div class="span3">
                <jdoc:include type="modules" name="position-11" style="" />
                </div>
                <div class="span3">
                <jdoc:include type="modules" name="position-12" style="" />
                </div>
              </div>
            </nav>
            <footer class="footer" role="contentinfo">
              Emerson Rocha Luiz &copy; <?php echo date('Y'); ?><br />
              Consultor e programador de extensões Joomla!<br />
              <a href="http://joomla.org" target="_blank">Joomla!</a> | <a href="http://html5.validator.nu/?doc=<?php echo JURI::current(); ?>" target="_blank">HTML5</a> <!--| <a href="http://jigsaw.w3.org/css-validator/check/referer?profile=css3" target="_blank">CSS3</a></p>//Twitter boostrap ferrando com meu CSS :( --> 
            </footer>
        </div>
    </div>
        <div>
            <div class="container<?php echo ($params->get('fluidContainer') ? ' fluid' : ''); ?>">
                <hr />
                <jdoc:include type="modules" name="footer" style="none" />
                <p class="span12 center">fititnt.org is not affiliated with or endorsed by the Joomla Project or Open Source Matters. The Joomla logo is used under a limited license granted by Open Source Matters	the trademark holder in the United States and other countries<br />
                <a href="http://www.w3.org/html/logo" target="_blank"><img src="<?php echo $this->baseurl ?>/templates/fititntv3/img/html5-badge-h-css3-graphics-multimedia-performance-semantics.png" alt="HTML5 Valid" width="261" height="64"></a></p>
            </div>
        </div>
        <jdoc:include type="modules" name="debug" style="none" />
    </body>
</html>