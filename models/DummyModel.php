<?php

/**
* Contao Open Source CMS
*/

namespace sioweb\contao\extensions\sendeplan;
use Contao;

/*
* @file SendeplanModel.php
* @class SendeplanModel
* @author Sascha Weidner
* @version 3.0.0
* @package sioweb.contao.extensions.sendeplan
* @copyright Sascha Weidner, Sioweb
*/

if(!class_exists('SendeplanModel')) {
	
class SendeplanModel extends \Model {
	/**
	 * Table name
	 * @var string
	 */
	protected static $strTable = 'tl_sendeplan';
}

}