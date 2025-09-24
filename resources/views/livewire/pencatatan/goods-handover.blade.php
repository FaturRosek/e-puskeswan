<form action="">
    <table class="table table-hover" id="goodsrecording-table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Barang</th>
                <th>Satuan</th>
                <th>Pengadaan</th>
                <th>Gudang</th>
                <th>Jumlah</th>
                <th>Tanggal Expired</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {{ $handover->links() }}
            @if ($handover->count() > 0)
                @foreach ($handover as $key => $value)
                    <tr>
                        <td>{{ $handover->firstItem() + $key }}</td>
                        <td>{{ $value->goods->goods_name }}</td>
                        <td>{{ $value->unit->unit_type }}</td>
                        <td>{{ $value->procurement->procurement_type }}</td>
                        <td>{{ $value->warehouse->warehouse_name }}</td>
                        <td>{{ $value->goods_amount }}</td>
                        <td>{{ $value->tgl_exp_date }}</td>
                        <td>
                            <a wire:click="delete_confirmation({{ $value->id }})" class="btn btn-danger btn-sm"
                                data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="ti ti-trash fs-4"></i></a>
                            {{-- <a wire:click="delete({{ $d->id }})" class="btn btn-danger">
                                <i class="ti ti-trash fs-4"></i></button> --}}
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="2">Jenis barang tidak ditemukan</td>
                </tr>
            @endif
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {{-- <button type="submit" class="btn btn-success">Simpan</button> --}}
        <a href="{{ route('serahterima.index') }}" class="btn btn-success">Simpan</a>
    </div>
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Konfirmasi Delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Yakin akan menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="button" class="btn btn-primary" wire:click='delete()'
                        data-bs-dismiss="modal">Iya</button>
                </div>
            </div>
        </div>
    </div>
</form>
