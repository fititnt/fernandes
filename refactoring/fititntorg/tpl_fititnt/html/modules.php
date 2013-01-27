<?php
/**
 * @package    Fititnt.Template
 * @author     Emerson Rocha Luiz <emerson@webdesign.eng.br>
 * @copyright  Copyright (C) 2012 Webdesign Assessoria em Tecnologia da Informacao. All rights reserved.
 * @license    GNU General Public License version 3. See license.txt
 */
defined('_JEXEC') or die;

/**
 * Exibe módulo no formato puro
 * 
 * $attribs tags: <br>
 * tag:         Tag que circula o módulo. Padrão : div. Caso seja igual a -1, nada será usado<br>
 * tag_title:   Tag que o título deve usar. Padrão p.  Caso seja igual a -1, nada será usado<br>
 * class:       Classe, ou classes, que circulam o módulo. A ultima poderá ser acompanhada do sufixo de módulo<br>
 * class_title  Classe, ou classes, que que o titulo deve usar. A ultima poderá ser acompanhada do sufixo de módulo<br>
 * role:        WAI-ARIA role que a tag que circula deve usar<br>
 * tabindex:    <br>
 * 
 * @param   string  $module    Module core definitions
 * @param   string  &$params   Adicional params defined on each module
 * @param   string  &$attribs  Adicional atributes, in general on tag
 * 
 * @return  void
 */
function modChrome_semantico($module, &$params, &$attribs)
{
	$conf = new stdClass;

	$std_conf = array('moduleclass_sfx' => null,
		'tag' => 'div',
		'tag_title' => 'p',
		'class' => '',
		'class_title' => '',
		'role' => '',
		'tabindex' => '');

	foreach ($std_conf AS $item => $default)
	{
		if ($params->get($item, null))
		{
			$conf->$item = $params->get($item, null);
		}
		elseif (isset($attribs[$item]) && $attribs[$item])
		{
			$conf->$item = $attribs[$item];
		}
		else
		{
			$conf->$item = $default;
		}
	}

	$html = '';

	if ($conf->tag !== 'none')
	{
		$html .= '<' . $conf->tag;
		$html .= $conf->class || $conf->moduleclass_sfx ? ' class="' . $conf->class . $conf->moduleclass_sfx . '"' : '';
		$html .= $conf->role ? ' role="' . $conf->role . '"' : '';
		$html .= $conf->tabindex ? ' tabindex="' . $conf->tabindex . '"' : '';
		$html .= '>' . PHP_EOL;

		// Ok, some are opitional, but for default we will set it
	}

	if ($module->showtitle)
	{
		$html .= '<' . $conf->tag_title;
		$html .= $conf->class_title ? ' class="' . $conf->class_title . '"' : '';
		$html .= '>';
		$html .= $module->title;

		// Ok, some are opitional, but for default we will set it
		$html .= '</' . $conf->tag_title . '>' . PHP_EOL;
	}

	$html .= $module->content . PHP_EOL;

	if ($conf->tag !== 'none')
	{
		$html .= '</' . $conf->tag . '>' . PHP_EOL;
	}

	echo $html;
}

/**
 * Exibe módulo no formato puro
 * 
 * @param   string  $module    Module core definitions
 * @param   string  &$params   Adicional params defined on each module
 * @param   string  &$attribs  Adicional atributes, in general on tag
 * 
 * @return  void
 */
function modChrome_puro($module, &$params, &$attribs)
{
	echo $module->content;
}

/**
 * Exibe módulo no formato puro, com header definido por paragrafo, sem classe
 * definida
 * 
 * @param   string  $module    Module core definitions
 * @param   string  &$params   Adicional params defined on each module
 * @param   string  &$attribs  Adicional atributes, in general on tag
 * 
 * @return  void
 */
function modChrome_purop($module, &$params, &$attribs)
{
	$html = '<p>' . $module->title . '</p>' . PHP_EOL . $module->content;
	echo $html;
}

/**
 * Exibe módulo no formato puro, com header definido por paragrafo, com classe
 * . modh
 * 
 * @param   string  $module    Module core definitions
 * @param   string  &$params   Adicional params defined on each module
 * @param   string  &$attribs  Adicional atributes, in general on tag
 * 
 * @return  void
 */
function modChrome_puroph($module, &$params, &$attribs)
{
	$html = '<p class="modh">' . $module->title . '</p>' . PHP_EOL . $module->content;
	echo $html;
}

/**
 * Exibe módulo no formato puro, com header h3, sem classe definida
 * 
 * @param   string  $module    Module core definitions
 * @param   string  &$params   Adicional params defined on each module
 * @param   string  &$attribs  Adicional atributes, in general on tag
 * 
 * @return  void
 */
function modChrome_puroh3($module, &$params, &$attribs)
{
	$html = '<h3>' . $module->title . '</h3>' . PHP_EOL . $module->content;
	echo $html;
}

/**
 * Exibe módulo no formato puro, com header h3, com classe .he que, idealmente, 
 * deve no seu template ser definida para ser oculta
 * 
 * @param   string  $module    Module core definitions
 * @param   string  &$params   Adicional params defined on each module
 * @param   string  &$attribs  Adicional atributes, in general on tag
 * 
 * @return  void
 */
function modChrome_puroh3s($module, &$params, &$attribs)
{
	$html = '<h3 class="he">' . $module->title . '</h3>' . PHP_EOL . $module->content;
	echo $html;
}

/**
 * beezDivision chrome.
 *
 * @param   string  $module    Module core definitions
 * @param   string  &$params   Adicional params defined on each module
 * @param   string  &$attribs  Adicional atributes, in general on tag
 * 
 * @return  void
 */
function modChrome_beezDivision($module, &$params, &$attribs)
{
	$headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
	if (!empty($module->content))
	{
		?>
		<div class="moduletable<?php echo htmlspecialchars($params->get('moduleclass_sfx')); ?>">
			<?php
			if ($module->showtitle)
			{
				?> <h<?php echo $headerLevel; ?>><span
						class="backh"><span class="backh2"><span class="backh3"><?php echo $module->title; ?></span></span></span></h<?php echo $headerLevel; ?>>
			<?php }; ?> <?php echo $module->content; ?></div>
		<?php
	};
}

/**
 * beezHide chrome.
 *
 * @param   string  $module    Module core definitions
 * @param   string  &$params   Adicional params defined on each module
 * @param   string  &$attribs  Adicional atributes, in general on tag
 * 
 * @return  void
 */
function modChrome_beezHide($module, &$params, &$attribs)
{
	$headerLevel = isset($attribs['headerLevel']) ? (int) $attribs['headerLevel'] : 3;
	$state = isset($attribs['state']) ? (int) $attribs['state'] : 0;

	if (!empty($module->content))
	{
		?>

		<div
			class="moduletable_js <?php echo htmlspecialchars($params->get('moduleclass_sfx')); ?>"><?php if ($module->showtitle) : ?>
				<h<?php echo $headerLevel; ?> class="js_heading"><span class="backh"> <span
							class="backh1"><?php echo $module->title; ?> <a href="#"
																		title="<?php echo JText::_('TPL_BEEZ5_CLICK'); ?>"
																		onclick="auf('module_<?php echo $module->id; ?>'); return false"
																		class="opencloselink" id="link_<?php echo $module->id ?>"> <span
									class="no"><img src="templates/beez_20/images/plus.png"
												alt="<?php
			if ($state == 1)
			{
				echo JText::_('TPL_BEEZ5_ALTOPEN');
			}
			else
			{
				echo JText::_('TPL_BEEZ5_ALTCLOSE');
			}
			?>" />
								</span></a></span></span></h<?php echo $headerLevel; ?>> <?php endif; ?>
			<div class="module_content <?php
								if ($state == 1)
								{
									echo "open";
								}
		?>"
				 id="module_<?php echo $module->id; ?>" tabindex="-1"><?php echo $module->content; ?></div>
		</div>
		<?php
	}
}

/**
 * beezTabs chrome.
 *
 * @param   string  $module    Module core definitions
 * @param   string  &$params   Adicional params defined on each module
 * @param   string  &$attribs  Adicional atributes, in general on tag
 * 
 * @return  void
 */
function modChrome_beezTabs($module, $params, $attribs)
{
	$area = isset($attribs['id']) ? (int) $attribs['id'] : '1';
	$area = 'area-' . $area;

	static $modulecount;
	static $modules;

	if ($modulecount < 1)
	{
		$modulecount = count(JModuleHelper::getModules($attribs['name']));
		$modules = array();
	}

	if ($modulecount == 1)
	{
		$temp = new stdClass();
		$temp->content = $module->content;
		$temp->title = $module->title;
		$temp->params = $module->params;
		$temp->id = $module->id;
		$modules[] = $temp;
		// list of moduletitles
		// list of moduletitles
		echo '<div id="' . $area . '" class="tabouter"><ul class="tabs">';

		foreach ($modules as $rendermodule)
		{
			echo '<li class="tab"><a href="#" id="link_' . $rendermodule->id . '" class="linkopen" onclick="tabshow(\'module_' . $rendermodule->id . '\');return false">' . $rendermodule->title . '</a></li>';
		}
		echo '</ul>';
		$counter = 0;
		// modulecontent
		foreach ($modules as $rendermodule)
		{
			$counter++;

			echo '<div tabindex="-1" class="tabcontent tabopen" id="module_' . $rendermodule->id . '">';
			echo $rendermodule->content;
			if ($counter != count($modules))
			{
				echo '<a href="#" class="unseen" onclick="nexttab(\'module_' . $rendermodule->id . '\');return false;" id="next_' . $rendermodule->id . '">' . JText::_('TPL_BEEZ2_NEXTTAB') . '</a>';
			}
			echo '</div>';
		}
		$modulecount--;
		echo '</div>';
	}
	else
	{
		$temp = new stdClass();
		$temp->content = $module->content;
		$temp->params = $module->params;
		$temp->title = $module->title;
		$temp->id = $module->id;
		$modules[] = $temp;
		$modulecount--;
	}
}
