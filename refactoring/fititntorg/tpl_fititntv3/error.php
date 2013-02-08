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
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->getCfg('sitename');

if($task == "edit" || $layout == "form" )
{
	$fullWidth = 1;
}
else
{
	$fullWidth = 0;
}

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Add current user information
$user = JFactory::getUser();


// Logo file or site title param
if ($params->get('logoFile')) {
    $logo = '<img src="' . JURI::root() . $params->get('logoFile') . '" alt="' . $sitename . '" />';
} elseif ($params->get('sitetitle')) {
    $logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($params->get('sitetitle')) . '</span>';
} else {
    $logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
}
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<title><?php echo $this->title; ?> <?php echo $this->error->getMessage();?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="language" content="<?php echo $this->language; ?>" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/template.css" type="text/css" />
	<!--[if lt IE 9]>
		<script src="<?php echo $this->baseurl ?>/media/jui/js/html5.js"></script>
	<![endif]-->
</head>
<body class="site <?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($params->get('fluidContainer') ? ' fluid' : '');
?>">
	<div class="body">
		<div class="container<?php echo ($params->get('fluidContainer') ? ' fluid' : '');?>">
			<div class="header">
				<div class="header-inner clearfix">
					<a class="brand pull-left" href="<?php echo $this->baseurl; ?>">
						<?php echo $logo; ?> <?php
						if ($params->get('sitedescription')) {
								echo '<div class="site-description">' . htmlspecialchars($params->get('sitedescription')) . '</div>';
						}
						?>
					</a>
					<div class="header-search pull-right">
						<?php
						// Display position-0 modules
						$this->searchmodules = JModuleHelper::getModules('position-0');
						foreach ($this->searchmodules as $searchmodule)
						{
							$output = JModuleHelper::renderModule($searchmodule, array('style' => 'none'));
							$params = new JRegistry;
							$params->loadString($searchmodule->params);
							echo $output;
						}
						?>
					</div>
				</div>
			</div>
			<div class="navigation">
				<?php
				// Display position-1 modules
				$this->navmodules = JModuleHelper::getModules('position-1');
				foreach ($this->navmodules as $navmodule)
				{
					$output = JModuleHelper::renderModule($navmodule, array('style' => 'none'));
					$params = new JRegistry;
					$params->loadString($navmodule->params);
					echo $output;
				}
				?>
			</div>
			<div class="banner">
				<jdoc:include type="modules" name="banner" style="xhtml" />
			</div>
			<div class="row-fluid">
				<div id="content" class="span12">
					<h1 class="page-header"><?php echo JText::_('JERROR_LAYOUT_PAGE_NOT_FOUND'); ?></h1>
					<div class="well">
						<div class="row-fluid">
							<div class="span6">
								<p><strong><?php echo JText::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?></strong></p>
								<p><?php echo JText::_('JERROR_LAYOUT_NOT_ABLE_TO_VISIT'); ?></p>
								<ul>
									<li><?php echo JText::_('JERROR_LAYOUT_AN_OUT_OF_DATE_BOOKMARK_FAVOURITE'); ?></li>
									<li><?php echo JText::_('JERROR_LAYOUT_MIS_TYPED_ADDRESS'); ?></li>
									<li><?php echo JText::_('JERROR_LAYOUT_SEARCH_ENGINE_OUT_OF_DATE_LISTING'); ?></li>
									<li><?php echo JText::_('JERROR_LAYOUT_YOU_HAVE_NO_ACCESS_TO_THIS_PAGE'); ?></li>
								</ul>
							</div>
							<div class="span6">
								<?php if (JModuleHelper::getModule('search')) : ?>
									<p><strong><?php echo JText::_('JERROR_LAYOUT_SEARCH'); ?></strong></p>
									<p><?php echo JText::_('JERROR_LAYOUT_SEARCH_PAGE'); ?></p>
									<?php
										$module = JModuleHelper::getModule('search');
										echo JModuleHelper::renderModule($module);
									?>
								<?php endif; ?>
								<p><?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?></p>
								<p><a href="<?php echo $this->baseurl; ?>/index.php" class="btn"><i class="icon-home"></i> <?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a></p>
							</div>
						</div>
						<hr />
						<p><?php echo JText::_('JERROR_LAYOUT_PLEASE_CONTACT_THE_SYSTEM_ADMINISTRATOR'); ?></p>
						<blockquote>
							<span class="label label-inverse"><?php echo $this->error->getCode(); ?></span> <?php echo $this->error->getMessage();?>
						</blockquote>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="container<?php echo ($params->get('fluidContainer') ? ' fluid' : '');?>">
			<hr />
			<jdoc:include type="modules" name="footer" style="none" />
			<p class="pull-right"><a href="#top" id="back-top"><?php echo JText::_('TPL_PROTOSTAR_BACKTOTOP'); ?></a></p>
			<p>&copy; <?php echo $sitename; ?> <?php echo date('Y');?></p>
		</div>
	</div>
	<jdoc:include type="modules" name="debug" style="none" />
</body>
</html>
