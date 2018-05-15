@extends('admin.layout.master')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>List Users</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Show list users</h3>
              <a href="" class="add-users">New user</a>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

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
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Avatar</th>
                  <th>Action</th>
                </tr>
                <tr>
                  <td>183</td>
                  <td>John Doe</td>
                  <td>11-7-2014</td>
                  <td>John Doe</td>
                  <td>11-7-2014</td>
                  <td>Bacon</td>
                  <td>
                    <a href=""><i class="fa fa-edit"></i></a> |
                    <a href=""><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>183</td>
                  <td>John Doe</td>
                  <td>11-7-2014</td>
                  <td>John Doe</td>
                  <td>11-7-2014</td>
                  <td>Bacon</td>
                  <td>
                    <a href=""><i class="fa fa-edit"></i></a> |
                    <a href=""><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <td>183</td>
                  <td>John Doe</td>
                  <td>11-7-2014</td>
                  <td>John Doe</td>
                  <td>11-7-2014</td>
                  <td>Bacon</td>
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