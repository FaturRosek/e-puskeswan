@extends('layouts.app', ['id' => 'dashboard'])
@section('content')
<div class="container-xxl">
    <div class="row p-4 fw-bold">
        <div class="col-lg-4 col-md-4 col-sm-12" >
            <div class="card card-statistic-2" style="background-color: #BFEAE5">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <div class="card-stats-items">
                            <div class="card-icon text-center mt-4">
                                <i class="fas fa-pills" style="font-size: 60px;color: #084943""></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body text-end">
                            <div class="card-stats-title">
                                <div class="text-center">
                                    <h4><strong>{{ $totalStokObat }}</strong></h4>
                                </div>
                                <p class="text-center mb-0" style="color: #000000">Total Stok Obat</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12" >
            <div class="card card-statistic-2" style="background-color: #BFEAE5">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <div class="card-stats-items">
                            <div class="card-icon text-center mt-4">
                                <i class="far fa-hospital" style="font-size: 60px;color: #084943""></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body text-end">
                            <div class="card-stats-title">
                                <div class="text-center">
                                    <h4><strong>{{ $totalPuskeswan }}</strong></h4>
                                </div>
                                <p class="text-center mb-0" style="color: #000000">Total Puskeswan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-12" >
            <div class="card card-statistic-2" style="background-color: #BFEAE5">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <div class="card-stats-items">
                            <div class="card-icon text-center mt-4">
                                <i class="far fa-building" style="font-size: 60px;color: #084943"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body text-end">
                            <div class="card-stats-title">
                                <div class="text-center">
                                    <h4><strong>{{ $totalGudang }}</strong></h4>
                                </div>
                                <p class="text-center mb-0" style="color: #000000">Total Jenis Barang</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>


    <div class="row p-4">
        <div class="col-lg-7 col-md-7 col-sm-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="2" class="text-Start fw-bolder">Puskeswan</th>
                    </tr>
                    <tr >
                        <th class="fw-bolder">Nama Puskeswan</th>
                        <th class="fw-bolder">Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($puskeswan as $puskeswan)
                        <tr>
                            <td>{{ $puskeswan->name }}</td>
                            <td>{{ $puskeswan->address }}</td>
                        </tr>
                        @endforeach
                    
                </tbody>
            </table>
        </div>

        <div class="col-lg-5 col-md-5 col-sm-12">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="4" class="text-start fw-bolder">Serah Terima Barang</th>
                    </tr>
                    <tr>
                        <th class="fw-bolder">Nama Barang</th>
                        <th class="fw-bolder">Stok</th>
                        <th class="fw-bolder">Tanggal Expired</th>
                    </tr>
                </thead>
                <tbody style="color: #000000;">
                @foreach ($serahTerima as $d)
                    <tr>
                        <td>{{ $d->goods->goods_name }}</td>
                        <td>{{ $d->goods_amount }}</td>
                        <td>{{ $d->tgl_exp_date }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>            
        </div>
    </div>
</div>
@endsection