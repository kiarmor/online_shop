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
   {{$role}}
@endsection
