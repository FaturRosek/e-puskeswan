{{-- <div class="d-flex justify-content-center align-items-center gap-2">


    <a href="javascript:void(0)" class="btn btn-warning btn-center btn-sm editNews" data-id="{{ $news->id }}">
        <i class="ti ti-edit fs-3"></i>
    </a>


    <form action="{{ route('admin.cms.news.destroy', $news->id) }}" method="post"
        onsubmit="return confirm('Are you sure you want to delete this menu?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger btn-center btn-sm">
            <i class="ti ti-trash fs-3"></i>
        </button>
    </form>

</div> --}}
<div class="d-flex justify-content-center align-items-center gap-2">

    
    <a href="{{ route('admin.cms.news.edit', $news->id) }}"  class="btn btn-warning me-2" data-id="{{ $news->id }}">
        <i class="ti ti-edit fs-4"></i>
                      <span>Edit</span>
    </a>


    <form action="{{ route('admin.cms.news.destroy', $news->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this menu?');">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger m-0"><i class="ti ti-trash fs-4"></i> <span>Delete</span> </button>
    </form>

</div>
