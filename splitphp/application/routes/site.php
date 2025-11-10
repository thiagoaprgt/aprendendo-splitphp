<?php

namespace application\routes;

use \SplitPHP\WebService;

class Site extends WebService
{
  public function init()
  {
    $this->setAntiXsrfValidation(false);

    $this->homePage();

    

    if(!empty($this->hostAllowList())) {

      $this->teste();
     
    }

   
    
  }

  private function hostAllowList() {

    $host = [getallheaders()["Host"]];;

    $hostsAllowedList = [
      "localhost:8000",
      "localhost:5173",
    ];

    return array_intersect($hostsAllowedList, $host);
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
