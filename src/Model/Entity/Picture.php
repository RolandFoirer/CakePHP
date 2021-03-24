<?php


namespace App\Model\Entity;


use Cake\ORM\Entity;

class Picture extends Entity
{
    protected $_virtual = ['full_name'];
    protected function _getFullName(){
        return $this->first_name.''.$this->last_name;
    }
}
