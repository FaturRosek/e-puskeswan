<x-mollecules.modal id="add-goodsrecording_modal" action="{{ route('pencatatan.store') }}" method="POST"
    data-table-id="goodsrecording-table" tableId="goodsrecording-table" hasCloseBtn="true">
    <x-slot:title>Tambah Pencatatan Barang</x-slot:title>
    <x-slot:iconClose>
        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="ki-outline ki-cross fs-2"></i>
        </div>
    </x-slot:iconClose>
    <x-slot:footer>
        <button class="btn-primary btn" type="submit" data-text="Save" data-text-loading="Saving">Save</button>
    </x-slot:footer>
    <div>
        <input type="hidden" name="id" id="id">
        <div class="mb-6">
            <select id="goods_id" name="goods_id" class="form-select" aria-label="Default select example">
                <option selected disabled>Nama Barang</option>
                @foreach ($barang as $d)
                    <option value="{{ $d->id }}">{{ $d->goods_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-6">
            <x-atoms.form-label required>Barang Masuk</x-atoms.form-label>
            <x-atoms.input id="goods_entry" name="goods_entry" type="text" class="form-control" />
        </div>
        <div class="mb-6">
            <x-atoms.form-label required>Barang Keluar</x-atoms.form-label>
            <x-atoms.input id="goods_out" name="goods_out" type="text" class="form-control" />
        </div>
        <div class="mb-6">
            <x-atoms.form-label required>Deskripsi</x-atoms.form-label>
            <x-atoms.textarea name="description" id="description" class="form-control"></x-atoms.textarea>
        </div>
    </div>
</x-mollecules.modal>
