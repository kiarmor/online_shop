@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('shop.admin.components.breadcrumb')
            @slot('title') Control panel @endslot
            @slot('parent') Main @endslot
            @slot('active') Orders list @endslot
        @endcomponent
    </section>
    <!--Main content -->
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
                                    <th>User</th>
                                    <th>Status</th>
                                    <th>Sum</th>
                                    <th>Created at</th>
                                    <th>Changed at</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($orders as $order)
                                    @php $class = $order->status ? 'success' : '' @endphp
                                <tr class="{{$class}}">
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->name}}</td>
                                    <td>
                                        @if($order->status == 0) New
                                        @elseif($order->status == 1)<b style="color: green">Completed</b>
                                        @elseif($order->status == 2) <b style="color: red">Deleted</b> @endif
                                    </td>
                                    <td>{{$order->sum}} {{$order->currency}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>{{$order->updated_at}}</td>
                                    <td>
                                        <a href="{{route('shop.admin.orders.edit', $order->id)}}" title="edit order"><i class="fa fa-fw fa-eye"></i></a>
                                        <a href="{{route('shop.admin.orders.destroy', $order->id)}}" title="delete order"><i class="fa fa-fw fa-close text-danger delete BD"></i></a>
                                    </td>
                                </tr>
                                    @empty
                                    <tr>
                                        <td class="text-center" colspan="3"><h4>No orders</h4></td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center">
                            <p>{{count($orders)}} order('s) from {{$count_orders}}</p>
                            @if($orders->total() >  $orders->count())
                                <br>
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                {{$orders->links()}}
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
