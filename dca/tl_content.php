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
 */

$GLOBALS['TL_DCA']['tl_content']['palettes']['dummy'] = '{title_legend},headline,author,neues_feld'; 

$GLOBALS['TL_DCA']['tl_content']['fields']['neues_feld'] = array(
  
);