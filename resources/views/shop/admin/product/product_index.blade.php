@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('shop.admin.components.breadcrumb')
            @slot('title') Product list @endslot
            @slot('parent') Main @endslot
            @slot('active') Product list @endslot
        @endcomponent
    </section>
    Product list!!

@endsection
