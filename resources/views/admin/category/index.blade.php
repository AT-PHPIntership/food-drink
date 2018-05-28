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
    @include('admin.layout.message');

	  <!-- Create Item Modal -->
		<div class="modal fade" id="create-category" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
		        <h4 class="modal-title" id="myModalLabel">Create Category</h4>
		      </div>
		      <div class="modal-body">
		      		<form data-toggle="validator" action="{!! route('category.store') !!}" method="POST">
		      			<div class="form-group">
							<label class="control-label" for="title">Name:</label>
							<input type="text" name="category" class="form-control" data-error="Please enter title." />
							<div class="bg-danger" id="errors-input-name"></div>
						</div>
						<div class="form-group">
							<label class="control-label" for="title">Parent:</label>
              <select class="form-control" name="category">
                 @foreach ( $nameCategories as $Category )
                  <option value="{{ $Category->id }}" name="parent_id" class="form-control" data-error="Please enter parent.">{{ $Category->name }}</option>
                 @endforeach
              </select>
						</div>
						<div class="form-group">
							<button type="submit" class="btn create-submit btn-success">Submit</button>
            </div>           
		      	</form>
          </div>
		    </div>
		  </div>
		</div>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{__('category.admin.index.list_category')}}</h3>
              <a href="" class="add-users" data-toggle="modal" data-target="#create-category" >{{__('category.admin.index.new_category')}}</a>
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
                  <th>{{__('category.admin.index.id')}}</th>
                  <th>{{__('category.admin.index.name')}}</th>
                  <th>{{__('category.admin.index.parent')}}</th>
                  <th>{{__('category.admin.index.action')}}</th>
                </tr>
                <tbody>
                @foreach($categories as $category)
                <tr>
                  <td>{{ $category->id }}</td>
                  <td><a href="">{{ $category->name }}</a></td> 
                  <td>
                  @foreach($category->parentCategories as $parentCategory)
                    {{ $parentCategory->name }}
                  @endforeach
                  </td>
                  <td>
                    <a href=""><i class="fa fa-edit"></i></a>  |
                    <form method="POST" action="" class="form-trash">
                      @csrf
                      {{ method_field('DELETE') }}
                      <button type="submit" class="but-trash"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                </tr>
                @endforeach
                <tbody>
              </table>
              {{ $categories->links() }}
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
