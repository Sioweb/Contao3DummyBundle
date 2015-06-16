<?php

/**
 * Contao Open Source CMS
 */

/**
 * @file config.php
 * @author Sascha Weidner
 * @version 3.0.0
 * @package sioweb.contao.extensions.dummy
 * @copyright Sascha Weidner, Sioweb
 */

/* 
 * ASSETS laden
 * TL_MODE kann FE oder BE sein.
 * Mit TL_MODE kann auch gesteuert werden, ob Hooks in (FE)Frontend oder (BE)Backend sein kann
 */
if(TL_MODE == 'FE')
	$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/dummy/assets/dummy.js';





/* Modul in die Backend-Navigation einbinden, für die DCA-Datei /dca/tl_dummy.php */
array_insert($GLOBALS['BE_MOD']['kategorie'], 4, array(
	/* Aus der DCA generieren */
	'dummy' => array(
		'tables' => array('tl_dummy'),
		'icon' => 'system/modules/dummy/assets/sioweb16x16.png'
	),
	/* Eigenes Template nutzen ohne DCA */
	'dummy_custom' => array(
		'callback'   => 'BackendDummy',
		'icon'       => 'system/modules/dummy/assets/sioweb16x16.png',
		'stylesheet' => 'system/modules/dummy/assets/backend.css'
	)
));





/* Einen neuen Modul-Typ anlegen (z. B. wie Navigation oder News) */
array_insert($GLOBALS['FE_MOD'], 2, array (
	'kategorie' => array (
		'dummy'   		=> 'ModuleDummy', /* Ist in autoload.php definiert */
	)
));





/*
 * Ein neues Inhaltselement definieren
 * Statt kategorie kann auch eine vorhandene Kategorie gewählt werden. Siehe /core/config/config.php
 */
array_insert($GLOBALS['TL_CTE'],2,array (
	'kategorie' => array (
		'inhaltselement_id' => 'ContentDummy',
	),
));





/* Beispiel vorhandene Kategorie erweitern */
array_insert($GLOBALS['TL_CTE']['texts'],2,array (
	'inhaltselement_id' => 'ContentDummy',
));





/**
 * Einen Hook nur registrieren, falls der User im Backend ist 
 * Hooks können via 'TL_HOOK' in ganz Contao gefunden werden
 * Einige Hooks sind im Handbuch aufgelistet und erklärt - einige muss man selber finden.
 */
if(TL_MODE == 'BE') {
  $GLOBALS['TL_HOOKS']['loadDataContainer'][] = array('sioweb\contao\extensions\dummy\DummyClass', 'doSomething');
}