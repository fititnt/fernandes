<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_finder
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::_('behavior.framework');
JHtml::_('bootstrap.tooltip');
JHtml::addIncludePath(JPATH_SITE . '/components/com_finder/helpers/html');

// Load the smart search component language file.
$lang = JFactory::getLanguage();
$lang->load('com_finder', JPATH_SITE);

$suffix = $params->get('moduleclass_sfx');
$output = '<input type="text" name="q" id="mod-finder-searchword" class="search-query input-medium" size="' . $params->get('field_size', 20) . '" value="' . htmlspecialchars(JFactory::getApplication()->input->get('q', ' ', 'string')) . '" placeholder="Pesquisar no site"/>';
$button = '';
$label = '';

if ($params->get('show_label', 1))
{
	$label = '<label for="mod-finder-searchword" class="finder hidden' . $suffix . '">' . $params->get('alt_label', JText::_('JSEARCH_FILTER_SUBMIT')) . '</label>';

	switch ($params->get('label_pos', 'left')):
		case 'top' :
			$label = $label . '<br />';
			$output = $label . $output;
			break;

		case 'bottom' :
			$label = '<br />' . $label;
			$output = $output . $label;
			break;

		case 'right' :
			$output = $output . $label;
			break;

		case 'left' :
		default :
			$output = $label . $output;
			break;
	endswitch;
}

if ($params->get('show_button', 1))
{
	$button = '<button class="btn btn-primary hasTooltip ' . $suffix . ' finder' . $suffix . '" type="submit" title="' . JText::_('MOD_FINDER_SEARCH_BUTTON') . '">Ir</button>';

	switch ($params->get('button_pos', 'right')):
		case 'top' :
			$button = $button . '<br />';
			$output = $button . $output;
			break;

		case 'bottom' :
			$button = '<br />' . $button;
			$output = $output . $button;
			break;

		case 'right' :
			$output = $output . $button;
			break;

		case 'left' :
		default :
			$output = $button . $output;
			break;
	endswitch;
}

JHtml::stylesheet('com_finder/finder.css', false, true, false);

// @note: removido suporte ao autocomplete (fititnt, 2013-01-28 23:45)
?>
<form id="mod-finder-searchform" action="<?php echo JRoute::_($route); ?>" method="get" class="form-search">
	<div class="finder<?php echo $suffix; ?>">
		<?php
		// Show the form fields.
		echo $output;
		?>

		<?php if ($params->get('show_advanced', 1)): ?>
			<?php if ($params->get('show_advanced', 1) == 2): ?>
				<br />
				<a href="<?php echo JRoute::_($route); ?>"><?php echo JText::_('COM_FINDER_ADVANCED_SEARCH'); ?></a>
			<?php elseif ($params->get('show_advanced', 1) == 1): ?>
				<div id="mod-finder-advanced">
					<?php echo JHtml::_('filter.select', $query, $params); ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		<?php echo modFinderHelper::getGetFields($route); ?>
	</div>
</form>
