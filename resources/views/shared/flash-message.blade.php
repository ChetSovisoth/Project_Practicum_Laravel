<div class="d-flex justify-content-center align-items-center">
    @if (session()->has('flash_notification.message'))
        <div class="alert alert-{{ session('flash_notification.level') }} alert-dismissible fade show w-75 text-center" role="alert">
            {{ session('flash_notification.message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>
