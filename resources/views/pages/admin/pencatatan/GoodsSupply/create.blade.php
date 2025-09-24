<x-mollecules.modal id="add-goodsrecording_modal" action="" method="POST" data-table-id="goodsrecording-table"
    tableId="goodsrecording-table" hasCloseBtn="true">
    <x-slot:title>Tambah Persediaan Barang</x-slot:title>
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
            <x-atoms.form-label required>Nama Barang</x-atoms.form-label>
            <select id="goods_id" name="goods_id" class="form-select" aria-label="Default select example">
                <option selected disabled>Nama Barang</option>
                @foreach ($barang as $d)
                    <option value="{{ $d->id }}">{{ $d->goods_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-6">
            <x-atoms.form-label required>Satuan</x-atoms.form-label>
            <select name="unit_id" id="unit_id" class="form-select">
                <option selected disabled>Satuan</option>
                @foreach ($satuan as $s)
                    <option value="{{ $s->id }}">{{ $s->unit_type }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-6">
            <x-atoms.form-label required>Lokasi</x-atoms.form-label>
            <select name="user_id" id="user_id" class="form-select">
                <option selected disabled>Lokasi</option>
                @foreach ($lokasi as $u)
                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-6">
            <x-atoms.form-label required>Stok</x-atoms.form-label>
            <input type="number" name="stock" id="stock" class="form-control">
        </div>
    </div>
</x-mollecules.modal>
