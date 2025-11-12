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

    public function listPeople(array $conditions) {
        

        $query = $this->filterPeople($conditions);        

        return $query;

    }

    private function filterPeople(array $conditions) {       
        
        $query = $this->getDao(self::$tablename);

        $firstConditionActive = true;

        if(!empty($conditions['name'])) {            

            $query->filter('name')->likeOf($conditions['name']);
            
            $firstConditionActive = false;

        }

        if(!empty($conditions['email'])) {            

            if($firstConditionActive) {

                $query->filter('email')->likeOf($conditions['email']);

            }else{
                $query->and('email')->likeOf($conditions['email']);
                $firstConditionActive = false;
            }

        }

        if(!empty($conditions['cellphone'])) {
            
            if($firstConditionActive) {

                $query->filter('cellphone')->equalsTo(intval($conditions['cellphone']));

            }else{
                $query->and('cellphone')->equalsTo(intval($conditions['cellphone']));
                $firstConditionActive = false;

            }

        }

        if(!empty($conditions['cpf'])) {
             
            if($firstConditionActive) {

                $query->filter('cpf')->equalsTo(intval($conditions['cpf']));

            }else{
                $query->and('cpf')->equalsTo(intval($conditions['cpf']));
                $firstConditionActive = false;

            }
        }

        if(!empty($conditions['address'])) {
             
            if($firstConditionActive) {

                $query->filter('address')->likeOf($conditions['address']);

            }else{
                $query->and('address')->likeOf($conditions['address']);
                $firstConditionActive = false;

            }
        }       
            
        

        return $query->find();        

        

    }   



}
