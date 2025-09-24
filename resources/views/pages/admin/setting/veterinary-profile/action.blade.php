<div class="d-flex justify-content-center align-items-center gap-2">
    <a href="{{ route('profile.edit', $profile->id) }}"  class="btn btn-warning me-2" data-id="{{ $profile->id }}">
        <i class="ti ti-edit fs-4"></i>
        <span>Edit</span>
    </a>
    <form action="{{ route('profile.destroy', $profile->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this menu?');">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger m-0"><i class="ti ti-trash fs-4"></i> <span>Delete</span> </button>
    </form>
</div>