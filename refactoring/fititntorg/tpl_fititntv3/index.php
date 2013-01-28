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
<jdoc:include type="head" />
    <?php
// Use of Google Font
    if ($this->params->get('googleFont')) {
        ?>
        <link href='http://fonts.googleapis.com/css?family=<?php echo $this->params->get('googleFontName'); ?>' rel='stylesheet' type='text/css' />
        <style type="text/css">
            h1,h2,h3,h4,h5,h6,.site-title{
                font-family: '<?php echo str_replace('+', ' ', $this->params->get('googleFontName')); ?>', sans-serif;
            }
        </style>
        <?php
    }
    ?>
    <?php
// Template color
    if ($this->params->get('templateColor')) {
        ?>
        <style type="text/css">
						/*
            body.site
            {
                border-top: 3px solid <?php echo $this->params->get('templateColor'); ?>;
                background-color: <?php echo $this->params->get('templateBackgroundColor'); ?>
            }
            a
            {
                color: <?php echo $this->params->get('templateColor'); ?>;
            }
            .navbar-inner, .nav-list > .active > a, .nav-list > .active > a:hover, .dropdown-menu li > a:hover, .dropdown-menu .active > a, .dropdown-menu .active > a:hover, .nav-pills > .active > a, .nav-pills > .active > a:hover,
            .btn-primary
            {
                background: <?php echo $this->params->get('templateColor'); ?>;
            }
            .navbar-inner
            {
                -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
                -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
                box-shadow: 0 1px 3px rgba(0, 0, 0, .25), inset 0 -1px 0 rgba(0, 0, 0, .1), inset 0 30px 10px rgba(0, 0, 0, .2);
            }
						*/
        </style>
        <?php
    }
    ?>
    <!--[if lt IE 9]>
        <script src="<?php echo $this->baseurl ?>/media/jui/js/html5.js"></script>
    <![endif]-->
</head>
<body class="site <?php
        echo $option
        . ' view-' . $view
        . ($layout ? ' layout-' . $layout : ' no-layout')
        . ($task ? ' task-' . $task : ' no-task')
        . ($itemid ? ' itemid-' . $itemid : '')
        . ($params->get('fluidContainer') ? ' fluid' : '');
        ?>">
    <div class="body">
        <div class="container<?php echo ($params->get('fluidContainer') ? ' fluid' : ''); ?>">
            <div class="header">
                <div class="header-inner clearfix">
                    <a class="brand pull-left" href="<?php echo $this->baseurl; ?>">
                        <?php echo $logo; ?> <?php
                        if ($this->params->get('sitedescription')) {
                            echo '<div class="site-description">' . htmlspecialchars($this->params->get('sitedescription')) . '</div>';
                        }
                        ?>
                    </a>
                    <div class="header-search pull-right">
                        <jdoc:include type="modules" name="position-0" style="none" />
                    </div>
                </div>
            </div>
            <?php if ($this->countModules('position-1')) : ?>
                <div class="navigation">
                    <jdoc:include type="modules" name="position-1" style="none" />
                </div>
            <?php endif; ?>
            <jdoc:include type="modules" name="banner" style="xhtml" />
            <div class="row-fluid">
                <?php if ($this->countModules('position-8')) : ?>
                    <div id="sidebar" class="span3">
                        <div class="sidebar-nav">
                            <jdoc:include type="modules" name="position-8" style="xhtml" />
                        </div>
                    </div>
                <?php endif; ?>
                <div id="content" class="<?php echo $span; ?>">
                    <jdoc:include type="modules" name="position-3" style="xhtml" />
                    <jdoc:include type="message" />
                    <jdoc:include type="component" />
                    <jdoc:include type="modules" name="position-2" style="none" />
                </div>
                <?php if ($this->countModules('position-7')) : ?>
                    <div id="aside" class="span3">
                        <jdoc:include type="modules" name="position-7" style="well" />
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
        <div class="footer">
            <div class="container<?php echo ($params->get('fluidContainer') ? ' fluid' : ''); ?>">
                <hr />
                <jdoc:include type="modules" name="footer" style="none" />
								<p class="pull-left">
								Emerson Rocha Luiz &copy; <?php echo date('Y'); ?><br />
						    Consultor e programador de extensões Joomla!
						    <br />
						    <a href="http://joomla.org" target="_blank">Joomla!</a> | <a href="http://html5.validator.nu/?doc=<?php echo JURI::current(); ?>" target="_blank">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer?profile=css3" target="_blank">CSS3</a> </p>
                <p class="pull-right"><a href="#top" id="back-top"><?php echo JText::_('TPL_PROTOSTAR_BACKTOTOP'); ?></a></p>
								<p class="span12 center">fititnt.org is not affiliated with or endorsed by the Joomla Project or Open Source Matters. The Joomla logo is used under a limited license granted by Open Source Matters	the trademark holder in the United States and other countries<br />
						<a href="http://www.w3.org/html/logo" target="_blank"><img src="<?php echo $this->baseurl ?>/templates/fititntv3/img/html5-badge-h-css3-graphics-multimedia-performance-semantics.png" alt="HTML5 Valid" width="261" height="64"></a></p>
            </div>
        </div>
        <jdoc:include type="modules" name="debug" style="none" />
    </body>
</html>
