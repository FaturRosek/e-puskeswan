<div class="d-flex justify-content-center align-items-center gap-2">
    <a href="{{ route('pengadaan.show', $pengadaan->id) }}" class="btn btn-secondary "><i class="ti ti-eye fs-3"></i></a>
    <a href="{{ route('pengadaan.edit', $pengadaan->id) }}" class="btn btn-warning "><i class="ti ti-edit fs-3"></i></a>
    <button data-csrf-token="{{ csrf_token() }}" data-url="{{ route('pengadaan.destroy', $pengadaan->id) }}"
        data-action="delete" data-table-id="procurements-table" data-name="{{ $pengadaan->procurement_type }}"
        class="btn btn-danger ">
        <i class="ti ti-trash fs-3"></i></button>
</div>
