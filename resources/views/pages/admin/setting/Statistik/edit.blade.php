@extends('layouts.app')

@section('content')
<div class="py-4">
    <div class="row">
        <div class="col-md-12">
            <form method="POST" action="{{ route('statistik.update', $Statistik->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" id="id" value="{{ $Statistik->id }}">
                <div class="mb-6">
                    <x-atoms.form-label required>Tenaga Medis</x-atoms.form-label>
                    <x-atoms.input id="tenaga_medis" name="tenaga_medis" type="number" class="form-control" value="{{ $Statistik->tenaga_medis }}" />
                </div>
                <div class="mb-6">
                    <x-atoms.form-label required>Alat Medis</x-atoms.form-label>
                    <x-atoms.input id="alat_medis" name="alat_medis" type="number" class="form-control" value="{{ $Statistik->alat_medis }}" />
                </div>
                <div class="mb-6">
                    <x-atoms.form-label required>Total Puskeswan</x-atoms.form-label>
                    <x-atoms.input id="total_puskeswan" name="total_puskeswan" type="number" class="form-control" value="{{ $Statistik->total_puskeswan }}" />
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('statistik.index') }}" class="btn btn-secondary ms-2">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {});
</script>
@endpush
