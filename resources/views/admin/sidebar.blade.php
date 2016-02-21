<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset ("../resources/assets/img/camp2.jpg ") }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ Auth::user()->name }}</p>
      </div>
    </div>
    <br>
    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">Functions</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="active"><a href="#"><i class="fa fa-home"></i> <span>Home</span></a></li>
      <li class="treeview">
        <a href="#"><i class="fa fa-calendar-check-o"></i> <span>Registration</span> <i class="fa fa-angle-left pull-right"></i></a>
        <ul class="treeview-menu">
          <li><a href="{{ URL::to('/administrator/test') }}">Week 1</a></li>
          <li><a href="#">Week 2</a></li>
          <li><a href="#">Week 3</a></li>
          <li><a href="#">Week 4</a></li>
          <li><a href="#">Week 5</a></li>
          <li><a href="#">Week 6</a></li>
          <li><a href="#">Week 7</a></li>
        </ul>
      </li>
      <li><a href="#"><i class="fa fa-gears"></i> <span>Setup</span></a></li>
    </ul><!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
