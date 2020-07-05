@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('shop.admin.components.breadcrumb')
            @slot('title') Categories list @endslot
            @slot('parent') Main @endslot
            @slot('active') Categories list  @endslot
        @endcomponent
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div width="100%">
                            <small style="margin-left: 70px">For edit press to category</small>
                            <small style="margin-left: 70px">You can't delete category with products or "children's"</small>
                        </div>
                        <br>
                        @if($menu)
                            <div class="list-group list-group-root well">

                                @include('shop.admin.category.menu.customMenuItems', ['items' => $menu->roots()])

                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
