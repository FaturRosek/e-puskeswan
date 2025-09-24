<div class="d-flex justify-content-center align-items-center gap-2">
    <a href="{{ route('satuan.show', $satuan->id) }}" class="btn btn-secondary "><i class="ti ti-eye fs-3"></i></a>
    <a href="{{ route('satuan.edit', $satuan->id) }}" class="btn btn-warning "><i class="ti ti-edit fs-3"></i></a>
    <button data-csrf-token="{{ csrf_token() }}" data-url="{{ route('satuan.destroy', $satuan->id) }}"
        data-action="delete" data-table-id="units-table" data-name="{{ $satuan->unit_type }}"
        class="btn btn-danger ">
        <i class="ti ti-trash fs-3"></i></button>
</div>
