<?php

/**
* Contao Open Source CMS
*/

namespace sioweb\contao\extensions\dummy;
use Contao;

/*
* @file DummyModel.php
* @class DummyModel
* @author Sascha Weidner
* @version 3.0.0
* @package sioweb.contao.extensions.dummy
* @copyright Sascha Weidner, Sioweb
*/

if(!class_exists('DummyModel')) {
	
class DummyModel extends \Model {
	/**
	 * Table name
	 * @var string
	 */
	protected static $strTable = 'tl_dummy';
}

}