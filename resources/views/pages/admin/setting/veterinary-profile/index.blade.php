@extends('layouts.app')

@section('content')
<div class="card" style="background: #67e7b642">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Profil Puskeswan</h5>
        <a href="{{ route('profile.create') }}" class="btn btn-success">+ Tambah Data</a>
    </div>
</div>
<div class="card-body py-4">
    <div class="d-flex align-items-center justify-content-between">
        <div class="d-flex align-items-center position-relative my-1">
            <span class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></span>
            <input type="text" data-kt-user-table-filter="search" data-table-id="profile-table"
                class="form-control form-control-solid w-250px ps-13" placeholder="Search Profile" id="mySearchInput" />
        </div>
    </div>
    <div class="table-responsive">
        {{ $dataTable->table() }}
    </div>
</div>

@push('scripts')
    {{ $dataTable->scripts() }}
    <script>
        const tableId = 'profile-table';

        $(document).ready(function() {
            $('[data-kt-user-table-filter="search"]').on('input', function() {
                window.LaravelDataTables[`${tableId}`].search($(this).val()).draw();
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $('#createNewProfile').click(function() {
            $('#savedata').val("create-profile");
            $('#id').val('');
            $('#add-profile_modal-form').trigger("reset");
            $('#add-profile_modal').modal('show');
            $('#updated_bydiv').addClass('d-none');
        });

        $('body').on('click', '.editProfile', function() {
            var id = $(this).data('id');
            $.get("{{ route('profile.edit', '') }}/" + id, function(data) {
                $('#updated_bydiv').removeClass('d-none');
                $('#savedata').val("edit-profile");
                $('#add-profile_modal').modal('show');
                $('#id').val(data.id);
                $('#title').val(data.title);
                $('#description').summernote('code', data.description);
                $('#created_by').val(data.created_by);
                $('#updated_by').val(data.updated_by);
            })
        });

        $('#savedata').click(function(e) {
            e.preventDefault();
            $.ajax({
                data: $('#add-profile_modal-form').serialize(),
                url: "{{ route('profile.store') }}",
                type: "POST",
                dataType: 'json',
                success: function(response) {
                    $('#add-profile_modal-form').trigger("reset");
                    $('#add-profile_modal').modal('hide');
                    window.LaravelDataTables[`${tableId}`].draw();
                    Swal.fire({
                        text: response.success,
                        icon: 'success',
                        buttonsStyling: false,
                        confirmButtonText: 'Close',
                        customClass: {
                            confirmButton: 'btn btn-primary',
                        }
                    });
                },
                error: function(response) {
                    if (response.status == 422) {
                        showValidationErrors(response.responseJSON.errors);
                    } else {
                        Swal.fire({
                            text: "Something went wrong. Please try again.",
                            icon: 'error',
                            buttonsStyling: false,
                            confirmButtonText: 'Close',
                            customClass: {
                                confirmButton: 'btn btn-primary',
                            }
                        });
                    }
                }
            });
        });
    </script>
@endpush
@endsection
