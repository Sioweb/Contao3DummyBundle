<?php

class ContentDummy extends \Content {
  
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

}