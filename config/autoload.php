<?php

/**
 * Contao Open Source CMS
 */

/**
 * @file autoload.php
 * @author Sascha Weidner
 * @version 3.0.0
 * @package sioweb.contao.extensions.dummy
 * @copyright Sascha Weidner, Sioweb
 */

/* Namespace nach dem Muster firma\cms-name\extension\dummy */
ClassLoader::addNamespaces(array
(
    'sioweb\contao\extensions\dummy'
));
/*
 * Namespace\Klassenname => Pfad/zum/Klassenname 
 * Die Klassen werden schönerweise in Modules / Widgets / Classes / Elements etc gruppiert
 */
ClassLoader::addClasses(array
(
    // classes
    'sioweb\contao\extensions\dummy\BackendDummy'     => 'system/modules/dummy/classes/BackendDummy.php',
    // models
    'sioweb\contao\extensions\dummy\DummyModel'     => 'system/modules/dummy/models/DummyModel.php',
    // modules
    'sioweb\contao\extensions\dummy\ModuleDummy'    => 'system/modules/dummy/modules/ModuleDummy.php',
    // elements
    'sioweb\contao\extensions\dummy\ContentDummy'   => 'system/modules/dummy/elements/ContentDummy.php',
));


/* Templatename => Pfad zu den Templates */
TemplateLoader::addFiles(array
(
    'mod_dummy'   => 'system/modules/dummy/templates',
    'be_dummy'    => 'system/modules/dummy/templates/be',
));