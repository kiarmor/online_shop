<?php

namespace App\Http\Controllers\ShopController\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUserEditRequest;
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
     * @param AdminUserEditRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserEditRequest $request)
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
     * @param  int $id
     * @return void
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
        $user= $this->user_repository->getUser($id);
        if (!$user){
            abort(404);
        }
        $orders = $this->user_repository->getAllUserOrders($id, $perpage);
        MetaTag::setTags(['title' => 'Edit user']);
        $role = $this->user_repository->getUserRole($id);

        return view('shop.admin.user.user_edit', compact('orders', 'role', 'user'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param AdminUserEditRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUserEditRequest $request, $id)
    {
        $user = $this->user_repository->getUser($id);
        $updating = $this->user_repository->updateUser($user, $request);

        if (!$updating){
            return back()
                ->withErrors('Changes NOT saved')
                ->withInput();
        } else {
            return redirect(route('shop.admin.users.index'))
                ->with(['success' => 'User updated']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->user_repository->getUser($id);
        $deleting = $user->forceDelete();

        if (!$deleting){
            return back()
                ->withErrors('NOT deleted')
                ->withInput();
        } else {
            return redirect(route('shop.admin.users.index'))
                ->with(['success' => "User " . ucfirst($user->name) . " deleted"]);
        }
    }
}
