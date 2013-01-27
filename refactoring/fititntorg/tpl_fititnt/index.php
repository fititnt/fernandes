<?php
/**
 * @package    fititnt.template
 * @author     Emerson Rocha Luiz <emerson@webdesign.eng.br>
 * @copyright  Copyright (C) 2012 Webdesign Assessoria em Tecnologia da Informacao. All rights reserved.
 * @license    GNU General Public License version 3. See license.txt
 */
defined('_JEXEC') or die;
include 'helper.php';
?><!DOCTYPE html>
<html lang="<?php echo $this->language; ?>">
<head>
<jdoc:include type="head" />
		<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/fititnt.css" type="text/css" />
		<script src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/js/fititnt.js" type="text/javascript"></script>
    <script type="text/javascript">
				var _gaq = _gaq || [];
				_gaq.push(['_setAccount', 'UA-478966-13']);
				_gaq.push(['_trackPageview']);
				(function() {
						var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
						ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
						var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
				})();
    </script>
</head>      
<body>
    <header>
				<jdoc:include type="modules" name="menu" style="semantico" tag="nav" role="navigation" tag_title="h2" class_title="h"/>
    </header>
    <div id="envolve-subheader" role="banner">        
        <div id="subheader" class="container_16">
            <div class="grid_5">
                <a href="http://fititnt.org">
                    <h<?php echo $headersite; ?> id="fititnt">
                        <img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/img/fititnt_.png" title="Clique para voltar ao inicio" alt="Programador &amp; contultor focado em Web Standards .::. Joomla!, PHP, Javascript, UI/UX" width="240" height="36"/>
                    </h<?php echo $headersite; ?>>
                </a>
            </div>
            <div id="subheader-esquerda" class="grid_11">
								<jdoc:include type="modules" name="topo" style="none" />
            </div>
            <div class="clear">&nbsp;</div>
        </div>
        <div class="clear">&nbsp;</div>
    </div>    
    <div id="envolve-corpo">
        <div id="copo-topo">&nbsp;</div>  
				<?php if ($this->countModules('slider')): ?>
						<div id="slider"  class="container_16">
								<jdoc:include type="modules" name="slider" style="none" />                    
								<div class="clear">&nbsp;</div>
						</div>     
				<?php endif; ?>        
        <div id="corpo" class="container_16">
						<?php if ($grid_coluna1): ?>
								<div id="coluna1" class="grid_<?php echo $grid_coluna1; ?>">
										<jdoc:include type="modules" name="coluna1" style="xhtml" />
										<jdoc:include type="modules" name="coluna1b" style="semantico" tag="none" role="complementary"/>
								</div>
						<?php endif; ?>
            <div id="componente" class="grid_<?php echo $grid_componente; ?>" >
                <div id="conteudo" role="main">
                    <jdoc:include type="modules" name="breadcumbs" style="none" />
                    <jdoc:include type="message" />
										<jdoc:include type="modules" name="componenteantes" style="xhtml" />
                    <jdoc:include type="component" />
										<jdoc:include type="modules" name="componentedepois" style="xhtml" />
                </div>
            </div>
						<?php if ($grid_coluna2): ?>
								<div id="coluna2" class="grid_<?php echo $grid_coluna2; ?>">
										<jdoc:include type="modules" name="busca" style="semantico" tag="aside" id="busca" role="search" tag_title="h3" class_title="h"/>
										<jdoc:include type="modules" name="coluna2" style="none" />
								</div>
						<?php endif; ?>
            <div class="clear">&nbsp;</div>
        </div>
        <div id="bottom"  class="container_16">
            <div id="user1" class="grid_16">
                <jdoc:include type="modules" name="user1" style="none" />
            </div>
        </div> 
        <div class="clear">&nbsp;</div>
    </div>
    <div id="envolve-rodape-alpha">
        <div id="rodape-alpha" class="container_16" role="contentinfo">
            <jdoc:include type="modules" name="rodape" style="none" />    
						Emerson Rocha Luiz &copy; 2012<br />
						Consultor e programador de extensões Joomla!
						<br />
						<a href="http://joomla.org" target="_blank">Joomla!</a> | <a href="http://html5.validator.nu/?doc=<?php echo JURI::current(); ?>" target="_blank">HTML5</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer?profile=css3" target="_blank">CSS3</a>                
        </div>
        <div class="clear">&nbsp;</div>
    </div>
    <div id="envolve-rodape-beta">
        <div id="rodape-beta" class="container_16">
						fititnt.org is not affiliated with or endorsed by the Joomla Project or Open Source Matters. The Joomla logo is used under a limited license granted by Open Source Matters	the trademark holder in the United States and other countries<br />
						<a href="http://www.w3.org/html/logo" target="_blank"><img src="http://fititnt.org/templates/fititnt/img/html5-badge-h-css3-graphics-multimedia-performance-semantics.png" alt="HTML5 Valid" width="261" height="64"></a>
        </div>
        <div class="clear">&nbsp;</div>
				<?php if ($this->countModules('debug')): ?>
						<fieldset><jdoc:include type="modules" name="debug" style="none" /></fieldset>
				<?php endif; ?>
    </div>
</body>
</html>