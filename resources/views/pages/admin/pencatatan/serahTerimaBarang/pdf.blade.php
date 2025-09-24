<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Invoice</title>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    font-size: 14px; /* Ukuran font 14px */
  }

  .container {
    max-width: 800px;
    margin: 0 auto;
    border: 1px solid #ccc;
    padding: 20px;
    position: relative; /* Menambahkan posisi relatif untuk .container */
  }


  .title {
    text-align: center;
    font-size: 12px;
    margin-bottom: 0;
  }

  .sub-title {
    text-align: center;
    font-size: 12px;
    margin-bottom: 30px;
  }

  .invoice-details {
    margin-bottom: 30px;
    font-size: 12px;
  }

  .invoice-hal {
    margin-bottom: 10px;
    font-size: 12px;
  }

  .table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }

  .table th, .table td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
    font-size: 12px;
  }

  .table th {
    background-color: rgb(175, 177, 177);
  }

  .footer {
    margin-top: 50px;
    margin-bottom: 60px;
    text-align: right;
    font-size: 12px;
    margin-right: 50px;
  }
  .ttd {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
  }
  .ttd-position {
    text-align: right;
    font-size: 12px; 
  }
</style>
</head>
<body>
    <div class="container">
        <div class="title">
            <h2 style="text-decoration-line: underline;">BERITA ACARA SERAH TERIMA</h2>
        </div>
        <table class="table">
            @if($serahTerimaBarang)
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Tanggal Diterima</th>
                    <th>Pengadaan</th>
                    <th>Tgl Exp Date</th>
                </tr>
                @endif
                <tr>
                    <td>{{ $serahTerimaBarang->goods->goods_name }}</td>
                    <td>{{ $serahTerimaBarang->goods_amount }}</td>
                    <td>{{ $serahTerimaBarang->units->unit_type }}</td>
                    <td>{{ $serahTerimaBarang->date_received }}</td>
                    <td>{{ $serahTerimaBarang->procurements->procurement_type }}</td>
                    <td>{{ $serahTerimaBarang->tgl_exp_date }}</td>
                </tr>  
        </table>
        <div class="ttd">
            <div class="ttd-position">
                <p style="margin-bottom: 70px;">Dibuat Oleh</p>
                <p>Nama User</p>
            </div>
        </div>
    </div>
</body>
</html>

