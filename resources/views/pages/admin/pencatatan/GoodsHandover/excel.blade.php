<div>
    <table class="table align-middle table-row-dashed  gy-5 dataTable no-footer text-gray-600 fw-semibold">
        <thead class="text-start text-muted fw-bold  text-uppercase gs-0 ">
            <tr>
                <th class="text-center align-middle">No.</th>
                <th class="text-center align-middle">Tanggal Penerimaan</th>
                <th class="text-center align-middle">No BAST</th>
                <th class="text-center align-middle">Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td class="text-center align-middle">{{ $loop->iteration }}</td>
                    <td class="text-center align-middle">{{ $d->date_received }}</td>
                    <td class="text-center align-middle">{{ $d->no_bast}}</td>
                    <td class="text-center align-middle">{{ $d->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
