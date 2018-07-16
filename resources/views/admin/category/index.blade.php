@extends('admin.layout.master')
@section('title', __('user.admin.index.title') )
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{__('category.admin.index.list_category')}}</h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> {{__('admin.dashboard')}}</a></li>
        <li class="active">{{__('category.admin.index.categories')}}</li>
      </ol>
    </section>
    @include('admin.layout.message')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{__('category.admin.index.list_category')}}</h3>
              <a href="{{ route('category.create') }}" class="add-users">{{__('category.admin.index.new_category')}}</a>
              <div class="box-tools">
                <form class="input-group input-group-sm" style="width: 150px;" action="{!! route('category.index') !!}" method="GET">
                  <input type="text" name="category_name" class="form-control pull-right" placeholder="Search">
                  <div class="input-group-btn">
                  <button type="submit" class="btn btn-default search-category"><i class="fa fa-search"></i></button>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>@sortablelink('id', __('category.admin.index.id'))</th>
                  <th>@sortablelink('name', __('category.admin.index.name'))</th>
                  <th>{{__('category.admin.index.parent')}}</th>
                  <th>{{__('category.admin.index.action')}}</th>
                </tr>
                @foreach($categories as $category)
                <tr>
                  <td>{{ $category->id }}</td>
                  <td>{{ $category->name }}</td> 
                  <td>
                  @foreach($category->parentCategories as $parentCategory)
                    {{ $parentCategory->name }}
                  @endforeach
                  </td>
                  <td>
                    <a href="{{route('category.edit', ['category' => $category->id])}}"><i class="fa fa-edit"></i></a> |
                    <a href="{{route('category.show', ['category' => $category->id])}}"><i class="fa fa-info"></i></a> 
                    @if($category->id !== App\Category::DEFAULT_CATEGORY_FOOD && $category->id !== App\Category::DEFAULT_CATEGORY_DRINK)
                      <form method="POST" action="{{route('category.destroy', ['category' => $category->id])}}" class="form-trash" onsubmit="return confirmDelete()">
                        @csrf
                        {{ method_field('DELETE') }}
                        | <button type="submit" class="but-trash"><i class="fa fa-trash"></i></button>
                      </form>
                    @endif 
                  </td>
                </tr>
                @endforeach
              </table>
              {{ $categories->appends(\Request::except('page'))->render() }}
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection
