@extends('layouts.app')

@section('content')
    <div class="container-xxl" style="max-width: 1560px;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card" style="background: #67e7b642">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Puskeswan</h5>
                        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add-goods_modal" data-action="edit"
                           data-url="{{ route('puskeswans.create') }}" uuid="createNewGoods">+ Tambah Puskeswan</a>
                    </div>
                </div>
                <div class="table-responsive">
                    {{ $dataTable->table() }}
                </div>
            </div>
        </div>
    </div>

    @include('pages.admin.master.Puskeswans.modal')

    @push('scripts')
        {{ $dataTable->scripts() }}
        <script>
            const tableId = 'goods-table';

            $(document).ready(function() {
                const dataTable = window.LaravelDataTables[tableId];

                $('[uuid="searchBox"]').on('input', function() {
                    dataTable.search($(this).val()).draw();
                });

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $(document).on('click', '.delete-button', function(event) {
                    event.preventDefault();
                    let form = $(this).closest('form');
                    if (confirm('Are you sure you want to delete this item?')) {
                        $.ajax({
                            url: form.attr('action'),
                            type: 'POST',
                            data: {
                                _method: 'DELETE',
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.success) {
                                    // Menampilkan alert ketika data berhasil dihapus
                                    showAlert('Data berhasil dihapus.', 'success');
                                    dataTable.ajax.reload();
                                } else {
                                    alert('Error: ' + response.message);
                                }
                            },
                            error: function(response) {
                                alert('An error occurred while trying to delete the item.');
                            }
                        });
                    }
                });

                // Fungsi untuk menampilkan alert
                function showAlert(message, type) {
                    const alertDiv = $('<div class="alert alert-dismissible fade show" role="alert"></div>');
                    alertDiv.addClass('alert-' + type);
                    alertDiv.text(message);
                    const closeButton = $('<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>');
                    alertDiv.append(closeButton);
                    $('body').append(alertDiv);
                }
            });
        </script>
    @endpush
@endsection
