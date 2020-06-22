@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('shop.admin.components.breadcrumb')
            @slot('title') Control panel @endslot
            @slot('parent') Main @endslot
            @slot('active') Active @endslot
        @endcomponent
    </section>

@endsection
