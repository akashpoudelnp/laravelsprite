<aside class="navbar navbar-vertical navbar-expand-lg navbar-white border-end">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark">
            <a href="{{ config('adminpanel.dashboard_url') }}">
                @if (config('adminpanel.logo_image'))
                    <img src="{{ config('adminpanel.logo_url') }}" width="110" height="32" alt="site-logo"
                        class="navbar-brand-image">
                @else
                    <h3 class="">{{ config('adminpanel.app_name') }}</h3>
                @endif
            </a>
        </h1>
        <div class="navbar-nav flex-row d-lg-none">
            @include('admin.layouts.topdrop')
        </div>
        @include('admin.layouts.sidenav')
    </div>
</aside>
