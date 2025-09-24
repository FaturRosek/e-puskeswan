@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('satuan.update', $satuan->id) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id">
                    <div class="mb-6">
                        <x-atoms.form-label required>Nama Satuan</x-atoms.form-label>
                        <x-atoms.input id="unit_type" name="unit_type" type="text" class="form-control"
                            value="{{ $satuan->unit_type }}" />
                    </div>
                    <button type="submit" class="btn btn-primary"></a>Save</button>
                    <a href="{{ route('satuan.index') }}" class="btn btn-secondary ms-2">Back</a>
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
