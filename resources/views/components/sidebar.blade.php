<div class="sidebar">
    <div class="sidebar-logo">CashCash</div>
    <ul class="sidebar-menu">
        <!-- Sidebar menu item -->
        <li>
            <a href="{{ route('clients.index') }}">
                <span class="icon"><i class="fa-solid fa-stroopwafel"></i></span>
                <span class="title">Clients</span>
            </a>
        </li>
        <li>
            <a href="{{ route('assignments.index') }}">
                <span class="icon"><i class="fa-solid fa-stroopwafel"></i></span>
                <span class="title">Assignments</span>
            </a>
        </li>
        <li>
            <a href="{{ route('interventions.index') }}">
                <span class="icon"><i class="fa-solid fa-stroopwafel"></i></span>
                <span class="title">Iternventions</span>
            </a>
        </li>
        <li>
            <a href="{{ route('techinterventions.index') }}">
                <span class="icon"><i class="fa-solid fa-stroopwafel"></i></span>
                <span class="title">Validations</span>
            </a>
        </li>
        <li>
            <a href="{{ route('techstats.index') }}">
                <span class="icon"><i class="fa-solid fa-stroopwafel"></i></span>
                <span class="title">Statistics</span>
            </a>
        </li>
    </ul>
</div>
<div class="mask" id="mask"></div>