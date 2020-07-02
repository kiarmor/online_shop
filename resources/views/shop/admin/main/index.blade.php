@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('shop.admin.components.breadcrumb')
            @slot('title') Control panel @endslot
            @slot('parent') Main @endslot
            @slot('active')  @endslot
        @endcomponent
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h4>Orders quantity: {{$count_orders}}</h4>
                        <p>New orders</p>
                    </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="{{route('shop.admin.orders.index')}}" class="small-box-footer">More info
                            <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <div class="small-box bg-green">
                    <div class="inner">
                        <h4>Products quantity: {{$count_products}}</h4>
                        <p>Products</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="" class="small-box-footer">More info
                        <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h4>Users quantity: {{$count_users}}</h4>
                        <p>User registration</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="" class="small-box-footer">More info
                        <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h4>Categories quantity: {{$count_categories}}</h4>
                        <p>Categories</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="" class="small-box-footer">More info
                        <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>

        </div>
        <div class="col-md-6">
            @include('shop.admin.main.include.orders')
            @include('shop.admin.main.include.recently')
        </div>
    </section>

@endsection
