@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('jenis.update', $jenis->id) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id">
                    <div class="mb-6">
                        <x-atoms.form-label required>Jenis Barang</x-atoms.form-label>
                        <x-atoms.input id="name_type" name="name_type" type="text" class="form-control"
                            value="{{ $jenis->name_type }}" />
                    </div>
                    <button type="submit" class="btn btn-primary"></a>Save</button>
                    <a href="{{ route('jenis.index') }}" class="btn btn-secondary ms-2">Back</a>
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

