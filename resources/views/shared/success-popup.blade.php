<div class="d-flex justify-content-center align-items-center">
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show w-75 text-center" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
</div>