<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo d-flex">
                    <h1 class="mr-3">{{config('app.name')}}</h1>
                    <a href="{{url('/')}}"><img src="{{asset('frontend/assets/images/logo/logo.png')}}" alt="Logo" srcset="" style="height: 70px !important;"></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item
                {{(Request::is('admin')) ? 'active' : ''}}
                {{(Request::is('staff')) ? 'active' : ''}}
                {{(Request::is('user')) ? 'active' : ''}}
                ">
                    <a href="{{url('/home')}}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub {{ (Request::is('admin/user/*')) ? 'active' : ''}}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Manajemen User</span>
                    </a>
                    <ul class="submenu  {{ (Request::is('admin/user/*')) ? 'active' : ''}} ">
                        <li class="submenu-item  {{ (Request::is('/admin/user/create')) ? 'active' : ''}}">
                            <a href="{{url('/admin/user/create')}}">Tambah User</a>
                        </li>
                        <li class="submenu-item  {{ (Request::is('/admin/user/manage')) ? 'active' : ''}}">
                            <a href="{{url('/admin/user/manage')}}">Manage</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub  {{ (Request::is('supplier/*')) ? 'active' : ''}}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Supplier</span>
                    </a>
                    <ul class="submenu  {{ (Request::is('supplier/*')) ? 'active' : ''}} ">
                        <li class="submenu-item   {{ (Request::is('supplier/create')) ? 'active' : ''}}">
                            <a href="{{url('/supplier/create')}}">Input Supplier</a>
                        </li>
                        <li class="submenu-item  {{ (Request::is('supplier/manage')) ? 'active' : ''}}">
                            <a href="{{url('/supplier/manage')}}">Manage Supplier</a>
                        </li>
                    </ul>
                </li>
                
                <li class="sidebar-item  has-sub  {{ (Request::is('material/*')) ? 'active' : ''}}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Material / Bahan</span>
                    </a>
                    <ul class="submenu  {{ (Request::is('material/*')) ? 'active' : ''}} ">
                        <li class="submenu-item   {{ (Request::is('material/create')) ? 'active' : ''}}">
                            <a href="{{url('/material/create')}}">Input Ingredients</a>
                        </li>
                        <li class="submenu-item  {{ (Request::is('material/manage')) ? 'active' : ''}}">
                            <a href="{{url('/material/manage')}}">Manage Ingredients</a>
                        </li>
                    </ul>
                </li>
           

                <li class="sidebar-item  has-sub  {{ (Request::is('menu/*')) ? 'active' : ''}}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Coffe Menu</span>
                    </a>
                    <ul class="submenu  {{ (Request::is('menu/*')) ? 'active' : ''}} ">
                        <li class="submenu-item   {{ (Request::is('menu/create')) ? 'active' : ''}}">
                            <a href="{{url('/menu/create')}}">Input Menu</a>
                        </li>
                        <li class="submenu-item  {{ (Request::is('menu/manage')) ? 'active' : ''}}">
                            <a href="{{url('/menu/manage')}}">Manage Menu</a>
                        </li>
                    </ul>
                </li>


                <li class="sidebar-item  has-sub  {{ (Request::is('stock-opname/*')) ? 'active' : ''}}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Manage Stock Opname</span>
                    </a>
                    <ul class="submenu  {{ (Request::is('stock-opname/*')) ? 'active' : ''}} ">
                        <li class="submenu-item  {{ (Request::is('stock-opname/daily-input')) ? 'active' : ''}} ">
                            <a href="{{url('/stock-opname/daily-input')}}">Daily Input</a>
                        </li>
                        <li class="submenu-item  {{ (Request::is('stock-opname/report')) ? 'active' : ''}} ">
                            <a href="{{url('/stock-opname/report')}}">Report</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub  {{ (Request::is('inbound*')) ? 'active' : ''}}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Inbound Logistic</span>
                    </a>
                    <ul class="submenu  {{ (Request::is('inbound/*')) ? 'active' : ''}} ">
                        <li class="submenu-item   {{ (Request::is('inbound/create')) ? 'active' : ''}}">
                            <a href="{{url('/inbound/create')}}">Create New Inbound</a>
                        </li>
                        <li class="submenu-item  {{ (Request::is('/inbound/manage')) ? 'active' : ''}}">
                            <a href="{{url('/inbound/manage')}}">See Existing Inbound Logistic</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item  has-sub  {{ (Request::is('/outbond/*')) ? 'active' : ''}}">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Outbond Logistic</span>
                    </a>
                    <ul class="submenu  {{ (Request::is('outbond/*')) ? 'active' : ''}} ">
                        <li class="submenu-item   {{ (Request::is('outbond/history')) ? 'active' : ''}}">
                            <a href="{{url('/outbond/history')}}">Outbond Histories</a>
                        </li>
                    </ul>
                </li>
              

 
                <li class="sidebar-title">Logout</li>
                <li class="sidebar-item  ">
                    
                    <a href="{{url('/logout')}}" class="sidebar-link">
                        <i class="bi bi-life-preserver"></i>
                        <span>Logout</span>
                    </a>
                </li>
              

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>