{{-- Comments Message --}}
@if (Session::has('comment_added'))
    <div class="alert alert-success alert-dismissible  d-flex align-items-center fade show m-2" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
            <use xlink:href="#check-circle-fill" />
        </svg>
        <div>
            {{ Session::get('comment_added') }}
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
