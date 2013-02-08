<?php

/**
 * @package    Alligo.Template.Fititntv3
 * @author     Emerson Rocha Luiz <emerson@alligo.com.br>
 * 
 * @copyright  Copyright (C) 2013 Alligo Ltda.
 * @license    GNU General Public License version 3. See license.txt
 */
defined('_JEXEC') or die;

JHtml::_('bootstrap.tooltip');
?>

<ul class="breadcrumb <?php echo $moduleclass_sfx; ?>" itemprop="breadcrumb">
<?php if ($params->get('showHere', 1))
	{
		//echo '<li class="active"><span class="divider"><i class="icon-location hasTooltip" title="' .JText::_('MOD_BREADCRUMBS_HERE').'"></i></span></li>';
		echo '<li class="active"><span class="divider">' .JText::_('MOD_BREADCRUMBS_HERE').'</span></li>';
	}
?>
<?php for ($i = 0; $i < $count; $i ++) :
	// Workaround for duplicate Home when using multilanguage
	if ($i == 1 && !empty($list[$i]->link) && !empty($list[$i - 1]->link) && $list[$i]->link == $list[$i - 1]->link)
	{
		continue;
	}
	// If not the last item in the breadcrumbs add the separator
	echo '<li itemscope itemtype="http://data-vocabulary.org/Breadcrumb">';
	if ($i < $count - 1)
	{
		if (!empty($list[$i]->link)) {
			echo '<a href="'.$list[$i]->link.'" class="pathway" itemprop="url"><span itemprop="title">'.$list[$i]->name.'</span></a>';
		} else {
			echo '<span itemprop="title">';
			echo $list[$i]->name;
			echo '</span>';
		}
		if ($i < $count - 2)
		{
			echo '<span class="divider">/</span>';
		}
	}  elseif ($params->get('showLast', 1)) { // when $i == $count -1 and 'showLast' is true
		if($i > 0){
			echo '<span class="divider">/</span>';
		}
		echo '<span itemprop="title">';
		echo $list[$i]->name;
		echo '</span>';
	}
	echo '</li>';
endfor; ?>
</ul>
