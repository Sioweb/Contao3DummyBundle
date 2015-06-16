<?php

/**
 * Contao Open Source CMS
 */

/**
 * @file Template.php
 * @class Template
 * @author Sascha Weidner
 * @version 3.0.0
 * @package sioweb.contao.extensions.dummy
 * @copyright Sascha Weidner, Sioweb
 */

/* Die neue Klasse kann nach wie vor von der Contao-Klasse erben, aber der Namespace muss voll ausgeschrieben werden */
class Template extends \Contao\Template {
  public function output() {

    /* Beispiel-Code aus dem Modul HtmlCache */

    // if (!$this->strBuffer)
    //   $this->strBuffer = $this->parse();

    // $this->strBuffer = $this->minifyHtml($this->strBuffer);
    // return $this->strBuffer;
  }
}