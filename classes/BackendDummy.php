<?php

/**
 * Contao Open Source CMS
 */

namespace sioweb\contao\extensions\dummy;
use Contao;

/**
 * @file BackendDummy.php
 * @class BackendDummy
 * @author Sascha Weidner
 * @version 3.0.0
 * @package sioweb.contao.extensions.dummy
 * @copyright Sascha Weidner, Sioweb
 */

class BackendDummy extends \Backend {

  public function run() {
    $objTemplate = new \BackendTemplate('be_dummy');
    $objTemplate->dummy = 'Hallo, Welt!';
    /* $objTemplate->setData( array ) */
    return $objTemplate->parse();
  }
}
