<div class="sidebar-inner">
    <div class="si-inner">
        <div class="profile-menu">
            <a href="#">
                <div class="profile-pic">
                    <img src="/img/profile-pics/1.jpg" alt="">
                </div>
                
                <div class="profile-info">
                    <?php echo Auth::user()->name; ?>
                    
                    <i class="md md-arrow-drop-down"></i>
                </div>
            </a>
            
            <ul class="main-menu">
                <li>
                    <a href="{{ route( 'users.show', Auth::user()->id ) }}"><i class="md md-person"></i> View Profile</a>
                </li>
                <li>
                    <a href="{{ url('/auth/logout') }}"><i class="md md-history"></i> Logout</a>
                </li>
            </ul>
        </div>
        
        <ul class="main-menu">
            <li class="active"><a href="{{ route('dashboard') }}"><i class="md md-home"></i> Home</a></li>
            <li class="sub-menu">
                <a href="#"><i class="md md-trending-up"></i>Administration</a>
                <ul>
                    <li><a href="{{ route('users.index') }}">Users</a></li>
                    <li><a href="{{ route('roles.index') }}">Roles</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>