<?php

/**
* Contao Open Source CMS
*/

namespace sioweb\contao\extensions\dummy;
use Contao;

/**
* @file ModuleDummy.php
* @class ModuleDummy
* @author Sascha Weidner
* @version 3.0.0
* @package sioweb.contao.extensions.dummy
* @copyright Sascha Weidner, Sioweb
*/
class ModuleDummy extends \Module {

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_dummy'; /* Siehe autoload.php */
	
	
	/**
	 * Generate module
	 */
	protected function compile() {
		/**
		 * Hier werden alle Daten zusammengestellt und in $this->Template gespeichert
		 * um sie in dem Template mod_dummy.html zu nutzen
		 */

		$this->Template->dummy = 'Hallo, Welt!';
	}
}