<x-mollecules.modal id="add-warehouse_modal" action="{{ route('gudang.store') }}" method="POST"
    data-table-id="warehouse-table" tableId="warehouse-table" hasCloseBtn="true">
    <x-slot:title>Tambah Gudang</x-slot:title>
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
            <x-atoms.form-label required>Nama Gudang</x-atoms.form-label>
            <x-atoms.input id="warehouse_name" name="warehouse_name" type="text" class="form-control" />
        </div>
        <div class="mb-6">
            <x-atoms.form-label required>Lokasi</x-atoms.form-label>
            <x-atoms.input id="location" name="location" type="text" class="form-control" />
        </div>
    </div>
</x-mollecules.modal>
