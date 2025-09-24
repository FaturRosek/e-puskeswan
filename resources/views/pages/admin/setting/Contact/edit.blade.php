@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" action="{{ route('contact.update', $contact->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id" value="{{ $contact->id }}">
                    <div class="mb-6">
                        <x-atoms.form-label required>Email</x-atoms.form-label>
                        <x-atoms.input id="email" name="email" type="text" class="form-control"
                            value="{{ $contact->email }}" />
                    </div>
                    <div class="mb-6">
                        <x-atoms.form-label required>Alamat</x-atoms.form-label>
                        <x-atoms.input id="alamat" name="alamat" type="text" class="form-control"
                            value="{{ $contact->alamat }}" />
                    </div>
                    <div class="mb-6">
                        <x-atoms.form-label required>Telepon</x-atoms.form-label>
                        <x-atoms.input id="telepon" name="telepon" type="text" class="form-control"
                            value="{{ $contact->telepon }}" />
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('contact.index') }}" class="btn btn-secondary ms-2">Back</a>
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
