@extends('layouts.app')

@section('content')
<section class="section dashboard">
    <div class="row">
        <div class="col-3">
            <div class="card info-card revenue-card">
                <div class="card-body">
                    <h5 class="card-title">Laporan Diterima</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-envelope-check"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{$diterima}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card info-card revenue-card">
                <div class="card-body">
                    <h5 class="card-title">Laporan Diproses</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-envelope-check"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{$diproses}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card info-card revenue-card">
                <div class="card-body">
                    <h5 class="card-title">Laporan Selesai</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-envelope-check"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{$selesai}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card info-card customers-card">
                <div class="card-body">
                    <h5 class="card-title">Laporan Ditolak</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-envelope-x"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{$ditolak}}</h6>
                            {{-- {{dd($ditolak)}} --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Tanggapan</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-chat-left-text"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{$tanggapan}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Petugas</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-person"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{$petugas}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Admin</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-person"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{$admin}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Masyarakat</h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-person"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{$masyarakat}}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <div id="chartPengaduan"></div>
        </div>
        <div class="col-6">
            <div id="pieChart"></div>
            {{-- <div class="card">
                <div class="card-body">
                    <div class="card-title">Pengaduan berdasarkan Kategori</div>
                    <canvas id="chart"></canvas>
                </div>
            </div> --}}
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script>
    Highcharts.chart('chartPengaduan', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Pengaduan berdasarkan Kategori dan Bulan'
        },
        xAxis: {
            kategoris: [
                @for ($i = 1; $i <= 12; $i++)
                    '{{ date("F", mktime(0, 0, 0, $i, 1)) }}',
                @endfor
            ]
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah Pengaduan'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.0f} pengaduan</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: {!! json_encode($chartData) !!}
    });
</script>

{{-- Pie Chart --}}
<script>
    Highcharts.chart('pieChart', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Pengaduan berdasarkan Kategori'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y:.0f} pengaduan</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y:.0f} pengaduan'
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Pengaduan',
            colorByPoint: true,
            data: {!! json_encode($pieChartData) !!}
        }]
    });
</script>
{{-- <script>
    var chart = @json($chart);

    var labels = [];
    var values = [];

    chart.forEach(function (item) {
        labels.push(item.kategori);
        values.push(item.total);
    });

    var ctx = document.getElementById('chart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                label: 'Pengaduan berdasarkan Kategori',
                data: values,
                backgroundColor: [
                    '#ff6384',
                    '#36a2eb',
                    '#cc65fe',
                    '#ffce56',
                    '#1abc9c',
                    '#2ecc71',
                    '#3498db',
                    '#9b59b6',
                    '#e67e22',
                    '#95a5a6'
                ]
            }]
        },
        options: {}
    });
</script> --}}
@endsection