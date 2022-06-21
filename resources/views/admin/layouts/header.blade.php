<header id="header" class="navbar navbar-expand-md navbar-light d-none d-lg-flex d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item dropdown d-none d-md-flex me-3" id="notifications-user">
                <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                    aria-label="Show notifications" aria-expanded="false">
                    <x-icon name="tabler-bell" class="icon" />
                    @if (auth()->user()->unread_notifications->count() > 0)
                        <span class="badge bg-red"></span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Notifications</h3>
                        </div>
                        <div class="list-group list-group-flush list-group-hoverable">
                            @forelse (auth()->user()->unread_notifications as $notification)
                                <div class="list-group-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto"><span
                                                class="status-dot status-dot-animated {{ $notification->color }} d-block"></span>
                                        </div>
                                        <div class="col text-truncate">
                                            <a title=" {{ $notification->data }}" href="#" class="text-body d-block">
                                                {{ $notification->created_at->diffForHumans() }}
                                            </a>
                                            <div title=" {{ $notification->data }}"
                                                class="d-block text-muted  text-truncate  text-gray mt-n1">
                                                {{ $notification->data }}

                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <form class="makeread" onsubmit="return false;"
                                                id="markread-notification-{{ $notification->id }}"
                                                action="{{ route('admin.notifications.mark-as-read', [$notification->id, auth()->user()->id]) }}"
                                                method="POST">
                                                @csrf
                                                <button id="mainButton" class="btn btn-sm border-0 rounded btn-green"
                                                    type="submit">
                                                    <x-icon name="tabler-eye" class="icon mx-auto" />
                                                </button>
                                                <button style="display: none;" id="loadingButton"
                                                    class="btn btn-sm border-0 rounded btn-green" type="button"
                                                    disabled>
                                                    <span class="spinner-grow spinner-grow-sm" role="status"
                                                        aria-hidden="true"></span>
                                                    <span class="visually-hidden">Loading...</span>
                                                </button>
                                            </form>


                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="list-group-item">
                                    <div class="p-2">No new Notification</div>
                                </div>
                            @endforelse

                        </div>
                    </div>
                </div>

            </div>
            @include('admin.layouts.topdrop')

        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
            <div>

            </div>
        </div>
    </div>
</header>
