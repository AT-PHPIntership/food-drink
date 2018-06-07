@extends('admin.layout.master')
@section('title', __('user.admin.index.title') )
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{__('user.admin.index.list_user')}}</h1>
      <ol class="breadcrumb">
        <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> {{__('admin.dashboard')}}</a></li>
        <li class="active">{{__('user.admin.index.user')}}</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{__('user.admin.index.show_user')}}</h3>
              <a href="{{route('user.create')}}" class="add-users">{{__('user.admin.index.new_user')}}</a>
              <div class="box-tools">
                <form class="input-group input-group-sm" style="width: 150px;" action="{!! route('user.index') !!}" method="GET">
                  <input type="text" name="user_name" class="form-control pull-right" placeholder="{{__('user.admin.index.search')}}">
                  <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>@sortablelink('id', __('user.admin.index.id'))</th>
                  <th>@sortablelink('name', __('user.admin.index.name'))</th>
                  <th>@sortablelink('email', __('user.admin.index.email'))</th>
                  <th>{{__('user.admin.index.address')}}</th>
                  <th>{{__('user.admin.index.phone')}}</th>
                  <th>{{__('user.admin.index.avatar')}}</th>
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
                  <td>
                    <a href="{{route('user.edit', $user->id)}}"><i class="fa fa-edit"></i></a>
                    @if($user->id !== App\User::ROLE_ADMIN)
                    <form method="POST" action="{!! route('user.destroy', ['user' => $user->id]) !!}" class="form-trash" onsubmit="return confirmDelete()">
                      @csrf
                      {{ method_field('DELETE') }}
                      | <button type="submit" class="but-trash"><i class="fa fa-trash"></i></button>
                    </form>
                  </td>
                  @endif
                </tr>
                @endforeach
              </table>
              {{ $users->appends(\Request::except('page'))->render() }}
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
