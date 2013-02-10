<?php

/**
 * @package     Joomla.Plugin
 * @subpackage  System.sef
 *
 * @copyright   Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;

/**
 * Joomla! SEF Plugin
 *
 * @package     Joomla.Plugin
 * @subpackage  System.sef
 * @since       1.5
 */
class plgSystemAlgseo extends JPlugin {

		const DEBUG = true;

		private $doc = null;
		private $canonical_regex = array();
		private $redirect_regex = array();
		private $robots_regex = array();
		//private $redirect_exact = array();
		//private $canonical_exact = array();
		private $url = array();

		/**
		 * Constructor
		 *
		 * @param   object  &$subject  The object to observe
		 * @param   array   $config    An optional associative array of configuration settings.
		 *                             Recognized key values include 'name', 'group', 'params', 'language'
		 *                             (this list is not meant to be comprehensive).
		 *
		 * @since   11.1
		 */
		public function __construct(&$subject, $config = array()) {
				parent::__construct($subject);

				JLog::addLogger(
								array(
						'text_file' => 'algseo.php',
								//'text_entry_format' => '{"{datetime}":"{DATETIME}", "IP":"{CLIENTIP}", "category":"{CATEGORY}", "message": {MESSAGE}}'
								), JLog::ALL ^ JLog::DEBUG
								//, 'redirect'
				);

				JLog::addLogger(
								array(
						'text_file' => 'algseo.debug.php',
								//'text_entry_format' => '{"{datetime}":"{DATETIME}", "IP":"{CLIENTIP}", "category":"{CATEGORY}", "message": {MESSAGE}}' 
								), JLog::DEBUG
								//, 'access'
				);

				$this->url_full = JURI::getInstance()->toString();
				$this->url = str_replace(JURI::base(), '', $this->url_full);
				$this->doc = JFactory::getDocument();

				//$this->url = JURI::current(true);
				//$this->url = JURI::base();



				$this->canonical_regex = array(
						'#^17-artigos/*#' => ''
				);
				$this->redirect_regex = array(
						'#^17-artigos/*#' => '',
						'#^2-uncategorised*#' => ''
				);

				$this->robots_regex = array(
						'#(.*)-post(.*)#' => 'noindex, follow'
				);
		}

		/**
		 * This event is triggered after the framework has dispatched the application.
		 * Dispatching is the process of pulling the option from the request object and mapping them to a component. If the component does not exist, 
		 * it handles determining a default component to dispatch.
		 * When this event is triggered the output of the component is available in the document buffer.
		 */
		public function onAfterDispatch() {
				$app = JFactory::getApplication();

				////////////////////////////////// Canonical ///////////////////////////////////////////
				$canonical_info = array();
				$canonical_info['url'] = $this->url_full;

				// $this->doc = JFactory::getDocument();
				// Resolve pagina inicial
				if ($app->getMenu()->getActive() === $app->getMenu()->getDefault()) {
						// Remove canonicas, caso existam
						foreach ($this->doc->_links AS $k => $v) {
								if (isset($this->doc->_links[$k]['relation']) && strtolower($this->doc->_links[$k]['relation']) === 'canonical') {
										$canonical_info['canonical_old'] = $k;
										unset($this->doc->_links[$k]);
								}
						}

						$uri = JURI::getInstance();
						$uri->delVar('type');
						$uri->delVar('start');
						$uri->delVar('do_pdf');
						$uri->delVar('limitstart');
						$uri->delVar('layout');
						$uri->delVar('format');
						//JURI::root();

						$this->doc->addHeadLink($uri->toString(), 'canonical', 'rel');
						$canonical_info['canonical'] = $uri->toString();
						//print_r($this->doc);
				}
		}

		/**
		 * Add the canonical uri to the head
		 *
		 * @return  void
		 *
		 * @since   3.0
		 */
		public function onAfterRoute() {
				$app = JFactory::getApplication();
				$doc = JFactory::getDocument();

				if ($app->getName() != 'site' || $doc->getType() !== 'html') {
						return true;
				}

				//////////////////////////////////   Redirect   ///////////////////////////////////////////
				$redirect_info = array();
				foreach ($this->redirect_regex AS $k => $v) {
						if (preg_match($k, $this->url, $matches)) {


								// @todo resolver para $v = '/'
								if (strpos($v, 'h') !== 0) {
										$new_url = JURI::base() . $v;
								} else {
										$new_url = (strpos($new_url, '/') === 0 ? substr($new_url, 1) : $new_url);
								}
								$redirect_info['from'] = $this->url;
								$redirect_info['to'] = $new_url;
								$redirect_info['regex'] = $k;

								JLog::add(str_replace('\/', '/', json_encode($redirect_info)), JLog::NOTICE, 'redirect');

								Header("HTTP/1.1 301 Moved Permanently");
								Header("Location: $new_url");

								// Bye ;~
								continue;
						}
						// print_r(json_encode(array($k, $this->url, $matches)));die;
				}
		}

		/**
		 * Converting the site URL to fit to the HTTP request
		 *
		 * @return  void
		 */
		public function onAfterRender() {
				$app = JFactory::getApplication();

				if ($app->getName() != 'site' || $app->getCfg('sef') == '0') {
						return true;
				}
				print_r(__FILE__ . PHP_EOL);
				//////////////////////////////////  Robots   ///////////////////////////////////////////
				$robots_info = array();
				$robots_info['url'] = $this->url_full;
				foreach ($this->robots_regex AS $k => $v) {
						if (preg_match($k, $this->url, $matches)) {

								if (isset($this->doc->_metaTags['standard']['robots'])) {
										$robots_info['robots_old'] = $this->doc->_metaTags['standard']['robots'];
								}
								$this->doc->_metaTags['standard']['robots'] = $v;
								$robots_info['robots'] = $v;

								JLog::add(str_replace('\/', '/', json_encode($robots_info)), JLog::NOTICE, 'robots');

								continue;
						}
						// print_r(json_encode(array($k, $this->url, $matches)));die;
				}


//				foreach ($this->canonical_regex AS $k => $v) {;
//						if (preg_match($k, $this->url, $matches)) {
//
//								foreach ($this->doc->_links AS $k => $v) {
//										if (isset($this->doc->_links[$k]['relation']) && strtolower($this->doc->_links[$k]['relation']) === 'canonical') {
//												$canonical_info['canonical_old'] = $k;
//												unset($this->doc->_links[$k]);
//										}
//								}
//								$this->doc->_metaTags['standard']['robots'] = $v;
//								$robots_info['robots'] = $v;
//
//								JLog::add(str_replace('\/', '/', json_encode($robots_info)), JLog::NOTICE, 'robots');
//
//								continue;
//						}
//						// print_r(json_encode(array($k, $this->url, $matches)));die;
//				}


				JLog::add(str_replace('\/', '/', json_encode($canonical_info)), JLog::DEBUG, 'canonical');

				//unset($this);
				//print_r('');
				//die;
				////////////////////////////////// Debug geral ///////////////////////////////////////////
				$debug_info = array();
				$debug_info['url'] = $this->url_full;

				foreach ($this->doc->_links AS $link => $v) {
						if (isset($this->doc->_links[$link]['relation']) && strtolower($this->doc->_links[$link]['relation']) == 'canonical') {
								//unset($doc->_links[$k]);
								//print_r($link);//die;
								$debug_info['canonical'] = $link;
						}
				}
				if (isset($this->doc->_metaTags['standard']['robots'])) {
						$debug_info['robots'] = $this->doc->_metaTags['standard']['robots'];
				}

				$browser = JBrowser::getInstance();

				$debug_info['platform'] = $browser->getBrowser() . ', ' . $browser->getMajor() . ', ' . $browser->getPlatform();

				//print_r($debug_info);
				//print_r($doc->_metaTags);die;
				JLog::add(str_replace('\/', '/', json_encode($debug_info)), JLog::DEBUG, 'access');



				return true;
		}

		/**
		 * @param   string  $buffer
		 *
		 * @return  void
		 */
		private function checkBuffer($buffer) {
				if ($buffer === null) {
						switch (preg_last_error()) {
								case PREG_BACKTRACK_LIMIT_ERROR:
										$message = "PHP regular expression limit reached (pcre.backtrack_limit)";
										break;
								case PREG_RECURSION_LIMIT_ERROR:
										$message = "PHP regular expression limit reached (pcre.recursion_limit)";
										break;
								case PREG_BAD_UTF8_ERROR:
										$message = "Bad UTF8 passed to PCRE function";
										break;
								default:
										$message = "Unknown PCRE error calling PCRE function";
						}
						throw new RuntimeException($message);
				}
		}

		/**
		 * Message to log
		 * @param  string  $msg  Message to log
		 */
		private function log($msg) {
				
		}

}
