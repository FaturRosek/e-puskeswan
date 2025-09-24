@extends('layouts.app')

@section('content')
<div class="card" style="background: #67e7b642">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Kontak</h5>
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
                <th>Email</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="goods-type-table-body">
            @if($contact->count() > 0)
                @foreach($contact as $rs)
                    <tr id="contact-{{ $rs->id }}">
                        <td>{{ $rs->email }}</td>
                        <td>{{ $rs->alamat }}</td>
                        <td>{{ $rs->telepon }}</td>
                        <td>
                            <a href="{{ route('contact.show', $rs->id) }}" class="btn btn-secondary me-2">
                                <i class="ti ti-eye fs-4"></i>
                            </a>
                            <a href="{{ route('contact.edit', $rs->id)}}" class="btn btn-warning me-2">
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
@include('pages.admin.setting.contact.create')

@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#add-goods-type-form').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                success: function(response) {
                    $('#addGoodsTypeModal').modal('hide');
                    $('#goods-type-table-body').append('<tr id="contact-' + response.id + '"><td>' + response.email + '</td><td>' + response.alamat + '</td><td>' + response.telepon + '</td><td>' +
                        '<a href="{{ url("contact") }}/' + response.id + '" class="btn btn-secondary me-2">' +
                        '<i class="ti ti-eye fs-4"></i></a>' +
                        '<a href="{{ url("contact") }}/' + response.id + '/edit" class="btn btn-warning me-2">' +
                        '<i class="ti ti-edit fs-4"></i></a>' +
                        '<form action="{{ url("contact") }}/' + response.id + '" method="POST" class="d-inline" onsubmit="return confirm(\'Delete?\')">' +
                        '@csrf @method("DELETE")' +
                        '<button class="btn btn-danger m-0 delete-button" data-id="' + response.id + '">' +
                        '<i class="ti ti-trash fs-4"></i></button></form></td></tr>');
                    form[0].reset();  // Clear the form
                },
                error: function(response) {
                    // Handle the error
                }
            });
        });

        $(document).on('click', '.delete-button', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            if (confirm('Delete?')) {
                $.ajax({
                    url: '{{ url("contact") }}/' + id,
                    method: 'POST',
                    data: {
                        _method: 'DELETE',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        $('#contact-' + id).remove();
                    },
                    error: function(response) {
                        // Handle the error
                    }
                });
            }
        });
    });
</script>
@endsection
