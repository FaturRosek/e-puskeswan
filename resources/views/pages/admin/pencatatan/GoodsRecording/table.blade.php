<div>
    <table class="table align-middle table-row-dashed  gy-5 dataTable no-footer text-gray-600 fw-semibold">
        <thead class="text-start text-muted fw-bold  text-uppercase gs-0 ">
            <tr>
                <th class="text-center align-middle">No.</th>
                <th class="text-center align-middle">Nama Barang</th>
                <th class="text-center align-middle">Barang Masuk</th>
                <th class="text-center align-middle">Barang Keluar</th>
                <th class="text-center align-middle">Tanggal Expired</th>
                <th class="text-center align-middle">Deskripsi</th>
                <th class="text-center align-middle">Sisa Barang</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                    <td class="text-center align-middle">{{ $d->goods->goods_name }}</td>
                    <td class="text-center align-middle">{{ $d->goods_entry }}</td>
                    <td class="text-center align-middle">{{ $d->goods_out }}</td>
                    <td class="text-center align-middle">{{ $d->tgl_exp_date }}</td>
                    <td class="text-center align-middle">{{ $d->description }}</td>
                    <td class="text-center align-middle">{{ $d->sisa_barang }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
