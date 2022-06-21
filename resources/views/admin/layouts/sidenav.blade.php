<div class="collapse navbar-collapse" id="navbar-menu">
    <ul class="navbar-nav pt-lg-3">
        @php
            $links = config('adminpanel.sidebar_links');
        @endphp
        @foreach ($links as $key => $link)
            @if (isset($link['header']))
                <li class="nav-item px-2 my-2">
                    <div class="d-flex justify-content-center  border-bottom border-top  text-dark py-2">
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <x-icon :name="$link['icon']" class="icon" />
                        </span>
                        <span class="nav-link-title">
                            {{ $link['header'] }}
                        </span>
                    </div>
                </li>
            @else
                @php
                    $isCurrent = \Request::is($link['is']);
                @endphp
                @if (isset($link['child']))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle  {{ $isCurrent ? 'show' : '' }}" href="#navbar-extra"
                            data-bs-toggle="dropdown" data-bs-auto-close="false" role="button"
                            aria-expanded="{{ $isCurrent ? 'true' : 'false' }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <x-icon name="{{ $link['icon'] }}" class="" />
                            </span>
                            <span class="nav-link-title">
                                {{ $link['name'] }}
                            </span>
                        </a>
                        <div class="dropdown-menu {{ $isCurrent ? 'show' : '' }}">
                            <div class="dropdown-menu-columns">
                                <div class="dropdown-menu-column">
                                    @foreach ($link['child'] as $citem)
                                        <a class="dropdown-item {{ \Request::is($citem['is']) ? 'text-primary' : '' }}"
                                            href="{{ $citem['url'] }}">
                                            {{ $citem['name'] }}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ \Request::is($link['is']) ? 'text-primary' : 'dd' }} "
                            href="{{ $link['url'] }}">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <x-icon :name="$link['icon']" class="icon" />
                            </span>
                            <span class="nav-link-title">
                                {{ $link['name'] }}
                            </span>
                        </a>
                    </li>
                @endif
            @endif
        @endforeach
    </ul>
</div>
