@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('shop.admin.components.breadcrumb')
            @slot('title') Edit user @endslot
            @slot('parent') Main @endslot
            @slot('user') Users list @endslot
            @slot('active') Edit user @endslot
        @endcomponent
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <!--for data-toggle="validator"-->
                    <form action="{{route('shop.admin.users.update', $user->id)}}" method="post" data-toggle="validator">
                        @method('PUT')
                        @csrf
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="login">Login <small style="font-size: small; font-weight: normal">change automatically</small></label>
                                <input type="text" class="form-control" placeholder="{{ucfirst($user->name)}}" disabled>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" class="form-control" name="password" placeholder="enter password, if you want to change it">
                            </div>
                            <div class="form-group">
                                <label for="">Confirm password</label>
                                <input type="text" class="form-control" name="password_confirmation" placeholder="confirm password">
                            </div>
                            <div class="form-group has-feedback">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="@if(old('name')){{old('name')}}@else{{$user->name ?? ""}}@endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="@if(old('email')){{old('email')}}@else{{$user->email ?? ""}}@endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="role">Role</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="2" @php if ($role == 'user') echo ' selected' @endphp>User</option>
                                    <option value="3" @php if ($role == 'admin') echo ' selected' @endphp>Admin</option>
                                    <option value="4" @php if ($role == 'moderator') echo ' selected' @endphp>Moderator</option>
                                    <option value="2" @php if ($role == 'disabled') echo ' selected' @endphp>Disabled</option>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
                <h3>User orders</h3>
                <div class="box">
                    <div class="box-body">
                        @if(count($orders))
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Status</th>
                                        <th>Sum</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach($orders as $order)
                                        @php $class = $order->status ? 'success' : '' @endphp
                                        <tr class="{{$class}}">
                                            <td>{{$order->id}}</td>
                                            <td>{{$order->status ? 'Complete' : 'New'}}</td>
                                            <td>{{$order->sum}} {{$order->currency}}</td>
                                            <td>{{$order->created_at}}</td>
                                            <td>{{$order->updated_at}}</td>
                                            <td><a href="{{route('shop.admin.orders.edit', $order->id)}}"><i class="fa fa-fw fa-eye"></i></a></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        @else
                            <p class="text-danger">No orders</p>
                        @endif
                    </div>
                </div>

                <div class="text-center">
                   {{-- <p>{{count($count_orders)}} orders from {{$count}}</p>--}}

                    @if($orders->total() > $orders->count())
                        <br>
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        {{$orders->links}}
                                    </div>
                                </div>
                            </div>
                        </div>
                     @endif
                </div>
            </div>
        </div>
    </section>

@endsection
