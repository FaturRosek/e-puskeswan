@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="row">
            <div class="col-md-12">
                <h1>Serah Terima Barang</h1>
                <hr />
                <form action="{{ route('serahterima.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <label for="date_received" class="form-label">Tangal Diterima</label>
                            <input type="date" class="form-control" id="date_received" name="date_received">
                        </div>
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <div class="col">
                            <label for="BAST_number" class="form-label">No BAST</label>
                            <input type="text" class="form-control" id="no_bast" name="no_bast" placeholder="No BAST">
                        </div>
                        <div class="col">
                            <label for="file_BAST" class="form-label">File BAST (Pdf)</label>
                            <input type="file" class="form-control" id="file_bast" name="file_bast">
                        </div>
                        <div class="col">
                            <label for="file_pengajuan" class="form-label">File Pengajuan</label>
                            <input type="file" class="form-control" id="file_pengajuan" name="file_pengajuan">
                        </div>
                        <div class="col">
                            <label for="" class="form-label">Deskripsi</label>
                            <textarea name="description" id="description" class="form-control" placeholder="Deskripsi"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <x-atoms.form-label required>Tambah Data Barang</x-atoms.form-label>
                        <div class="col">
                            <select id="goods_id" name="goods_id" class="form-select" aria-label="Default select example">
                                <option selected disabled>Nama Barang</option>
                                @foreach ($barang as $d)
                                    <option value="{{ $d->id }}">{{ $d->goods_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <select id="unit_id" name="unit_id" class="form-select" aria-label="Default select example">
                                <option selected disabled>Satuan</option>
                                @foreach ($satuan as $s)
                                    <option value="{{ $s->id }}">{{ $s->unit_type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <select id="procurement_id" name="procurement_id" class="form-select"
                                aria-label="Default select example">
                                <option selected disabled>Pengadaan</option>
                                @foreach ($pengadaan as $p)
                                    <option value="{{ $p->id }}">{{ $p->procurement_type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col">
                            <input type="number" class="form-control" id="goods_amount" name="goods_amount"
                                placeholder="Jumlah" required>
                        </div>
                        <div class="col">
                            <input type="date" class="form-control" id="tgl_exp_date" name="tgl_exp_date"
                                placeholder="Tgl Expired">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <x-atoms.form-label required>Data Pengirim</x-atoms.form-label>
                        <div class="col">
                            <select id="pengirim" name="pengirim" class="form-select" aria-label="Default select example">
                                <option selected disabled>Pengirim</option>
                                @foreach ($user as $u)
                                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <input type="text" name="nama_pengirim" id="nama_pengirim" class="form-control"
                                placeholder="Nama Pengirim">
                        </div>
                        <div class="col">
                            <input type="text" name="NIP" id="NIP" class="form-control" placeholder="NIP">
                        </div>
                        <div class="col">
                            <input type="text" name="pangkat" id="pangkat" class="form-control"
                                placeholder="Pangkat/Gol. Ruang">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" name="jabatan" id="jabatan" class="form-control"
                                placeholder="Jabatan">
                        </div>
                        <div class="col">
                            <textarea name="alamat_pengirim" id="alamat_pengirim" class="form-control" placeholder="Alamat Pengirim"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <x-atoms.form-label required>Data Penerima</x-atoms.form-label>
                        <div class="col">
                            <select id="penerima" name="penerima" class="form-select"
                                aria-label="Default select example">
                                <option selected disabled>Penerima</option>
                                @foreach ($user as $u)
                                    <option value="{{ $u->id }}">{{ $u->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <input type="text" name="nama_penerima" id="nama_penerima" class="form-control"
                                placeholder="Nama Penerima">
                        </div>
                        <div class="col">
                            <textarea name="alamat_penerima" id="alamat_penerima" class="form-control" placeholder="Alamat Penerima"></textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <input type="text" name="NIP_pks" id="NIP_pks" class="form-control" placeholder="NIP">
                        </div>
                        <div class="col">
                            <input type="text" name="pangkat_pks" id="pangkat_pks" class="form-control"
                                placeholder="Pangkat/Gol. Ruang">
                        </div>
                        <div class="col">
                            <input type="text" name="jabatan_pks" id="jabatan_pks" class="form-control"
                                placeholder="Jabatan">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <button type="button" class="btn btn-success" id="add-handover">Tambah Data</button>
                        </div>
                    </div>

                    <table class="table table-bordered" id="add-handover-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Barang</th>
                                <th>Satuan</th>
                                <th>Pengadaan</th>
                                <th>Jumlah</th>
                                <th>Tanggal_Expired</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="handover">

                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('serahterima.index') }}" class="btn btn-primary ml-2">Back</a>
                </form>
            </div>
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

            handlePlaceholder();

            input.addEventListener('focus', function() {
                input.type = 'date';
            });
            input.addEventListener('blur', function() {
                if (!input.value) {
                    input.type = 'text';
                    input.placeholder = placeholderText;
                }
            });
        }
        var dateReceivedInput = document.getElementById('date_received');
        var expDateInput = document.getElementById('tgl_exp_date');

        setPlaceholder(dateReceivedInput, 'Tanggal Diterima');
        setPlaceholder(expDateInput, 'Tanggal Expired');
    });
</script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var barang = @json($barang);
        var satuan = @json($satuan);
        var pengadaan = @json($pengadaan);

        $('#add-handover').click(function() {
            var goods_id = $('#goods_id').val();
            var unit_id = $('#unit_id').val();
            var procurement_id = $('#procurement_id').val();
            var goods_amount = $('#goods_amount').val();
            var tgl_exp_date = $('#tgl_exp_date').val();

            var goods_name = barang.find(item => item.id == goods_id).goods_name;
            var unit_type = satuan.find(item => item.id == unit_id).unit_type;
            var procurement_type = pengadaan.find(item => item.id == procurement_id).procurement_type;

            let number = $('#handover tr').length + 1;
            let no = `<td>${number}</td>`;
            let goodsInput =
                `<td><input type="hidden" name="goods_id[]" value="${goods_id}"> ${goods_name} </td>`;
            let unitInput =
                `<td><input type="hidden" name="unit_id[]" value="${unit_id}"> ${unit_type} </td>`;
            let procurementInput =
                `<td><input type="hidden" name="procurement_id[]" value="${procurement_id}"> ${procurement_type} </td>`;
            let amountInput =
                `<td><input type="number" name="goods_amount[]" value="${goods_amount}" class="form-control"> </td>`;
            let expdateInput =
                `<td><input type="date" name="tgl_exp_date[]" value="${tgl_exp_date}" class="form-control"></td>`;
            let actionInput =
                `<td><button type="button" class="btn btn-danger remove-row"><i
                                class="ti ti-trash fs-4"></i></button></td>`;

            $('#handover').append(
                `<tr>${no + goodsInput + unitInput + procurementInput + amountInput + expdateInput + actionInput}</tr>`
            );

            // Add event listener to remove row
            $('.remove-row').click(function() {
                $(this).closest('tr').remove();
            });
        });

        function updatenomer() {
            $('#handover tr').each(function(index) {
                $(this).find('td:first').text(index + 1);
            });
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        const penerimaField = document.getElementById('nama_penerima');
        const puskeswanField = document.getElementById('penerima');
        const nipField = document.getElementById('NIP_pks');
        const pangkatField = document.getElementById('pangkat_pks');
        const jabatanField = document.getElementById('jabatan_pks');

        function toggleFields() {
            if (penerimaField.value.trim() !== '') {
                puskeswanField.disabled = true;
                nipField.disabled = true;
                pangkatField.disabled = true;
                jabatanField.disabled = true;
            } else {
                puskeswanField.disabled = false;
                nipField.disabled = false;
                pangkatField.disabled = false;
                jabatanField.disabled = false;
            }
        }

        penerimaField.addEventListener('input', toggleFields);
        toggleFields();
    });
</script>
