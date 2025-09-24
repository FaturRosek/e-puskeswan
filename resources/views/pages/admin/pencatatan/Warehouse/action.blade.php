<div class="d-flex justify-content-center align-items-center gap-2">
    <a href="{{ route('gudang.show', $gudang->id) }}" class="btn btn-secondary "><i class="ti ti-eye fs-3"></i></a>
    <a href="{{ route('gudang.edit', $gudang->id) }}" class="btn btn-warning "><i class="ti ti-edit fs-3"></i></a>
    <button data-csrf-token="{{ csrf_token() }}" data-url="{{ route('gudang.destroy', $gudang->id) }}"
        data-action="delete" data-table-id="warehouse-table" data-name="{{ $gudang->warehouse_name }}"
        class="btn btn-danger ">
        <i class="ti ti-trash fs-3"></i></button>
</div>
