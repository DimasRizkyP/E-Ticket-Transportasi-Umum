<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fab fa-asymmetrik"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-TICKET TRANSPORTASI</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('dasboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data Master
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-car-alt"></i>
            <span>Data Transportasi</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('Databus')}}">Bus</a>
                <a class="collapse-item" href="{{route('Datapesawat')}}">Pesawat</a>
                <a class="collapse-item" href="{{route('Datakereta')}}">Kereta Api</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-diagnoses"></i>
            <span>Data Transit</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('Dataterminal')}}">Terminal</a>
                <a class="collapse-item" href="{{route('Databandara')}}">Bandara</a>
                <a class="collapse-item" href="{{route('Datastasiun')}}">Stasiun</a>
            </div>
        </div>
    </li>
    <!-- data rute -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities2"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-route"></i>
            <span>Data Rute</span>
        </a>
        <div id="collapseUtilities2" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('Datarutebus')}}">Rute Bus</a>
                <a class="collapse-item" href="{{route('Datarutepesawat')}}">Rute Pesawat</a>
                <a class="collapse-item" href="{{route('Datarutekereta')}}">Rute Kereta</a>
            </div>
        </div>
    </li>


        <!-- data jadwal -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities3"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="far fa-calendar-alt"></i>
                <span>Jadwal Keberangkatan</span>
            </a>
            <div id="collapseUtilities3" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route('Datajadwalbus')}}">Jadwal Bus</a>
                    <a class="collapse-item" href="{{route('Datajadwalpesawat')}}">Jadwal Pesawat</a>
                    <a class="collapse-item" href="{{route('Datajadwalkereta')}}">Jadwal Kereta</a>
                </div>
            </div>
        </li>

        <!-- data tiket -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities4"
                aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-ticket-alt"></i>
                <span>Data Tiket</span>
            </a>
            <div id="collapseUtilities4" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{route('Datatiketbus')}}">Tiket Bus</a>
                    <a class="collapse-item" href="{{route('Datatiketpesawat')}}">Tiket Pesawat</a>
                    <a class="collapse-item" href="{{route('Datatiketkereta')}}">Tiket Kereta</a>
                </div>
            </div>
        </li>
         <!-- Heading -->
    <div class="sidebar-heading">
        Data Customer
    </div>



    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('Datapemesan')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Pemesan</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('Datapengguna')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Pengguna</span></a>
    </li>
     <!-- Nav Item - Tables -->
     <li class="nav-item">
        <a class="nav-link" href="{{route('Datauser')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>User Akun</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
