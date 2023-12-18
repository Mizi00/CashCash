<div class="navbar">
    <div class="navbar-content">
        <div class="navbar-left"><a id="navbar-menu" href="javascript:void(0);"><i class="fa-solid fa-bars"></i></a></div>
        <ul class="navbar-right">
            <li class="navbar-auth">
                <a href="">
                @php $userName = auth()->user()->firstName . ' ' . auth()->user()->lastName; @endphp
                    <div><img src="https://ui-avatars.com/api/?name={{ $userName }}&background=random&size=128" alt=""></div>
                    <div><span>{{ $userName }}</span></div>
                </a>
                <ul class="navbar-auth-dropdown">
                    <li>
                        <a href="{{ route('logout') }}">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>