@extends('layouts.app_admin')

@section('content')

    <!-- Header content-->
    <section class="content-header">
        @component('shop.admin.components.breadcrumb')
            @slot('title') Edit category {{$item->title}} @endslot
            @slot('parent') Main @endslot
            @slot('category') Categories list @endslot
            @slot('active') Edit category {{$item->title}} @endslot
        @endcomponent
    </section>

    <!-- Main content-->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="{{route('shop.admin.categories.update', $item->id)}}" method="post" data-toggle="validator">
                        @method('PATCH')
                        @csrf
                        <div class="box-body">
                            <div class="form-group has-feedback">
                                <label for="title">Category name</label>
                                <input type="text" name="title" class="form-control" id="title" value="{{$item->title}}" required>
                                <!--галочки валидации это "glyphicon form-control-feedback" -->
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                            </div>

                            <div class="form-group">
                                <select name="parent_id" id="parent_id" class="form-control" required>
                                    <option value="0">-- independent category --</option>

                                    @include('shop.admin.category.include.edit_categories_all_list', ['categories' => $categories])
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="keywords">Keywords</label>
                                <input type="text" name="keywords" class="form-control" id="keywords" value="{{old('keywords', $item->keywords)}}">
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" name="description" class="form-control" id="description" value="{{old('description', $item->description)}}">
                            </div>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </section>


@endsection
