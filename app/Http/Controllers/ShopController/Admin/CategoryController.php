<?php

namespace App\Http\Controllers\ShopController\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Repositories\Admin\CategoryRepository;
use Illuminate\Http\Request;
use MetaTag;

class CategoryController extends AdminBaseController
{

    private $categoryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->categoryRepository = app(CategoryRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        MetaTag::setTags(['title' => 'Categories list']);
        $arr_menu = $this->categoryRepository->getAllCategories();
        $menu = $this->categoryRepository->buildMenu($arr_menu);

        return view('shop.admin.category.category_index', ['menu' => $menu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = new Category();
        $combineCategory = $this->categoryRepository->getCombineCategories();
        $base_categories = $this->categoryRepository->getBaseCategories();
        MetaTag::setTags(['title' => 'Create category']);

        return view('shop.admin.category.create', [
            'categories' => $base_categories,
            'delimiter' => '-',
            'item' => $category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function mydel(Request $request)
    {
        try {
            $id = $request->id;
        } catch (\Exception $exception){
            abort(404);
        }

        $children = $this->categoryRepository->checkChildren($id);
        if ($children !== 0){
            return back()->withErrors(['msg' => 'Can\'t delete, some Subcategories in Category']);
        }
        $parent = $this->categoryRepository->checkParent($id);
        if ($parent !== 0){
            return back()->withErrors(['msg' => 'Can\'t delete, some products in Category']);
        }
       $delete = $this->categoryRepository->deleteCategory($id);

        if ($delete){
            return redirect()
                ->route('shop.admin.categories.index')
                ->with(['success' => "Category with id {$id} delete successfully."]);
        } else {
            return back()->withErrors(['msg' => 'Delete error.']);
        }
    }
}
