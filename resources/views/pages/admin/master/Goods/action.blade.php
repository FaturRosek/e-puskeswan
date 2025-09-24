<div class="d-flex justify-content-center align-items-center gap-2">
    <a href="{{ route('barang.show', $barang->id) }}" class="btn btn-secondary "><i class="ti ti-eye fs-3"></i></a>
    <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-warning "><i class="ti ti-edit fs-3"></i></a>
    <button data-csrf-token="{{ csrf_token() }}" data-url="{{ route('barang.destroy', $barang->id) }}"
        data-action="delete" data-table-id="goods-table" data-name="{{ $barang->goods_name }}"
        class="btn btn-danger ">
        <i class="ti ti-trash fs-3"></i></button>
</div>
