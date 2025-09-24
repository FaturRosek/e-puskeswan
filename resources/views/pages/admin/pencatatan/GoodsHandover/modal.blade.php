<x-mollecules.modal id="add-goodsrecording_modal" action="{{ route('serahterima.store') }}" method="POST"
    data-table-id="goodsrecording-table" tableId="goodshandover-table" hasCloseBtn="true">
    <x-slot:title>Tambah Serah Terima Barang</x-slot:title>
    <x-slot:iconClose>
        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="ki-outline ki-cross fs-2"></i>
        </div>
    </x-slot:iconClose>
    <x-slot:footer>
        <button class="btn-primary btn" type="submit" data-text="Save" data-text-loading="Saving">Save</button>
    </x-slot:footer>
    <div>
        <div class="row mb-6">
            <x-atoms.form-label required>Tambah Data Barang</x-atoms.form-label>
            <div class="col">
                <input type="hidden" name="id" id="id">
                <select id="goods_id" name="goods_id" class="form-select" aria-label="Default select example">
                    <option selected disabled>Nama Barang</option>
                    @foreach ($barang as $d)
                        <option value="{{ $d->id }}">{{ $d->goods_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <select id="unit_id" name="unit_id" class="form-select" aria-label="Default select example"
                    placeholder="Satuan">
                    <option selected disabled>Satuan</option>
                    @foreach ($satuan as $s)
                        <option value="{{ $s->id }}">{{ $s->unit_type }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-6">

            <div class="col">
                <select id="procurement_id" name="procurement_id" class="form-select"
                    aria-label="Default select example">
                    <option selected disabled>Pengadaan</option>
                    @foreach ($pengadaan as $p)
                        <option value="{{ $p->id }}">{{ $p->procurement_type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <select id="warehouse_id" name="warehouse_id" class="form-select" aria-label="Default select example">
                    <option selected disabled>Gudang</option>
                    @foreach ($gudang as $g)
                        <option value="{{ $g->id }}">{{ $g->warehouse_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-6">

            <div class="col">
                <input type="text" class="form-control" id="goods_amount" name="goods_amount" placeholder="Jumlah"
                    required>
            </div>
            <div class="col">
                <input type="date" class="form-control" id="tgl_exp_date" name="tgl_exp_date" required>
            </div>
        </div>
        <div class="row mb-6">
            <div class="col">
                <textarea name="description" id="description" class="form-control" placeholder="Deskripsi"></textarea>
            </div>
        </div>
    </div>
</x-mollecules.modal>