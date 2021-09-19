<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('bower_components/admin-lte/dist/img/avatar04.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Test</a>
        </div>
    </div>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>{{ __('Home') }}</p>
                </a>
            </li>
            <li class="nav-header">EMPLOYEE MANGEMENT</li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('employee') || request()->is('employee/*') ? 'active' : '' }}" href="{{ route('employee.index')}}">
                    <i class="fas fa-building nav-icon"></i>
                    <p>{{ __('Employees') }}</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->is('designation') || request()->is('designation/*') ? 'active' : '' }}" href="{{ route('designation.index')}}">
                    <i class="fas fa-users nav-icon"></i>
                    <p>{{ __('Designations') }}</p>
                </a>
            </li>
            
            
        </ul>
    </nav>
</div>
