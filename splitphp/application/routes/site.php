<?php

namespace application\routes;

use \SplitPHP\WebService;

class Site extends WebService
{
  public function init()
  {
    $this->setAntiXsrfValidation(false);

    $this->homePage();

    $this->teste();
    
  }

  private function homePage() {

    $this->addEndpoint('GET', '/home', function ($params) {
      $message = $this->getService('example')->welcomeMsg();

      $templateVars = [
        'message' => $message,
        'params' => $params
      ];

      return $this->response
        ->withStatus(200)
        ->withHTML($this->renderTemplate('site/home', $templateVars));
    });
  }

  private function teste() {

    $this->addEndpoint('GET', '/teste', function ($params) {
      
      // $message = $this->getService('example')->testando();

      $db = $this->getDao('people')->find();
          

      return $this->response
        ->withStatus(200)
        ->withData($db);
    });

  }


}
