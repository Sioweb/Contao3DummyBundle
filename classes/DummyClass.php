<?php

/**
 * Contao Open Source CMS
 */

namespace sioweb\contao\extensions\dummy;
use Contao;

/**
 * @file DummyClass.php
 * @class DummyClass
 * @author Sascha Weidner
 * @version 3.0.0
 * @package sioweb.contao.extensions.dummy
 * @copyright Sascha Weidner, Sioweb
 */

class DummyClass {
  
  public function doSomething() {
    /**
     * Das ist ein Hook der in config.php registriert wurde
     * Die Parameter der Funktion hängen vom Hook ab und können im 
     * Handbuch oder im Code ermittelt werden
     */

    // Some code here
    // echo '<pre>'.print_r($param.1,1).'</pre>';
    // echo '<pre>'.print_r($param.2,1).'</pre>';
    // echo '<pre>'.print_r($param.N,1).'</pre>';
  }
}