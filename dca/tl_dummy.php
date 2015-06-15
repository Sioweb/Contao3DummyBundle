<?php

/**
* Contao Open Source CMS
*  
* @file tl_dummy.php
* @author Sascha Weidner
* @version 3.0.0
* @package sioweb.contao.extensions.dummy
* @copyright Sascha Weidner, Sioweb
*/


/**
 * Table tl_dummy 
 */
$GLOBALS['TL_DCA']['tl_dummy'] = array
(

  // Config
  'config' => array
  (
    'dataContainer'               => 'Table', /* Könnte auch Files sein */
    'enableVersioning'            => true, /* Versionierung einschalten */
    'sql' => array(
      'keys' => array (
        'id' => 'primary',
         //'pid' => 'index',
         //'alias' => 'index',
      )
    )
  ),

  // List
  'list' => array
  (
    /* Sorting & Label kopiet man am Besten aus einem bestehenden Modul das am ehesten mit diesem Modul übereinstimmt. */
    'sorting' => array
    (
      'mode'                    => 1,
      'fields'                  => array('headline'),
      'flag'                    => 1
    ),
    'label' => array
    (
      'fields'                  => array('headline', 'id'),
      'format'                  => '%s <span style="color:#b3b3b3; padding-left:3px;">[%s]</span>'
    ),
    /* Diese Operationen stehen am oberen Rand der Übersicht (neuer Artikel / mehrere bearbeiten / importieren / … ) */
    'global_operations' => array
    (
      'all' => array /* Mehrere bearbeiten */
      (
        /** 
         * href kann auch den Parameter key=KlassenName haben, dann wird diese Klasse geladen
         * Siehe config.php::callback
         */
        'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
        'href'                => 'act=select', 
        'class'               => 'header_edit_all',
        'attributes'          => 'onclick="Backend.getScrollOffset();" accesskey="e"'
      )
    ),

    /* Pro Zeile in der Übersicht kann man folgende Operationen ausführen: */
    'operations' => array
    (
      'edit' => array /* Diesen Eintrag editieren */
      (
        'label'               => &$GLOBALS['TL_LANG']['tl_dummy']['edit'],
        'href'                => 'act=edit',
        'icon'                => 'edit.gif'
      ),
      'copy' => array /* Diesen Eintrag kopieren */
      (
        'label'               => &$GLOBALS['TL_LANG']['tl_dummy']['copy'],
        'href'                => 'act=copy',
        'icon'                => 'copy.gif'
      ),
      'delete' => array /* Diesen Eintrag löschen */
      (
        'label'               => &$GLOBALS['TL_LANG']['tl_dummy']['delete'],
        'href'                => 'act=delete',
        'icon'                => 'delete.gif',
        'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
      ),
      'show' => array /* Diesen Eintrag anzeigen (Wer auch immer das braucht) */
      (
        'label'               => &$GLOBALS['TL_LANG']['tl_dummy']['show'],
        'href'                => 'act=show',
        'icon'                => 'show.gif'
      )
    )
  ),

  // Palettes
  'palettes' => array(
    'default'                     => '{title_legend},headline,author'
  ),

  // Fields
  'fields' => array(
    'id' => array(
      'sql'           => "int(10) unsigned NOT NULL auto_increment"
    ),
    'sorting' => array(
      'sql'           => "int(10) unsigned NOT NULL default '0'"
    ),
    'tstamp' => array(
      'sql'           => "int(10) unsigned NOT NULL default '0'"
    ),
    'headline' => array(
      'label'                   => &$GLOBALS['TL_LANG']['tl_dummy']['headline'],
      'exclude'                 => true,
      'inputType'               => 'text',
      'eval'                    => array('mandatory'=>true, 'maxlength'=>255),
      'sql'                     => "varchar(255) NOT NULL default ''"
    ),
    'author' => array
    (
      'label'                   => &$GLOBALS['TL_LANG']['tl_dummy']['author'],
      'default'                 => BackendUser::getInstance()->id,
      'exclude'                 => true,
      'search'                  => true,
      'inputType'               => 'select',
      'foreignKey'              => 'tl_user.name',
      'eval'                    => array('doNotCopy'=>true, 'mandatory'=>true, 'chosen'=>true, 'includeBlankOption'=>true, 'tl_class'=>'w50'),
      'sql'                     => "int(10) unsigned NOT NULL default '0'",
      'relation'                => array('type'=>'hasOne', 'load'=>'eager')
    ),
    'groups' => array(
      'label'                   => &$GLOBALS['TL_LANG']['tl_dummy']['groups'],
      'exclude'                 => true,
      'search'                  => true,
      'inputType'               => 'checkboxWizard',
      'foreignKey'              => 'tl_member_group.name',
      'eval'                    => array('multiple'=>true, 'feEditable'=>true, 'submitOnChange'=>true, 'tl_class'=>'long clr'),
      'sql'                     => "varchar(255) NOT NULL default ''"
    ),
  )
);

class tl_dummy extends Backend{
  
  public function __construct(){
    parent::__construct();
    $this->import('BackendUser', 'User');
  }

  /* Alle Methoden definieren die in der DCA oben angegeben wurden */
}