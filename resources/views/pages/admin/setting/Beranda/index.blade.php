@extends('layouts.app')

@section('content')
<div class="card" style="background: #67e7b642">
    <div class="card-body">
        <h5 class="card-title fw-semibold mb-4">Beranda</h5>
    </div>
</div>
<div class="card">
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Sub Judul</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="goods-type-table-body">
            @if($beranda->count() > 0)
                @foreach($beranda as $rs)
                    <tr id="beranda-{{ $rs->id }}">
                        <td>{{ $rs->judul }}</td>
                        <td>{{ $rs->sub_judul }}</td>
                        <td>
                            <img src="{{ asset($rs->image) }}" style="width: 70px; height:70px;" alt="Img" />
                        </td>
                        <td>
                            <a href="{{ route('beranda.show', $rs->id) }}" class="btn btn-secondary me-2">
                                <i class="ti ti-eye fs-4"></i>
                            </a>
                            <a href="{{ route('beranda.edit', $rs->id)}}" class="btn btn-warning me-2">
                                <i class="ti ti-edit fs-4"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="4">data tidak ditemukan</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

<!-- Modal -->
@include('pages.admin.setting.Beranda.create')

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#add-goods-type-form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response) {
                    $('#addGoodsTypeModal').modal('hide');
                    $('#goods-type-table-body').append('<tr id="beranda-' + response.id + '"><td>' + response.name_type + '</td><td>' +
                        '<a href="{{ url("beranda") }}/' + response.id + '" class="btn btn-secondary me-2">' +
                        '<i class="ti ti-eye fs-4"></i></a>' +
                        '<a href="{{ url("beranda") }}/' + response.id + '/edit" class="btn btn-warning me-2">' +
                        '<i class="ti ti-edit fs-4"></i></a>' +
                        '<form action="{{ url("beranda") }}/' + response.id + '" method="POST" class="d-inline" onsubmit="return confirm(\'Delete?\')">' +
                        '@csrf @method("DELETE")' +
                        '<button class="btn btn-danger m-0 delete-button" data-id="' + response.id + '">' +
                        '<i class="ti ti-trash fs-4"></i></button></form></td></tr>');
                },
                error: function(response) {
                    // Tangani kesalahan
                }
            });
        });

        $(document).on('click', '.delete-button', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            if (confirm('Delete?')) {
                $.ajax({
                    url: '{{ url("beranda") }}/' + id,
                    method: 'POST',
                    data: {
                        _method: 'DELETE',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#beranda-' + id).remove();
                    },
                    error: function(response) {
                        // Tangani kesalahan
                    }
                });
            }
        });
    });
</script>
@endsection
