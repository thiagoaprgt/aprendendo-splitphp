<?php

namespace application\services;

use \SplitPHP\Service;

class PeopleAPI extends Service
{
  
  public static $tablename = "people";
        

  
  public function findPersonByCPF(int $cpf) {

      $result = $this->getDao(self::$tablename)
          ->filter('cpfParam')->equalsTo($cpf)
          ->find("SELECT * FROM " . self::$tablename . " WHERE cpf = ?cpfParam?")
      ;

      return $result;            

  }

  public function insertNewPerson(array $data) {

    $person = $this->findPersonByCPF($data['cpf']);  
      
        if(empty($person)) {

            $result = $this->getDao('people')
                ->insert($data);
            ;

            return $data;

        }

        return json_encode("erro");

  }


  public static function updatePerson(int $id) {

  }
        

  public static function deletePerson(int $id) {

    $result = $this->getDao(self::$tablename)
        ->filter('idParam')->equalsTo($id)
        ->delete("DELETE FROM " . self::$tablename . " WHERE id = ?idParam?")
    ;

    return $result;   

  }

  public function listAllPeople() {

    $result = $this->getDao(self::$tablename)
        ->find("SELECT * FROM " . self::$tablename)
    ;

    return $result;

  }

  protected static function listPeople(array $conditions) {

  }

}
