<?php
/**
 * Created by PhpStorm.
 * User: Anonimus
 * Date: 03.07.2020
 * Time: 11:15
 */

namespace App\Repositories\Admin;


use App\Models\Admin\Category;
use App\Repositories\CoreRepository;
use App\Models\Admin\Category as Model;
use Illuminate\Support\Facades\DB;
use Menu as LavaryMenu;

class CategoryRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }


    protected function getModelClass()
    {
        return Model::class;
    }

    public function getAllCategories()//: \Illuminate\Database\Eloquent\Collection
    {
        return Category::all();
    }

    public function buildMenu($arr_menu)
    {
        $menu_builder = LavaryMenu::make('MyNav', function ($m) use ($arr_menu){
            foreach ($arr_menu as $item){
                if ($item->parent_id == 0){
                    $m->add($item->title, $item->id)
                    ->id($item->id);
                }elseif ($m->find($item->parent_id)){
                        $m->find($item->parent_id)
                        ->add($item->title, $item->id)
                            ->id($item->id);
                }
            }
        });

        return $menu_builder;
    }

    public function checkChildren($id)
    {
        $childrens = $this->startConditions()
            ->where('parent_id', $id)
            ->count();

        return $childrens;
    }

    public function checkParent($id)
    {
        $parents = DB::table('products')
            ->where('category_id', $id)
            ->count();

        return $parents;
    }

    public function deleteCategory($id)
    {
        $delete = $this->startConditions()
            ->find($id)
            ->forceDelete();

        return $delete;
    }

    public function getCombineCategories()
    {
        $columns = implode(',', [
            'id',
            'parent_id',
            'title',
            'CONCAT (id, ". ", title) AS combo_title',
        ]);

        $result = $this->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

        return $result;
    }

    public function getBaseCategories()
    {
        $cat = Category::with('children')
        ->where('parent_id', '0')
        ->get();

        return $cat;
    }

    public function checkUniqueName($name, $parent_id)
    {
        $name = $this->startConditions()
            ->where('title', '=', $name)
            ->where('parent_id', '=', $parent_id)
            ->exists();

        return $name;

    }

    public function saveToDataBase($request)
    {
        $item = new Category();
        $item->fill($request)->save();

        return $item;
    }
}