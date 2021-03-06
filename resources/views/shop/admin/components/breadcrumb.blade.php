<h1>
    @if(isset($title)){{$title }}@endif
</h1>

<ol class="breadcrumb">
    <li><a href="{{route('shop.admin.index.index')}}"><i class="fa fa-dashboard"></i>{{$parent}}</a></li>
    @if(isset($order))
        <li><a href="{{route('shop.admin.orders.index')}}"><i></i>{{$order}}</a></li>
    @endif
    @if(isset($category))
        <li><a href="{{route('shop.admin.categories.index')}}"><i></i>{{$category}}</a></li>
    @endif
    @if(isset($user))
        <li><a href="{{route('shop.admin.users.index')}}"><i></i>{{$user}}</a></li>
    @endif
    @if(isset($product))
        <li><a href=""><i></i>{{$product}}</a></li>
    @endif
    @if(isset($group_filter))
        <li><a href=""><i></i>{{$group_filter}}</a></li>
    @endif
    @if(isset($attrs_filter))
        <li><a href=""><i></i>{{$attrs_filter}}</a></li>
    @endif
    @if(isset($curency))
        <li><a href=""><i></i>{{$curency}}</a></li>
    @endif
    <li><i class="active"></i>{{$active}}</li>
</ol>