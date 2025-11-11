<?php

namespace application\services;

use \SplitPHP\Service;

class PeopleAPI extends Service
{
  
  protected static $tablename = "people";
        

  
  private static function findPersonByCPF(int $cpf) {

      $result = $this->getDao(self::$tablename)
          ->filter('cpfParam')->equalsTo($cpf)
          ->find("SELECT * FROM " . self::$tablename . " WHERE cpf = ?cpfParam?")
      ;

      return $result;            

  }

  private static function insertNewPerson(array $data) {

    $person = $this->findPersonByCPF($data['cpf']);  
      
        if(!isset($data['cpf'])) {

            $result = $this->getDao(self::$tablename)
                ->insert($data);
            ;

            return $data;

        }

  }


  private static function updatePerson(int $id) {

  }
        

  protected static function deletePerson(int $id) {

    $result = $this->getDao(self::$tablename)
        ->filter('idParam')->equalsTo($id)
        ->delete("DELETE FROM " . self::$tablename . " WHERE id = ?idParam?")
    ;

    return $result;   

  }

  protected static function listPeople(array $conditions) {

  }

}
