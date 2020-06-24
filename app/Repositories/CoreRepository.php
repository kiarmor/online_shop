<?php
/**
 * Created by PhpStorm.
 * User: Anonimus
 * Date: 23.06.2020
 * Time: 18:24
 */

namespace App\Repositories;


abstract class CoreRepository
{

    protected $model;

    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    abstract protected function getModelClass();

    protected function startConditions(){
        return clone $this->model;
    }

    public function getId($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getRequestId($get = true, $id = 'id')
    {
        if ($get){
            $data = $_GET;
        }else {
            $data = $_POST;
        }

        $id = (int)(!empty($data[$id])) ?? null;

        if (!$id){
            throw new \Exception('Id is empty');
        }

        return $id;
    }
}