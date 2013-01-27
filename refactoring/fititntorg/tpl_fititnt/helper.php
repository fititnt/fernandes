<?php
/**
 * @version 
 * @author		Template Base, Design: Alex Correa ( alex@flef.com.br - http://www.flef.com.br)
 * @author		Template Base, Programacao: Emerson Rocha Luiz ( emerson@webdesign.eng.br)
 * @author		Template final: <nome> (<email> - <site> )
 * @copyright	
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;


/* Load Mootools 1.3 */
JHtml::_('behavior.framework', true);

$app = JFactory::getApplication();


/* Pagina inicial ou nao */
//@fititnt.note: Possivel problema com exibicao de outras paginas, como blog, cagegories...
if( JRequest::getVar('option') == 'com_content' && JRequest::getVar('view') == 'featured') {
	$headersite = 1;
	$headertitle = 2;
} else {
	$headersite = 2;
	$headertitle = 1;
}

//echo  JRequest::getVar('layout');

//Colunas
if ( $this->countModules('coluna1') > 0 && $this->countModules('coluna2') > 0) {
	$grid_coluna1 = 3;
	$grid_coluna2 = 3;
	$grid_componente = 10;
} elseif ( $this->countModules('coluna1') > 0 && !( $this->countModules('coluna2') > 0) ){
	$grid_coluna1 = 3;
	$grid_coluna2 = 0;
	$grid_componente = 13;
} elseif ( !( $this->countModules('coluna1') > 0 ) && $this->countModules('coluna2') > 0 ) {
	$grid_coluna1 = 0;
	$grid_coluna2 = 3;
	$grid_componente = 13;
} elseif ( !( $this->countModules('coluna1') > 0 ) && !($this->countModules('coluna2') > 0) ){
	$grid_coluna1 = 0;
	$grid_coluna2 = 0;
	$grid_componente = 16;
} else {
	//Se esse caso ocorrer, e' algo de muito errado aconteceu
	$grid_coluna1 = 1;
	$grid_coluna2 = 1;
	$grid_componente = 1;
}


$adsense1 = '<script type="text/javascript"><!--
google_ad_client = "ca-pub-9947581423740824";
google_ad_slot = "3300969731";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>';



/*
 * Funcao para devolver um TRUE ou FALSE baseado na chance fornecida, de 0 a 100
 * return       boolean
 */
function chance($chance){
    if(rand (1,100) <= $chance){
        return TRUE;
    } else {
        return false;
    }
}

