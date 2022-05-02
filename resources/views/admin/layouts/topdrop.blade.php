<div class="nav-item dropdown">
    <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
        <span class="avatar avatar-sm"
            style="background-image: url(https://ui-avatars.com/api/?name={{ auth()->user()->name }})"></span>
        <div class="d-none d-xl-block ps-2">
            <div>{{ auth()->user()->name }}</div>
            {{-- <div class="mt-1 small text-muted">UI Designer</div> --}}
        </div>
    </a>
    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
        <a href="#" class="dropdown-item">
            <i class="fa fa-user m-2"></i>
            Account</a>
        <div class="dropdown-divider"></div>
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="dropdown-item text-primary" type="submit">
                <i class="fa fa-sign-out mx-2"></i>
                Logout
            </button>
        </form>
    </div>
</div>
