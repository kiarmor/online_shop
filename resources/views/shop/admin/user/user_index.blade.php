@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('shop.admin.components.breadcrumb')
            @slot('title') Users list @endslot
            @slot('parent') Main @endslot
            @slot('active') Users list @endslot
        @endcomponent
    </section>

    <!-- Main content -->

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Login</th>
                                    <th>Email</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($users as $user)
                                    @php
                                    $class = '';
                                    $status = $user->role;
                                    if ($status == 'disabled') $class = 'danger';
                                    @endphp
                                    <tr class="{{$class}}">
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{ucfirst($user->name)}}</td>
                                        <td>{{$user->role}}</td>
                                        <td>
                                            <a href="{{route('shop.admin.users.edit', $user->id)}}"
                                            title="show user profile"><i class="btn btn-xs"></i>
                                            <button type="submit" class="btn btn-success bnt-xs">Show</button>
                                            </a>
                                            &nbsp;&nbsp;&nbsp;&nbsp;

                                            <a class="btn btn-xs">
                                                <form method="post" action="{{route('shop.admin.users.destroy', $user->id)}}" style="float: none">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-xs delete">Delete</button>
                                                </form>
                                            </a>
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center"><h2>No users</h2></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="text-center">
                            @if($users->total() == 0)
                            @else
                            <p>{{$users->count()}} user('s) from {{$users->total()}} </p>
                            @endif

                            @if($users->total() > $users->count())
                                <br>
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                {{$users->links()}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
