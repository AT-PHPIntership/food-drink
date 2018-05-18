@extends('admin.layout.master')
@section('title', __('user.admin.index.title') )
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>List Users</h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> {{__('admin.dashboard')}}</a></li>
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
                @foreach($users as $user)
                <tr>
                  <td>{{ $user->id }}</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->userInfo->address }}</td>
                  <td>{{ $user->userInfo->phone }}</td>
                  <td><img src="{{ asset('images/users/'.$user->userInfo->avatar) }}" alt="{{ $user->userInfo->avatar }}" class="avatar"></td>
                  @if($user->id == App\User::ROOT_ADMIN)
                  <td>
                  <a href=""><i class="fa fa-edit"></i></a>
                  </td>
                  @else
                  <td>
                    <a href="{{route('user.edit', $user->id)}}"><i class="fa fa-edit"></i></a> |
                    <form method="POST" action="{!! route('user.destroy', ['user' => $user->id]) !!}" class="form-trash">
                      @csrf
                      {{ method_field('DELETE') }}
                      <button type="submit" class="but-trash" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                  @endif
                </tr>
                @endforeach
              </table>
              {{ $users->links() }}
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
