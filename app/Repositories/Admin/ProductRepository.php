<?php
/**
 * Created by PhpStorm.
 * User: Anonimus
 * Date: 24.06.2020
 * Time: 9:46
 */

namespace App\Repositories\Admin;
use App\Models\Admin\Product as Model;


use App\Repositories\CoreRepository;

class ProductRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Model::class;
    }

    public function getLastProducts($perpage)
    {
        return $this->startConditions()
            ->orderBy('id', 'desc')
            ->limit($perpage)
            ->paginate($perpage);
    }
}