<?php


namespace App\Model\Table;


use Cake\ORM\Table;
use Cake\Validation\Validator;

class PicturesTable extends Table
{
    public function initialize(array $config): void
    {
        parent::initialize($config); // TODO: Change the autogenerated stub
        $this->addBehavior('Timestamp');
    }
    public function validationDefault(Validator $validator):Validator{
        $validator->inList("online",[0,1],"Vous pouvez mettre que 0 ou 1");
        return $validator;
    }
}
