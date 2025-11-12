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


  public function findPersonById(int $id) {

      $result = $this->getDao(self::$tablename)
          ->filter('IdParam')->equalsTo($id)
          ->find("SELECT * FROM " . self::$tablename . " WHERE id = ?IdParam?")
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


  public function updatePerson(array $data) {   
    

    $result = $this->getDao(self::$tablename)
        ->filter('id')->equalsTo($data['id'])
        ->update($data);
    ;

    return $result;        

  }
        

  public function deletePerson(int $id) {

    $result = $this->getDao(self::$tablename)
        ->filter('id')->equalsTo($id)
        ->delete()
    ;

    return $result;   

  }

  public function listAllPeople() {

    $result = $this->getDao(self::$tablename)
        ->find("SELECT * FROM " . self::$tablename)
    ;

    return $result;

  }

  protected function listPeople(array $conditions) {

    $where = $this->filterPeople($conditions);

    $result = $this->getDao(self::$tablename)
        ->find("SELECT * FROM " . $where);
    ;

    return $result;

  }

  private function filterPeople(array $conditions) {

    $data = [        
        'name' => $conditions['name'],
        'email' => $conditions['email'],
        'cellphone' => $conditions['cellphone'],
        'cpf' => $conditions['cpf'],
        'address' => $conditions['address']
    ];

    $where = 'WHERE ';

    $count = 0;

    foreach ($data as $key => $value) {
        

        if($count < count($data)) {

            if(!empty($data[$key])) {
                $where .= $key . ' = ' . $value . ' AND ';
            }

        }else{
            $where .= $key . ' = ' . $value;
        }

        $count++;
               
    }

    return $where;    

  }



}
