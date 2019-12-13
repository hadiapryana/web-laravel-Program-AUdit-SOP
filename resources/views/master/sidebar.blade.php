
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
        
          <img src="{{ asset('admin/img/user2-160x160.jpg') }}" class="" alt="User Image" >
        </div>
        <div class="pull-left info">
          <p>{{auth()->user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
       
        <li>
          <a href="{{url('beranda')}}">
          <img src="{{ asset('admin/icon/beranda.png') }}" style="padding-right: 10px;
    padding-bottom: 10px;" height="30" width="30"> <span> Beranda</span>
            
          </a>
        </li>

        <li>
          <a href="{{url('vdinas')}}"><img src="{{ asset('admin/icon/building.png') }}" style="padding-right: 10px;
    padding-bottom: 10px;" height="30" width="30"> <span>Kelola Dinas</span>
            
          </a>
        </li>

        <li>
          <a href="{{url('vbidang')}}"><img src="{{ asset('admin/icon/building-bidang.png') }}" style="padding-right: 10px;
            padding-bottom: 10px;" height="30" width="30"> <span>Kelola Bid/Bag/Sek</span>
            
          </a>
        </li>

        <li>
          <a href="{{url('vseksi')}}"><img src="{{ asset('admin/icon/aktivitas.png') }}" style="padding-right: 10px;
            padding-bottom: 10px;" height="30" width="30"><span>Kelola Seksi</span>
            
          </a>
        </li>

        <li>
          <a href="{{url('vuser')}}"><img src="{{ asset('admin/icon/users.png') }}" style="padding-right: 10px;
            padding-bottom: 10px;" height="30" width="30"><span>Kelola Pengguna</span>

          </a>
        </li>
    
      <!--  <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('tabel')}}"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="../tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>-->
        
    </section>
    <!-- /.sidebar -->
  </aside>

