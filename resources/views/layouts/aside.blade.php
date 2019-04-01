<div class="app-sidebar__user"><img class="app-sidebar__user-avatar"src="{{asset('images/avatar128.png')}}" alt="User Image">
    <div>
        <p class="app-sidebar__user-name">{{Auth::user()->name}}</p>
        <p class="app-sidebar__user-designation"></p>
    </div>
</div>
<ul class="app-menu">
    <li><a class="app-menu__item @if($current_page == 'create') active @endif" href="/home"><i class="app-menu__icon fa fa-plus"></i><span class="app-menu__label">Create New Incident</span></a></li>  
    <li><a class="app-menu__item @if($current_page == 'search') active @endif" href="/incident/search"><i class="app-menu__icon fa fa-search"></i><span class="app-menu__label">Search an Incident(s)</span></a></li>
    <li><a class="app-menu__item @if($current_page == 'kdbindex') active @endif" href="/kdb/index"><i class="app-menu__icon fa fa-database"></i><span class="app-menu__label">Knowledge Base</span></a></li>
    @if (Auth::user()->role == "Admin")
        <li><a class="app-menu__item @if($current_page == 'user') active @endif" href="/user/index"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">User Management</span></a></li>       
    @endif
    </ul>