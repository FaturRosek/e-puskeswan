<x-mollecules.modal id="add-procurements_modal" action="{{ route('pengadaan.store') }}" method="POST"
    data-table-id="procurements-table" tableId="procurements-table" hasCloseBtn="true">
    <x-slot:title>Tambah Pengadaan</x-slot:title>
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
            <x-atoms.form-label required>Nama pengadaan</x-atoms.form-label>
            <x-atoms.input id="procurement_type" name="procurement_type" type="text" class="form-control" />
        </div>
    </div>
</x-mollecules.modal>
