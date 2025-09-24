<div class="d-flex justify-content-center align-items-center gap-2">
    <a href="{{ route('pilihans.show', $pilihan->id) }}" class="btn btn-secondary">
        <i class="ti ti-eye fs-3"></i>
    </a>
    <a href="{{ route('pilihans.edit', $pilihan->id) }}" class="btn btn-warning">
        <i class="ti ti-edit fs-3"></i>
    </a>
    <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $pilihan->name }}', {{ $pilihan->id }})">
        <i class="ti ti-trash fs-3"></i>
    </button>
</div>

<form id="delete-form-{{ $pilihan->id }}" action="{{ route('pilihans.destroy', $pilihan->id) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<!-- Alert untuk konfirmasi penghapusan -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Penghapusan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus Menu <strong id="deleteName"></strong>?
                <input type="hidden" id="delete-form-id" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" onclick="deleteItem()">Hapus</button>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(name, id) {
        document.getElementById('deleteName').textContent = name;
        document.getElementById('delete-form-id').value = id; // Set ID to hidden input
        var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
    }

    function deleteItem() {
        const id = document.getElementById('delete-form-id').value; // Get ID from hidden input
        const form = document.getElementById(`delete-form-${id}`);
        form.submit();
    }
</script>
