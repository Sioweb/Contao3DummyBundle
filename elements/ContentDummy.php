<?php

class ContentDummy extends \ContentElement {

  protected $strTemplate = 'dummy_default';
  
  /* Vorkonfiguration für Compile, Backendausgabe stylen */
  public function generate() {
    return parent::generate();
  }

  /* Ajax generate */
  public function generateAjax() {
    // 
  }

  public function executeAjaxAction() {
    // Handle with Ajax-Data
    // Input::get('Ajax-Data') eqal to $_GET['Ajax-Data']
    // Input::post('Ajax-Data') eqal to $_POST['Ajax-Data']

    // JSON Data zurückgeben?
    // echo json_encode([]);
    // die();
  }

  public function executeAnotherAjaxAction() {
    // Handle with Ajax-Data
    // Input::get('Ajax-Data') eqal to $_GET['Ajax-Data']
    // Input::post('Ajax-Data') eqal to $_POST['Ajax-Data']

    // JSON Data zurückgeben?
    // echo json_encode([]);
    // die();
  }

  public function compile() {

    /* Ein Template im Template Laden? */

    /* Ein Template */
    // $objTemplate = new \FrontendTemplate('template_name');
    // $objTemplate->setData(/* Array mit Daten*/);
    // $objTemplate->title = 'This iz Title!';
    // $this->Template->output = $objTemplate->parse();

    /* Mehrere Datensätze */
    // $arrOutput = array();
    // while(true) {
    //   // $objTemplate = new \FrontendTemplate('template_name');
    //   // $objTemplate->setData(/* Array mit Daten*/);
    //   // $objTemplate->title = 'This iz Title!';
    //   // $arrOutput[] = $objTemplate->parse();
    // }
    // $this->Template->output = arrOutput;

    $this->Template->dummy = 'Hallo, Welt!';
  }

}
