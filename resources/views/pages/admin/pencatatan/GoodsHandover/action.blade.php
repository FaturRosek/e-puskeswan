<div class="d-flex justify-content-center align-items-center gap-1">
    <a href="{{ route('serahterima.show', $serahterima->id) }}" class="btn btn-secondary "><i
            class="ti ti-eye fs-1"></i></a>
    <a href="{{ route('serahterima.export_pdf', $serahterima->id) }}" class="btn btn-danger" target="_blank" download>
        <i class="fas fa-file-pdf fs-1"></i>
    </a>
        <a href="{{ route('serahterima.edit', $serahterima->id) }}" class="btn btn-warning "><i
            class="ti ti-edit fs-1"></i>
        </a>
    <button data-csrf-token="{{ csrf_token() }}" data-url="{{ route('serahterima.destroy', $serahterima->id) }}"
        data-action="delete" data-table-id="goodshandover-table" class="btn btn-danger ">
        <i class="ti ti-trash fs-1"></i></button>
</div>
