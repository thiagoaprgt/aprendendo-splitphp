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
      $this->registerNewPerson();
      $this->listAllPeople();
      $this->deletePerson();
     
    }

   
    
  }

  private function hostAllowList() {

    $host = [getallheaders()["Host"]];;

    $hostsAllowedList = [
      "localhost:8000",
      "127.0.0.1:8000",
      "localhost:5173",
      "127.0.0.1:5173"
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

  private function registerNewPerson() {

    $this->addEndpoint('POST', '/registerNewPerson', function ($params) {
       
      $data = [
        'name' => $params['name'],
        'email' => $params['email'],
        'cellphone' => $params['cellphone'],
        'cpf' => $params['cpf'],
        'address' => $params['address']
      ];      

      $result = $this->getService('peopleAPI')->insertNewPerson($data);


      return $this->response
        ->withStatus(200)
        ->withData($result);


    });
  }


  private function listAllPeople() {

    $this->addEndpoint('GET', '/listAllPeople', function ($params){

      $result = $this->getService('peopleAPI')->listAllPeople();


      return $this->response
        ->withStatus(200)
        ->withData($result);

    });

  }


  private function deletePerson() {

    $this->addEndpoint('POST', '/deletePerson', function ($params){

      $data = [
        'id' => intval($params['id']),
        
      ];   

      $result = $this->getService('peopleAPI')->deletePerson($data['id']);


      return $this->response
        ->withStatus(200)
        ->withData($result);

    });

  }


}
