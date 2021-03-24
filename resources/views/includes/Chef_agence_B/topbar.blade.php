<nav class="navbar p-l-5 p-r-5">
    <ul class="nav navbar-nav navbar-left">
        <li>
            <div class="navbar-header">
                <a class="bars" href="javascript:void(0);"></a>
                <a class="navbar-brand" href="#"><img src="https://thememakker.com/templates/oreo/html/assets/images/logo.svg" width="30" alt="UC"><span class="m-l-10">Unity</span></a>
            </div>
        </li>
        <li><a class="ls-toggle-btn" data-close="true" href="javascript:void(0);"><i class="zmdi zmdi-swap"></i></a></li>
        <li class="hidden-md-down"><a href="" title="Events"><i class="zmdi zmdi-calendar"></i></a></li>
        <li class="hidden-md-down"><a href="" title="Inbox"><i class="zmdi zmdi-email"></i></a></li>
        <li><a href="" title="Contact List"><i class="zmdi zmdi-account-box-phone"></i></a></li>
        <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-notifications"></i>
                <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
            </a>
        </li>
        <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button"><i class="zmdi zmdi-flag"></i>
                <div class="notify">
                    <span class="heartbit"></span>
                    <span class="point"></span>
                </div>
            </a>
        </li>
        <li class="hidden-sm-down">
            <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search...">
                <span class="input-group-addon"><i class="zmdi zmdi-search"></i></span>
            </div>
        </li>
        <li class="float-right">
        <a class="mega-menu" data-close="true" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('logout') }}
            <i class="zmdi zmdi-power"></i>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
        </form>
        </a>
        
        <a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a>
        </li>
    </ul>
</nav>
