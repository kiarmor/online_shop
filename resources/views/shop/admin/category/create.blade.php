@extends('layouts.app_admin')

@section('content')

    <section class="content-header">
        @component('shop.admin.components.breadcrumb')
            @slot('title') Create new category @endslot
            @slot('parent') Main @endslot
            @slot('category') Categories list @endslot
            @slot('active') Create new category  @endslot
        @endcomponent
    </section>

    <!--Main content-->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="{{route('shop.admin.category.store', $item->id)}}" method="post" data-toggle="validator">
                        @csrf
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="title">Name category</label>
                                <input type="text" name="title" class="form-control" id="title" placeholder="Name Category" required value="{{old('title', $item->title)}}">
                                <!--галочки валидации это "glyphicon form-control-feedback" -->
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>
                            <div class="form-group">
                                <select name="parent_id" id="parent_id" class="form-control" required></select>
                                <option value="0">-- independent category --</option>

                                @include()
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
