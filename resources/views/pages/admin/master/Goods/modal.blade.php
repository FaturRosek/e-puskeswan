<x-mollecules.modal id="add-goods_modal" action="{{ route('barang.store') }}" method="POST"
    data-table-id="goods-table" tableId="goods-table" hasCloseBtn="true">
    <x-slot:title>Tambah Barang</x-slot:title>
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
            <x-atoms.input id="goods_name" name="goods_name" type="text" class="form-control" />
        </div>
        <div class="mb-6">
            <x-atoms.form-label required>Jenis Barang</x-atoms.form-label>
            <select id="goods_type" name="goods_type" class="form-control">
                <option value="">Pilih Jenis Barang</option>
                @foreach ($jenis as $d)
                    <option value="{{ $d->name_type }}">{{ $d->name_type }}</option>
                @endforeach
            </select>
        </div>        
    </div>
</x-mollecules.modal>
