<?php

/**
 * In dieser Datei, werden die Eingabefelder der Core-Datei /core/dca/tl_content.php üebrschrieben
 * Wichtig ist, dass dieses Modul auch erst nach dem Core geladen wird. Standardmäßig werden alle Module nach 
 * dem Core geladen. Aber will man die News-DCA überschreiben, muss man in der /config/autoload.ini angeben, 
 * dass die News als erstes geladen werden sollen ( requires[] = "news" )
 *
 * Felder müssen nicht neu definiert werden, fall es sie schon gibt und sollten auch nicht neu definiert werden,
 * da es sonst die Funktionalität anderer Erweiterungen beeinträchtigen könnte.
 * Am besten schaut man erstmal in /core/dca/tl_content.php nach, welche Felder und Paletten es schon gibt.
 *
 * Paletten sind unterschiedliche Formulare für den selben Datensatz, Beispielsweise für eine Reguläre Seite
 * oder einer weiterleitung ...
 *
 * Muster: '{fieldset_legende},feld1,feld2,feld3;{fieldset2_legende},feld21,feld22,feld23'
 * (Kein Semikolon am Schluss!)
 */

$GLOBALS['TL_DCA']['tl_content']['palettes']['dummy'] = '{title_legend},headline,author,neues_feld'; 

$GLOBALS['TL_DCA']['tl_content']['fields']['neues_feld'] = array(
  'label'                   => &$GLOBALS['TL_LANG']['tl_content']['neues_feld'],
  'exclude'                 => true,
  'inputType'               => 'checkbox', /* text, select, pageTree am besten in core/dca mal schauen */
  'sql'                     => "char(1) NOT NULL default ''"
);

/**
 * Alle Paletten erweitern?
 * Dazu einfach die Paletten mit einer Foreach durchlaufen und entweder eure Felder anhängen oder sie irgendwo einfügen.
 */

// $GLOBALS['TL_DCA']['tl_content']['palettes']['default'] .= ',dynamicContent';

// foreach($GLOBALS['TL_DCA']['tl_content']['palettes'] as $type => &$palette)
//   $palette = preg_replace('|{type_legend},([^;]*);|','{type_legend},$1,dynamicContent;',$palette);