@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        <h1>
            Edit order № {{$item->id}}
            @if(!$order->status)
                <a href="{{route('shop.admin.orders.change', $item->id)}}/?status=1" class="btn btn-success btn-xs">Accept</a>
                <a href="#" class="btn btn-warning btn-xs redact">Edit</a>
            @else
                <a href="{{route('shop.admin.orders.change', $item->id)}}/?status=0" class="btn btn-default btn-xs">Return</a>
            @endif
            <a class="btn btn-xs" href="">
                <form id="delform" method="post" action="" style="float: none">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-xs delete">Delete</button>
                </form>
            </a>
        </h1>

        @component('shop.admin.components.breadcrumb')
            @slot('parent') Main @endslot
            @slot('order') Orders list @endslot
            @slot('active') Order № {{$item->id}} @endslot
        @endcomponent
    </section>

    <!-- main content-->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <form action="{{route('shop.admin.orders.save', $item->id)}}" method="post">
                                @csrf

                                <table class="table table-bordered table-hover">
                                    <tbody>
                                    <tr>
                                        <td>Order №</td>
                                        <td>{{$order->id}}</td>
                                    </tr>
                                    <tr>
                                        <td>Date of order</td>
                                        <td>{{$order->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <td>Order changed</td>
                                        <td>{{$order->updated_at}}</td>
                                    </tr>
                                    <tr>
                                        <td>Quantity products in order </td>
                                        <td>{{count($order_products)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Sum</td>
                                        <td>{{$order->sum}} {{$order->currency}}</td>
                                    </tr>
                                    <tr>
                                        <td>Name</td>
                                        <td>{{$order->name}}</td>
                                    </tr>
                                    <tr>
                                        <td>Status</td>
                                            @if($order->status == 1)
                                                <td>Completed</td>
                                            @elseif($order->status == 0)
                                                    <td>New</td>
                                            @elseif($order->status == 2)
                                                <td>Deleted</td>
                                            @endif
                                    </tr>
                                    <tr>
                                        <td>Comment</td>
                                        <td><input type="text" value="@if(isset($order->note)){{$order->note}}@endif" placeholder="@if(!isset($order->note)) no comment @endif" name="comment">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <input type="submit" name="submit" class="btn btn-warning" value="Save">

                            </form>
                        </div>
                    </div>
                </div>
                <h3>Details</h3>
                <div class="box">
                    <div class="box-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product title</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $qty = 0 @endphp
                                @foreach($order_products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->title}}</td>
                                        <td>{{$product->qty, $qty += $product->qty}}</td>
                                        <td>{{$product->price}}</td>
                                    </tr>
                                @endforeach

                                <tr class="active">
                                    <td colspan="2"><b>Total</b></td>
                                    <td><b>{{$qty}}</b></td>
                                    <td><b>{{$order->sum}} {{$order->currency}}</b></td>
                                </tr>
                                </tbody>
                            </table>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>



@endsection
