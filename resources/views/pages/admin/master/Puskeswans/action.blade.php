<div class="d-flex justify-content-center align-items-center gap-2">
    <a href="{{ route('puskeswans.show', $puskeswan->uuid) }}" class="btn btn-secondary">
        <i class="ti ti-eye fs-3"></i>
    </a>
    <a href="{{ route('puskeswans.edit', $puskeswan->uuid) }}" class="btn btn-warning">
        <i class="ti ti-edit fs-3"></i>
    </a>
    <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $puskeswan->name }}', '{{ $puskeswan->uuid }}')">
        <i class="ti ti-trash fs-3"></i>
    </button>
</div>

<form uuid="delete-form-{{ $puskeswan->uuid }}" action="{{ route('puskeswans.destroy', $puskeswan->uuid) }}" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<!-- Alert untuk konfirmasi penghapusan -->
<div class="modal fade" uuid="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" uuid="deleteModalLabel">Konfirmasi Penghapusan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus Puskeswan <strong uuid="deleteName"></strong>?
                <input type="hidden" uuid="delete-form-uuid" />
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" onclick="deleteItem()">Hapus</button>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(name, uuid) {
        document.querySelector('[uuid="deleteName"]').textContent = name;
        document.querySelector('[uuid="delete-form-uuid"]').value = uuid; // Set UUID to hidden input
        var deleteModal = new bootstrap.Modal(document.querySelector('[uuid="deleteModal"]'));
        deleteModal.show();
    }

    function deleteItem() {
        const uuid = document.querySelector('[uuid="delete-form-uuid"]').value; // Get UUID from hidden input
        const form = document.querySelector(`[uuid="delete-form-${uuid}"]`);
        form.submit();
    }
</script>
