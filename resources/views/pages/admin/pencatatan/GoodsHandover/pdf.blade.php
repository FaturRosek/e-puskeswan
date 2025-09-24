<!DOCTYPE html>
<html>

<head>
    <style>
        #tabel {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #tabel td,
        #tabel th {
            border: 1px solid;
            padding: 5px;
            font-size: 14px;
            text-align: center;
        }

        #tabel th {
            padding-top: 8px;
            padding-bottom: 8px;
            text-align: center;
            color: black;
        }

        #tabel td {
            text-align: center;
        }

        .header-table {
            width: 100%;
            margin-bottom: 10px;
        }

        .header-table td {
            vertical-align: top;
        }

        .header-table .logo-cell {
            width: 20%;
            text-align: left;
        }

        .header-table .text-cell {
            width: 80%;
            text-align: center;
            padding-left: 10px;
        }

        .header-table p {
            margin: 0;
            padding: 0;
            font-size: 18px;
        }

        .header-table h2 {
            margin: 5px 0;
        }

        .title {
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .title h4 {
            margin: 5px 0;
            padding: 0;
            display: inline-block;
            border-bottom: 3px solid black;
        }

        .title p {
            margin: 5px 0 50px;
            padding: 0;
        }

        .ttd-table {
            width: 100%;
            margin-top: 50px;
        }

        .ttd-table td {
            text-align: center;
            width: 45%;
            vertical-align: top;
        }

        .ttd-table p {
            margin: 0;
            padding: 0;
        }

        hr.thick-line {
            border: 0;
            height: 5px;
            background-color: black;
            margin: 10px 0;
        }

        .underline {
            display: inline-block;
        }

        .data {
            padding-left: 30px;
            padding-right: 40px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            border: none;
        }

        .data-table td {
            padding: 5px 10px; 
            border: none;
            text-align: left;
            word-wrap: break-word; 
        }

        .label {
            width: 150px; 
            display: inline-block;
            text-align: left;
            margin-right: 10px; 
        }

    </style>
</head>

<body>
    <table class="header-table">
        <tr>
            <td class="logo-cell">
                <img src="{{ public_path('assets/images/kab-blitar.png') }}" alt="logo" style="width: 170px;">
            </td>
            <td class="text-cell">
                <p>PEMERINTAH KABUPATEN BLITAR</p>
                <h2>DINAS PETERNAKAN DAN PERIKANAN</h2>
                <p>Jl. Cokroaminoto No. 22 Telp./Fax. (0342) 801136</p>
                <p>e-mail : dinas.peternakan@blitarkab.go.id</p>
                <p>BLITAR 66112</p>
            </td>
        </tr>
    </table>
    <hr class="thick-line">
    <div class="title">
        <h4>BERITA ACARA SERAH TERIMA</h4>
        <p>NOMOR : B/ 662.04.02./{{ $umum->no_bast }}/ 405.009/202</p>
    </div>
    <p style="margin-bottom: 20px;">Yang bertanda tangan dibawah ini :</p>
    <div class="data">
        <table class="data-table">
            @if ($pengirim)
                <tr>
                    <td class="label">Nama</td>
                    <td>: {{ $pengirim->nama_pengirim ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label">NIP</td>
                    <td>: {{ $pengirim->NIP ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label">Pangkat/Gol. Ruang</td>
                    <td>: {{ $pengirim->pangkat ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <td class="label">Alamat</td>
                    <td>: {{ $pengirim->alamat_pengirim ?? 'N/A' }}</td>
                </tr>
            @else
                <tr>
                    <td colspan="2">No data available</td>
                </tr>
            @endif
        </table>
    </div>
    <p style="margin-top:5px">Dalam hal ini selaku Petugas Dinas Peternakan dan Perikanan, Selanjutnya disebut PIHAK KESATU</p>
    <div class="data">
        <table class="data-table">
            @if ($penerima)
                <tr>
                    @if (!is_null($penerima->nama_penerima ?? $penerima->user->name ?? null))
                        <td class="label">Nama</td>
                        <td>: {{ $penerima->nama_penerima ?? $penerima->user->name ?? 'N/A' }}</td>
                    @endif
                </tr>
                <tr>
                    @if (!is_null($penerima->NIP ?? null))
                        <td class="label">NIP</td>
                        <td>: {{ $penerima->NIP ?? 'N/A' }}</td>
                    @endif
                </tr>
                <tr>
                    @if (!is_null($penerima->pangkat ?? null))
                        <td class="label">Pangkat/Gol. Ruang</td>
                        <td>: {{ $penerima->pangkat ?? 'N/A' }}</td>
                    @endif
                </tr>
                <tr>
                    @if (!is_null($penerima->alamat_penerima ?? null))
                        <td class="label">Alamat</td>
                        <td>: {{ $penerima->alamat_penerima ?? 'N/A' }}</td>
                    @endif
                </tr>
            @else
                <tr>
                    <td colspan="2">No data available</td>
                </tr>
            @endif
        </table>
    </div>
    
    <p>Selanjutnya disebut PIHAK KEDUA.</p>
    <p>PIHAK KESATU telah menyerahkan barang kepada PIHAK KEDUA, berupa :</p>
    <table id="tabel">
        <tr>
            <th>No</th>
            <th>Nama Barang/Merk/Spek</th>
            <th>Jumlah Barang</th>
            <th>Keterangan</th>
        </tr>
        @foreach ($handoverDetails as $detail)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $barang->firstWhere('id', $detail->goods_id)->goods_name }}</td>
                <td>{{ $detail->goods_amount }}</td>
                <td>{{ $umum->description }}</td>
            </tr>
        @endforeach
    </table>
    <p style="padding-left: 40px;">Demikian Berita Acara Serah Terima ini dibuat dengan sebenarnya untuk dipergunakan
        sebagaimana mestinya.</p>

    <table class="ttd-table">
        <tr>
            <td>
                <p>PIHAK KESATU</p>
                <br><br><br><br>
                <p>.................................</p>
            </td>
            <td>
                <p>PIHAK KEDUA</p>
                <br><br><br><br>
                <p>.................................</p>
            </td>
        </tr>
    </table>
</body>

</html>
