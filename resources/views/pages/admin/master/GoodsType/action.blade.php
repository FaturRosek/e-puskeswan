<div class="d-flex justify-content-center align-items-center gap-2">
    <a href="{{ route('jenis.show', $jenis->id) }}" class="btn btn-secondary "><i class="ti ti-eye fs-3"></i></a>
    <a href="{{ route('jenis.edit', $jenis->id) }}" class="btn btn-warning "><i class="ti ti-edit fs-3"></i></a>
    <button data-csrf-token="{{ csrf_token() }}" data-url="{{ route('jenis.destroy', $jenis->id) }}"
        data-action="delete" data-table-id="goodsType-table" data-name="{{ $jenis->name_type }}"
        class="btn btn-danger ">
        <i class="ti ti-trash fs-3"></i></button>
</div>
