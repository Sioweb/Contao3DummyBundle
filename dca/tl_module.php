<?php

/* Siehe tl_content */

$GLOBALS['TL_DCA']['tl_module']['palettes']['dummy'] .= ',neues_feld'; 

$GLOBALS['TL_DCA']['tl_module']['fields']['neues_feld'] = array(
  'label'                   => &$GLOBALS['TL_LANG']['tl_module']['neues_feld'],
  'exclude'                 => true,
  'inputType'               => 'checkbox', /* text, select, pageTree am besten in core/dca mal schauen */
  'sql'                     => "char(1) NOT NULL default ''"
);
