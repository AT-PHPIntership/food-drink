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
        <a href="{{ route('user.index') }}">
          <i class="fa fa-users"></i> <span>{{__('admin.manage_user')}}</span>
        </a>
      </li>
      <li>
        <a href="{{ route('category.index') }}">
          <i class="fa fa-th-list"></i> <span>{{__('admin.manage_category')}}</span>
        </a>
      </li>
      <li>
        <a href="{{route('product.index')}}">
          <i class="fa fa-product-hunt"></i> <span>{{__('admin.manage_product')}}</span>
        </a>
      </li>
      <li>
        <a href="{{route('admin.post.index')}}">
          <i class="fa fa-clipboard"></i> <span>{{__('admin.manage_post')}}</span>
        </a>
      </li>
      <li>
        <a href="{{route('order.index')}}">
          <i class="fa fa-cart-arrow-down"></i> <span>{{__('admin.manage_order')}}</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
