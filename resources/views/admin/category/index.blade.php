@extends('admin.layout.master')
@section('title', __('user.admin.index.title') )
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{@trans('category.admin.index.list_category')}}</h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> {{__('admin.dashboard')}}</a></li>
        <li class="active">{{@trans('category.admin.index.categories')}}</li>
      </ol>
    </section>
    @include('admin.layout.message');
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{__('category.admin.index.list_category')}}</h3>
              <a href="" class="add-users">{{__('category.admin.index.new_category')}}</a>
              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="{{@trans('category.admin.index.search')}}">
                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>{{@trans('category.admin.index.id')}}</th>
                  <th>{{@trans('category.admin.index.name')}}</th>
                  <th>{{@trans('category.admin.index.parent')}}</th>
                  <th>{{@trans('category.admin.index.action')}}</th>
                </tr>
                <tr>
                  <td>1</td>
                  <td></td>
                  <td><img src="{{ asset('images/users/default-user-avatar.png') }}" alt="" class="avatar"></td>
                  <td>
                    <a href=""><i class="fa fa-edit"></i></a> |
                    <a href=""><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
              </table>
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
