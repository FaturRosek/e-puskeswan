@extends('layouts.app')

@section('content')
<div class="card" style="background: #67e7b642">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Statistik</h5>
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
                <th>Tenaga Medis</th>
                <th>Peralatan Medis</th>
                <th>Total Puskeswan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="tenaga-medis-table-body">
            @if($Statistik->count() > 0)
                @foreach($Statistik as $rs)
                    <tr id="tenaga-medis-{{ $rs->id }}">
                        <td>{{ $rs->tenaga_medis }}</td>
                        <td>{{ $rs->alat_medis }}</td>
                        <td>{{ $rs->total_puskeswan }}</td>
                        <td>
                            <a href="{{ route('statistik.edit', $rs->id) }}" class="btn btn-warning me-2">
                                <i class="ti ti-edit fs-4"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="2">Data tidak ditemukan</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
@endsection
