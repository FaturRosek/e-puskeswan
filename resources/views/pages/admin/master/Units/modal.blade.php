<x-mollecules.modal id="add-units_modal" action="{{ route('satuan.store') }}" method="POST"
    data-table-id="units-table" tableId="units-table" hasCloseBtn="true">
    <x-slot:title>Tambah satuan</x-slot:title>
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
            <x-atoms.form-label required>Nama satuan</x-atoms.form-label>
            <x-atoms.input id="unit_type" name="unit_type" type="text" class="form-control" />
        </div>
    </div>
</x-mollecules.modal>
