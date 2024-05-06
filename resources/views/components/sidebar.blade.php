<div class="sidebar">
    <div class="sidebar-logo">CashCash</div>
    <ul class="sidebar-menu">
        <!-- Sidebar menu item -->
        @if(!auth()->user()->isTechnician())
        <li>
            <a href="{{ route('index') }}" class="{{ Route::is('index') ? 'active' : '' }}">
                <span class="icon"><i class="fa-solid fa-house-chimney"></i></span>
                <span class="title">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('clients.index') }}" class="{{ Route::is('clients.*') ? 'active' : '' }}">
                <span class="icon"><i class="fa-solid fa-user"></i></span>
                <span class="title">Clients</span>
            </a>
        </li>
        <li>
            <a href="{{ route('assignments.index') }}" class="{{ Route::is('assignments.*') ? 'active' : '' }}">
                <span class="icon"><i class="fa-solid fa-user-plus"></i></span>
                <span class="title">Assignments</span>
            </a>
        </li>
        <li>
            <a href="{{ route('interventions.index') }}" class="{{ Route::is('interventions.*') ? 'active' : '' }}">
                <span class="icon"><i class="fa-solid fa-toolbox"></i></span>
                <span class="title">Interventions</span>
            </a>
        </li>
        @endif
        @if(auth()->user()->isTechnician())
            <li>
                <a href="{{ route('techinterventions.index') }}" class="{{ Route::is('techinterventions.*') ? 'active' : '' }}">
                    <span class="icon"><i class="fa-solid fa-circle-check"></i></span>
                    <span class="title">Validations</span>
                </a>
            </li>
            <li>
                <a href="{{ route('chieftechnicians.index') }}" class="{{ Route::is('chieftechnicians.*') ? 'active' : '' }}">
                    <span class="icon"><i class="fa-solid fa-microchip"></i></span>
                    <span class="title">Technicians</span>
                </a>
            </li>
        @endif
        @if(!auth()->user()->isTechnician()) 
        <li>
            <a href="{{ route('techstats.index') }}" class="{{ Route::is('techstats.*') ? 'active' : '' }}">
                <span class="icon"><i class="fa-solid fa-chart-simple"></i></span>
                <span class="title">Statistics</span>
            </a>
        </li>
        @endif
    </ul>
</div>
<div class="mask" id="mask"></div>