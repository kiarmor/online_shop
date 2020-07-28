@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('shop.admin.components.breadcrumb')
            @slot('title')Add user @endslot
            @slot('parent') Main @endslot
            @slot('active') Add user @endslot
        @endcomponent
    </section>

    <!--Main content-->

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">

                    <form action="{{route('shop.admin.users.store')}}" method="post" data-toggle="validator">
                        @csrf
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" value="@if(old('name')){{old('name')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="text" class="form-control" name="password" value="@if(old('password')){{old('password')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group">
                                <label for="">Confirm password</label>
                                <input type="text" class="form-control" name="confirm_password" value="@if(old('confirm_password')){{old('confirm_password')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="@if(old('email')){{old('email')}} @else @endif" required>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <p>TODO: need to select role or remove from here and save default user</p>
                            </div>
                        </div>

                        <div class="box-footer">
                            <input type="hidden" name="id" value="">
                            <button type="submit" class="btn btn-primary">Save</button>

                        </div>
                    </form>

                </div>
            </div>
        </div>

    </section>

@endsection
