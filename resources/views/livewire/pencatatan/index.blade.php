@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <h1>Serah Terima Barang</h1>
                <hr />

                <form action="{{ route('file') }}" method="POST" id="post-form">
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <label for="date_received" class="form-label">Tangal Diterima</label>
                            <input type="date" class="form-control" id="date_received" name="date_received">
                        </div>
                        <div class="col">
                            <label for="BAST_number" class="form-label">No BAST</label>
                            <input type="text" class="form-control" id="nomerBAST" name="nomerBAST"
                                placeholder="No BAST">
                        </div>
                        <div class="col">
                            <label for="file_BAST" class="form-label">File BAST</label>
                            <input type="file" class="form-control" id="file" name="file">
                        </div>
                        <div class="col mt-4">
                            <button class="btn btn-success"><i class="fas fa-file"></i></button>
                        </div>
                    </div>
                </form>
                <form>
                    <div class="row mb-3">
                        <x-atoms.form-label required>Tambah Data Barang</x-atoms.form-label>

                        {{-- <div class="col-md-2">
                            <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#add-goodsrecording_modal"
                                data-action="edit" data-url="{{ route('serahterima.store') }}"
                                data-target="#add-goodsrecording_modal" id="createNewGoodsRecording"><i
                                    class="fas fa-box"></i></a>
                        </div> --}}
                        <div class="col">
                            <select id="goods_id" name="goods_id" class="form-select" aria-label="Default select example"
                                wire:model='goods_id'>
                                <option selected disabled>Nama Barang</option>
                                @foreach ($barang as $d)
                                    <option value="{{ $d->id }}">{{ $d->goods_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <select id="unit_id" name="unit_id" class="form-select" aria-label="Default select example"
                                wire:model='unit_id'>
                                <option selected disabled>Satuan</option>
                                @foreach ($satuan as $s)
                                    <option value="{{ $s->id }}">{{ $s->unit_type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <select id="procurement_id" name="procurement_id" class="form-select"
                                aria-label="Default select example" wire:model='procurement_id'>
                                <option selected disabled>Pengadaan</option>
                                @foreach ($pengadaan as $p)
                                    <option value="{{ $p->id }}">{{ $p->procurement_type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <select id="warehouse_id" name="warehouse_id" class="form-select"
                                aria-label="Default select example" wire:model='warehouse_id'>
                                <option selected disabled>Gudang</option>
                                @foreach ($gudang as $g)
                                    <option value="{{ $g->id }}">{{ $g->warehouse_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">

                        <div class="col">
                            <input type="text" class="form-control" id="goods_amount" name="goods_amount"
                                placeholder="Jumlah" wire:model='goods_amount' required>
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" id="tgl_exp_date" name="tgl_exp_date"
                                wire:model='tgl_exp_date' required>
                        </div>
                        <div class="col">
                            <textarea name="description" id="description" class="form-control" placeholder="Deskripsi" wire:model='description'></textarea>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-success" wire:click="store()">Tambah Data</button>
                        </div>
                    </div>
                </form>


                {{-- 
                @include('pages.admin.pencatatan.GoodsHandover.modal') --}}
                <livewire:pencatatan.goods-handover />
            </div>
            {{-- <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{ route('serahterima.index') }}" class="btn btn-success">Simpan</a>
            </div> --}}
            {{-- @include('pages.admin.pencatatan.GoodsHandover.table') --}}
        </div>
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        function setPlaceholder(input, placeholderText) {
            function handlePlaceholder() {
                if (!input.value) {
                    input.type = 'text';
                    input.placeholder = placeholderText;
                }
            }

            // Initially handle placeholder
            handlePlaceholder();

            // Handle focus event
            input.addEventListener('focus', function() {
                input.type = 'date';
            });

            // Handle blur event
            input.addEventListener('blur', function() {
                if (!input.value) {
                    input.type = 'text';
                    input.placeholder = placeholderText;
                }
            });
        }

        // Set placeholders for the date inputs
        var dateReceivedInput = document.getElementById('date_received');
        var expDateInput = document.getElementById('tgl_exp_date');

        setPlaceholder(dateReceivedInput, 'Tanggal Diterima');
        setPlaceholder(expDateInput, 'Tanggal Expired');
    });
</script>
@push('scripts')
    {{ $dataTable->scripts() }}
    <script>
        const tableId = 'goodshandover-table';

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
    </script>
@endpush
