<?php

namespace App\Http\Controllers\ShopController\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserOrderRequest;
use App\Models\UserRole;
use App\Repositories\Admin\MainAdminRepository;
use App\Repositories\Admin\UserRepository;
use App\User;
use Illuminate\Http\Request;
use MetaTag;

class UserController extends AdminBaseController
{
    private $user_repository;

    public function __construct()
    {
        parent::__construct();
        $this->user_repository = app(UserRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perpage = 8;
        $users = $this->user_repository->getAllUsers($perpage);
        MetaTag::setTags(['title' => 'Users list']);
        return view('shop.admin.user.user_index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        MetaTag::setTags(['title' => 'Add user']);
        $roles = $this->user_repository->getAllRoles();
        return view('shop.admin.user.user_create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserOrderRequest $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ]);

        if (!$user){
            return back()
                ->withErrors('Creating error')
                ->withInput();
        }else {
            $role = UserRole::create([
                'user_id' => $user->id,
                'role_id' => $request['role'],
            ]);
        }
        if (!$role){
            return back()
                ->withErrors('Creating role error')
                ->withInput();
        } else {
            return redirect(route('shop.admin.users.index'))
                ->with(['success' => 'User created']);
        }

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
        $perpage = 5;
        /*$item = $this->user_repository->getId($id);
        if (!$item){
            abort(404);
        }*/
        $orders = $this->user_repository->getAllUserOrders($id, $perpage);
        MetaTag::setTags(['title' => 'Edit user']);
        $role = $this->user_repository->getUserRole($id);
        dd($role);
        return view('shop.admin.user.user_edit', compact('orders', 'role'));

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
}
