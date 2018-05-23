<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li>
        <a href="{{route('admin')}}">
          <i class="fa fa-dashboard"></i> <span>{{__('admin.dashboard')}}</span>
        </a>
      </li>
      <li>
        <a href="{{route('user.index')}}">
          <i class="fa fa-table"></i> <span>{{__('admin.manage_user')}}</span>
        </a>
      </li>
      <li>
        <a href="">
          <i class="fa fa-table"></i> <span>{{__('admin.create_user')}}</span>
        </a>
      </li>
      <li>
        <a href="{{route('product.index')}}">
          <i class="fa fa-table"></i> <span>{{__('admin.manage_product')}}</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-table"></i> <span>{{__('admin.manage_post')}}</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-edit"></i> <span>{{__('admin.manage_order')}}</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
