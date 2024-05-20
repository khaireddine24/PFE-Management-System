<div class="navbar-default sidebar hidden-print" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
    
        <li>
            <a href=""><i class="fa fa-users fa-fw"></i> hello<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li><a href=""><i class="fa fa-users fa-fw"></i>hello</a></li>
                
                <li><a href=""><i class="fa fa-gears fa-fw"></i> besed</a></li>
                <li><a href=""><i class="fa fa-lock fa-fw"></i> behe</a></li>
                @endcan
            </ul>
        </li>


        <li>
            <a href=""><i class="fa fa-gears fa-fw"></i> Options <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                
                <li><a href=""><i class="fa fa-gears fa-fw"></i> Options</a></li>
              
                <li><a href=""><i class="fa fa-refresh fa-fw"></i> Backup/Restore DB</a></li>
            
            </ul>
        </li>
        @endcan
        <li><a href=""><i class="fa fa-lock fa-fw"></i> chanfe</a></li>
        <li class="nav-item">
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-light">Déconnexion</button>
            </form>
        </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->