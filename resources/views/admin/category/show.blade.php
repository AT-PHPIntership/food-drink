@extends('admin.layout.master')
@section('title', __('user.admin.index.title') )
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{__('category.admin.show.info')}}</h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> {{__('admin.dashboard')}}</a></li>
        <li><a href="{{ route('category.index') }}">{{__('category.admin.create.manage_category')}}</a></li>
        <li class="active">{{__('category.admin.show.info')}}</li>
      </ol>
    </section>
    @include('admin.layout.message')
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>{{ __('category.admin.index.name') }}</th>
                  <th>{{ __('category.admin.index.children') }}</th>
                  <th>{{ __('category.admin.index.parent') }}</th>
                </tr>
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        @foreach($children as $child)
                            {{ $child->name }} </br>
                        @endforeach
                    </td>
                    <td>
                        @foreach($parentCategories as $parentCategory)
                            {{ $parentCategory->name }} </br>
                        @endforeach
                    </td>
                  
                </tr>
                <table>
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
