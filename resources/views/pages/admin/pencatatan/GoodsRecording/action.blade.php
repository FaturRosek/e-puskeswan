<div class="d-flex justify-content-center align-items-center gap-2">
    {{-- <button data-action="show" data-modal-id="add-goodsrecording_modal"
        data-title="Provinsi" class="btn btn-secondary me-2"><i
            class="ti ti-eyes fs-3">Detail</i></button> --}}
    <a href="{{ route('pencatatan.show', $pencatatan->id) }}" class="btn btn-secondary "><i class="ti ti-eye fs-3"></i></a>
    {{-- <button data-action="edit" data-url="{{ route('pencatatan.edit', $pencatatan->id) }}" data-modal-id="add-goodsrecording_edit" 
        class="btn btn-warning ">
        <i class="ti ti-edit fs-3"></i></button> --}}
    <a href="{{ route('pencatatan.edit', $pencatatan->id) }}" class="btn btn-warning "><i class="ti ti-edit fs-3"></i></a>
    <button data-csrf-token="{{ csrf_token() }}" data-url="{{ route('pencatatan.destroy', $pencatatan->id) }}"
        data-action="delete" data-table-id="goodsrecording-table" data-name="{{ $pencatatan->goods_name }}"
        class="btn btn-danger ">
        <i class="ti ti-trash fs-3"></i></button>
</div>
