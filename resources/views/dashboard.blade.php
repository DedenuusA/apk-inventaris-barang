@extends('template.master')
@section('title', 'dashboard')
@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-6">
            <div class="col-12">
                <div class="card shadow-lg">
                    <img src="../../assets/img/shapes/pattern-left.png" alt="pattern-lines"
                        class="position-absolute overflow-hidden opacity-4 start-0 top-0 h-100 border-radius-xl">
                    <img src="../../assets/img/shapes/pattern-right.png" alt="pattern-lines"
                        class="position-absolute overflow-hidden opacity-4 end-0 top-0 h-100 border-radius-xl">
                    <div class="card-body px-5 z-index-1 bg-cover">
                        <div class="row">
                            <div class="col-lg-5 col-10 text-center">
                                <img class="w-75 w-lg-100 mt-n7 mt-lg-n8 d-none d-md-block" src="../../assets/img/inve.png"
                                    alt="car image">
                                <div class="d-flex align-items-center">
                                </div>
                            </div>
                            <div class="col-lg-6 col-12 my-auto">
                                <h4 class="text-body opacity-9">welcome aplikasi inventaris</h4>
                                <p>aplikasi ini untuk memenuhi tugas akhir skripsi</p>
                                <hr class="horizontal light mt-1 mb-3">
                                <div class="d-flex align-items-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-6 mb-8">
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card bg-primary">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-white text-sm mb-0 text-uppercase font-weight-bold opacity-7">
                                        jumlah karyawan</p>
                                    <h5 class="text-white font-weight-bolder mb-0">
                                        {{ $user_model }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-white shadow text-center rounded-circle">
                                    <i class="ni ni-circle-08 text-dark text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mt-4 mt-md-0">
                <div class="card bg-primary">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-white text-sm mb-0 text-uppercase font-weight-bold opacity-7">
                                        jumlah data barang</p>
                                    <h5 class="text-white font-weight-bolder mb-0">
                                        {{ $item }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-white shadow text-center rounded-circle">
                                    <i class="fa-solid fa-cart-shopping text-dark text-lg opacity-10"
                                        aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mt-4 mt-lg-0">
                <div class="card bg-primary">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-white text-sm mb-0 text-uppercase font-weight-bold opacity-7">
                                        jumlah pengajuan</p>
                                    <h5 class="text-white font-weight-bolder mb-0">
                                        {{ $pinjaman }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-white shadow text-center rounded-circle">
                                    <i class="fa-solid fa-square-check text-dark text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12 mt-4 mt-lg-0">
                <div class="card bg-primary">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-white text-sm mb-0 text-uppercase font-weight-bold opacity-7">
                                        jumlah perusahaan</p>
                                    <h5 class="text-white font-weight-bolder mb-0">
                                        {{ $perusahaan }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-white shadow text-center rounded-circle">
                                    <i class="fa-solid fa-database text-dark text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid py-4">
                <div class="row mt-4">
                    <div class="card col-md-12">
                        <div class="card-header">
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <select id="tahun" class="form-control">
                                    @php
                                        $check_year = \App\Models\Pinjaman::where('created_at', '!=', '0000-00-00')
                                            ->orderBy('created_at', 'ASC')
                                            ->first();
                                        if ($check_year) {
                                            $oldest_year = $check_year->created_at;
                                        } else {
                                            $oldest_year = date('Y-m-d');
                                        }
                                        $oldest_year2 = \Carbon\Carbon::parse($oldest_year)->year;
                                        // dd($oldest_year2);
                                        for ($y = $oldest_year2; $y <= date('Y'); $y++) {
                                            echo '<option value= ' . $y . ' ' . ($y == date('Y') ? 'selected' : '') . '>' . $y . '</option>';
                                        }
                                    @endphp
                                </select>
                                <span class="mx-2"></span>
                                <select id="bulan" class="form-control">
                                    <option value="1"
                                        {{ \Carbon\Carbon::now()->format('m') == '1' ? 'selected' : '' }}>Januari</option>
                                    <option value="2"
                                        {{ \Carbon\Carbon::now()->format('m') == '2' ? 'selected' : '' }}>Februari
                                    </option>
                                    <option value="3"
                                        {{ \Carbon\Carbon::now()->format('m') == '3' ? 'selected' : '' }}>Maret</option>
                                    <option value="4"
                                        {{ \Carbon\Carbon::now()->format('m') == '4' ? 'selected' : '' }}>April</option>
                                    <option value="5"
                                        {{ \Carbon\Carbon::now()->format('m') == '5' ? 'selected' : '' }}>Mei</option>
                                    <option value="6"
                                        {{ \Carbon\Carbon::now()->format('m') == '6' ? 'selected' : '' }}>Juni</option>
                                    <option value="7"
                                        {{ \Carbon\Carbon::now()->format('m') == '7' ? 'selected' : '' }}>Juli</option>
                                    <option value="8"
                                        {{ \Carbon\Carbon::now()->format('m') == '8' ? 'selected' : '' }}>Agustus
                                    </option>
                                    <option value="9"
                                        {{ \Carbon\Carbon::now()->format('m') == '9' ? 'selected' : '' }}>September
                                    </option>
                                    <option value="10"
                                        {{ \Carbon\Carbon::now()->format('m') == '10' ? 'selected' : '' }}>Oktober
                                    </option>
                                    <option value="11"
                                        {{ \Carbon\Carbon::now()->format('m') == '11' ? 'selected' : '' }}>November
                                    </option>
                                    <option value="12"
                                        {{ \Carbon\Carbon::now()->format('m') == '12' ? 'selected' : '' }}>Desember
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-container">
                                <div id="chart_1" class="amchart"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card col-md-12 mt-3">
                        <div class="card-body">
                            <div class="chart-container">
                                <div id="chart_2" class="amchart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection

            @push('js')
                <!-- AMChart -->
                <script src="{{ asset('assets/js/jquery/jquery.min.js') }}"></script>
                <script src="{{ asset('assets/js/amchart/core.js') }}"></script>
                <script src="{{ asset('assets/js/amchart/charts.js') }}"></script>
                <script src="{{ asset('assets/js/amchart/themes/animated.js') }}"></script>

                <script>
                    // Themes begin
                    am4core.useTheme(am4themes_animated);
                    // Themes end
                </script>

                <script>
                    let chartPenjualanHarianData;

                    var theDate = new Date();
                    var firstDate = new Date(theDate.getFullYear(), theDate.getMonth(), 1);
                    var curDate = theDate.getDate()
                    var curYear = theDate.getFullYear();
                    var totalDay = new Date(theDate.getFullYear(), theDate.getMonth() + 1, 0).getDate();
                    firstDate.setDate(firstDate.getDate());

                    function loadLinePenjualanHarian(data = []) {
                        var s = $('#chart_1').parents(".card");
                        s.addClass("is-loading")
                        $.ajax({
                            url: "{{ route('v1.statistik.get_penjualan_harian') }}",
                            dataType: 'json',
                            method: 'POST',
                            data: data,
                            success: function(response) {
                                s.removeClass("is-loading");
                                // Create chart instance
                                typeof chartPenjualanHarianData === 'object' ? chartPenjualanHarianData.dispose() : '';
                                var chartPenjualanHarian = am4core.create("chart_1", am4charts.XYChart);

                                let title = chartPenjualanHarian.titles.create();
                                title.text = "Statistik Harian";
                                title.fontSize = 20;
                                title.marginBottom = 10;

                                am4core.useTheme(am4themes_animated);

                                // Increase contrast by taking evey second color
                                // chartPenjualanHarian.colors.step = 2;
                                // manually define color set
                                chartPenjualanHarian.colors.list = [
                                    am4core.color("#77dd77"),
                                    am4core.color("#FFC75F"),
                                    am4core.color("#FF6F91")
                                ];

                                // Add data
                                chartPenjualanHarian.data = generateChartData();

                                // Create axes
                                var dateAxis = chartPenjualanHarian.xAxes.push(new am4charts.DateAxis());
                                dateAxis.renderer.minGridDistance = 50;
                                dateAxis.renderer.grid.template.location = 0;
                                dateAxis.renderer.grid.template.location = 0;
                                dateAxis.renderer.minGridDistance = 10;
                                dateAxis.renderer.labels.template.horizontalCenter = "right";
                                dateAxis.renderer.labels.template.verticalCenter = "middle";
                                dateAxis.renderer.labels.template.rotation = 270;
                                dateAxis.tooltip.disabled = false;
                                dateAxis.fontSize = 12;
                                dateAxis.renderer.minHeight = 110;

                                // Create series
                                function createAxisAndSeries(field, name, opposite, bullet) {
                                    var valueAxis = chartPenjualanHarian.yAxes.push(new am4charts.ValueAxis());
                                    if (chartPenjualanHarian.yAxes.indexOf(valueAxis) != 0) {
                                        valueAxis.syncWithAxis = chartPenjualanHarian.yAxes.getIndex(0);
                                    }

                                    var series = chartPenjualanHarian.series.push(new am4charts.LineSeries());
                                    series.dataFields.valueY = field;
                                    series.dataFields.dateX = "date";
                                    series.strokeWidth = 2;
                                    series.yAxis = valueAxis;
                                    series.name = name;
                                    series.tooltipText = "{name}: [bold]{valueY}[/]";
                                    series.tensionX = 0.8;
                                    series.showOnInit = true;

                                    var interfaceColors = new am4core.InterfaceColorSet();

                                    switch (bullet) {
                                        case "triangle":
                                            var bullet = series.bullets.push(new am4charts.Bullet());
                                            bullet.width = 12;
                                            bullet.height = 12;
                                            bullet.horizontalCenter = "middle";
                                            bullet.verticalCenter = "middle";

                                            var triangle = bullet.createChild(am4core.Triangle);
                                            triangle.stroke = interfaceColors.getFor("background");
                                            triangle.strokeWidth = 2;
                                            triangle.direction = "top";
                                            triangle.width = 12;
                                            triangle.height = 12;
                                            break;
                                        case "rectangle":
                                            var bullet = series.bullets.push(new am4charts.Bullet());
                                            bullet.width = 10;
                                            bullet.height = 10;
                                            bullet.horizontalCenter = "middle";
                                            bullet.verticalCenter = "middle";

                                            var rectangle = bullet.createChild(am4core.Rectangle);
                                            rectangle.stroke = interfaceColors.getFor("background");
                                            rectangle.strokeWidth = 2;
                                            rectangle.width = 10;
                                            rectangle.height = 10;
                                            break;
                                        default:
                                            var bullet = series.bullets.push(new am4charts.CircleBullet());
                                            bullet.circle.stroke = interfaceColors.getFor("background");
                                            bullet.circle.strokeWidth = 2;
                                            break;
                                    }

                                    valueAxis.renderer.line.strokeOpacity = 1;
                                    valueAxis.renderer.line.strokeWidth = 2;
                                    valueAxis.renderer.line.stroke = series.stroke;
                                    valueAxis.renderer.labels.template.fill = series.stroke;
                                    valueAxis.renderer.opposite = opposite;
                                }

                                createAxisAndSeries("transaksi_berhasil", "Pemasukan", true, "");

                                // Add legend
                                chartPenjualanHarian.legend = new am4charts.Legend();

                                // Add cursor
                                chartPenjualanHarian.cursor = new am4charts.XYCursor();
                                chartPenjualanHarian.scrollbarX = new am4core.Scrollbar();
                                chartPenjualanHarian.scrollbarY = new am4core.Scrollbar();

                                // generate some random data, quite different range
                                function generateChartData() {
                                    var chartData = [];


                                    var transaksi_pending = 0;
                                    var transaksi_berhasil = 0;
                                    for (var i = 0; i < response.length; i++) {
                                        // we create date objects here. In your data, you can have date strings
                                        // and then set format of your dates using chartPenjualanHarian.dataDateFormat property,
                                        // however when possible, use date objects, as this will speed up chart rendering.
                                        var firstDate = new Date(response[i].tahun, ("0" + (response[i].bulan + 1)).slice(-
                                            2));
                                        var newDate = new Date(firstDate);
                                        var tmp = (parseInt(response[i].bulan, 10) - 1);
                                        newDate.setDate(newDate.getDate() + i);
                                        newDate.setMonth(tmp);

                                        transaksi_pending = response[i].transaksi_pending;
                                        transaksi_berhasil = response[i].transaksi_berhasil;

                                        chartData.push({
                                            date: newDate,
                                            transaksi_pending: transaksi_pending,
                                            transaksi_berhasil: transaksi_berhasil,
                                        });
                                    }
                                    return chartData;
                                }

                                chartPenjualanHarianData = chartPenjualanHarian;
                            }
                        })
                    }

                    $("#date_from_chart_1, #date_to_chart_1").on('change', function(e) {
                        chartPenjualanHarianData.dispose();

                        let data = {
                            'date_from': $("#date_from_chart_1").val(),
                            'date_to': $("#date_to_chart_1").val(),
                            'user_id': '{{ auth()->user()->id }}'
                        };

                        loadLinePenjualanHarian(data)
                    })

                    $("#tahun, #bulan").change(function() {
                        chartPenjualanHarianData.dispose();

                        let data = {
                            'bulan': $("#bulan").val(),
                            'tahun': $("#tahun").val(),
                            'user_id': '{{ auth()->user()->id }}'
                        };

                        if ($('#bulan').val() == (theDate.getMonth() + 1) && $('#tahun').val() == theDate.getFullYear()) {
                            // means today, limit the day only for current day
                            data['jumlah_hari'] = curDate;
                        }
                        loadLinePenjualanHarian(data)
                    })

                    $(document).ready(function() {
                        let data = {
                            'user_id': '{{ auth()->user()->id }}',
                            'bulan': ("0" + (theDate.getMonth() + 1)).slice(-2),
                            'tahun': curYear,
                            'jumlah_hari': curDate,
                        }
                        loadLinePenjualanHarian(data);
                    });
                </script>

                {{-- Script PIE CHART --}}
                <script>
                    let chartTopSalesProductData;

                    function loadPieTopSalesProduct(data = []) {
                        var s = $('#chart_2').parents(".card");
                        s.addClass("is-loading")
                        $.ajax({
                            url: "{{ route('v1.statistik.get_top_sales_product') }}",
                            dataType: 'json',
                            method: 'POST',
                            data: data,
                            success: function(response) {
                                s.removeClass("is-loading");
                                typeof chartTopSalesProductData === 'object' ? chartTopSalesProductData.dispose() : '';
                                var chartTopSalesProduct = am4core.create("chart_2", am4charts.PieChart3D);
                                let title = chartTopSalesProduct.titles.create();
                                title.text = "Produk Terjual Terbanyak";
                                title.fontSize = 18;
                                title.marginBottom = 10;

                                // Legend
                                chartTopSalesProduct.legend = new am4charts.Legend();
                                chartTopSalesProduct.legend.valueLabels.template.text = "{value.value}";



                                var data = response.map(el => {
                                    return {
                                        'name': el['nama_item'],
                                        'sales_count': el['total']
                                    }
                                })

                                // Add data
                                chartTopSalesProduct.data = data;

                                // Add and configure Series
                                var pieSeries = chartTopSalesProduct.series.push(new am4charts.PieSeries3D());
                                pieSeries.dataFields.value = "sales_count";
                                pieSeries.dataFields.category = "name";
                                pieSeries.slices.template.stroke = am4core.color("#fff");
                                pieSeries.slices.template.strokeWidth = 2;
                                pieSeries.slices.template.strokeOpacity = 1;

                                pieSeries.colors.list = [
                                    am4core.color("#845EC2"),
                                    am4core.color("#FF6F91"),
                                    am4core.color("#F9F871")
                                ];


                                // Color enable
                                pieSeries.slices.template.propertyFields.fill = "color";
                                pieSeries.labels.template.text = "{status}: {value.value}";

                                // This creates initial animation
                                pieSeries.hiddenState.properties.opacity = 1;
                                pieSeries.hiddenState.properties.endAngle = -90;
                                pieSeries.hiddenState.properties.startAngle = -90;

                                // Cursor
                                chartTopSalesProduct.padding(10, 10, 10, 10);

                                chartTopSalesProductData = chartTopSalesProduct;
                            }
                        })
                    }

                    $("#date_from_chart_2, #date_to_chart_2").on('change', function(e) {
                        chartTopSalesProductData.dispose();

                        let data = {
                            'user_id': '{{ auth()->user()->id }}',
                            'jumlah_produk': '{{ isset($jumlah_produk) ? $jumlah_produk : 3 }}'
                        };

                        loadPieTopSalesProduct(data)
                    })

                    $(document).ready(function() {
                        let data = {
                            'user_id': '{{ auth()->user()->id }}',
                            'jumlah_produk': '{{ isset($jumlah_produk) ? $jumlah_produk : 3 }}'
                        }
                        loadPieTopSalesProduct(data);
                    });
                </script>
            @endpush
