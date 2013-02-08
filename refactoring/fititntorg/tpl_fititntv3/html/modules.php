<?php

/**
 * @package    Alligo.Template.Fititntv3
 * @author     Emerson Rocha Luiz <emerson@alligo.com.br>
 * 
 * @copyright  Copyright (C) 2013 Alligo Ltda.
 * @license    GNU General Public License version 3. See license.txt
 */
defined('_JEXEC') or die;

/**
 * This is a file to add template specific chrome to module rendering.  To use it you would
 * set the style attribute for the given module(s) include in your template to use the style
 * for each given modChrome function.
 *
 * eg.  To render a module mod_test in the submenu style, you would use the following include:
 * <jdoc:include type="module" name="test" style="submenu" />
 *
 * This gives template designers ultimate control over how modules are rendered.
 *
 * NOTICE: All chrome wrapping methods should be named: modChrome_{STYLE} and take the same
 * two arguments.
 */

/*
 * Module chrome for rendering the module in a submenu
 */
function modChrome_no($module, &$params, &$attribs)
{
	if ($module->content)
	{
		echo $module->content;
	}
}

function modChrome_well($module, &$params, &$attribs)
{
	if ($module->content)
	{
		echo "<div class=\"well " . htmlspecialchars($params->get('moduleclass_sfx')) . "\">";
		if ($module->showtitle)
		{
			echo "<h3 class=\"page-header\">" . $module->title . "</h3>";
		}
		echo $module->content;
		echo "</div>";
	}
}

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
?>
