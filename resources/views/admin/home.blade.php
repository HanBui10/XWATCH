@extends('layout.admin')
@section('content')
<main class="main">
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-xxl-3 col-md-6">
                        <div style="background-image: linear-gradient(-20deg, #b721ff 0%, #21d4fd 100%);" class="card info-card revenue-card">
                            <div class="card-body">
                                <h5 class="card-title">Doanh Thu</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{number_format($count[1],0,'.','.')}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-md">
                        <div style="background-image: linear-gradient(to top, #a18cd1 0%, #fbc2eb 100%);" class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Đơn Hàng</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $order}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-12">
                        <div style="background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);" class="card info-card product-card">
                            <div class="card-body">
                                <h5 class="card-title">Sản Phẩm</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-bag-plus"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{ $product }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-12">
                        <div style="background: #C9CCD3;background-image: linear-gradient(-180deg, rgba(255,255,255,0.50) 0%, rgba(0,0,0,0.50) 100%);background-blend-mode: lighten;" class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Khách Hàng</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$count[0]}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-12">
                        <div style="background-image: linear-gradient( 90.5deg,  rgba(255,207,139,0.50) 1.1%, rgba(255,207,139,1) 81.3% );" class="card info-card items-card">
                            <div class="card-body">
                                <h5 class="card-title">Đơn Hàng Đang Xử Lý</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-bag-check"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$count[2]}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-12">
                        <div style="background-image: linear-gradient( 109.6deg,  rgba(0,191,165,1) 11.2%, rgba(0,140,122,1) 100.2% );" class="card info-card goods-card">
                            <div class="card-body">
                                <h5 class="card-title">Đơn Hàng Thành Công</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart-check"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>{{$count[3]}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-xxl-3 col-xl-12">
                        <div style="background-image: linear-gradient( 109.6deg,  rgba(217,67,67,1) 11.2%, rgba(242,106,75,1) 100.6% );" class="card info-card goods-card">
                            <div class="card-body">
                                <h5 class="card-title">Đơn Hàng Hủy</h5>
                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart-check"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
        </div>


        <!-- <div class="col-12">
            <div class="card">

                <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Filter</h6>
                        </li>

                        <li><a class="dropdown-item" href="#">Today</a></li>
                        <li><a class="dropdown-item" href="#">This Month</a></li>
                        <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                </div>

                <div class="card-body">
                    <h5 class="card-title">Reports <span>/Today</span></h5>

                  
                    <div id="reportsChart"></div>

                    <script>
                        document.addEventListener("DOMContentLoaded", () => {
                            new ApexCharts(document.querySelector("#reportsChart"), {
                                series: [{
                                    name: 'Sales',
                                    data: [31, 40, 28, 51, 42, 82, 56],
                                }, {
                                    name: 'Revenue',
                                    data: [11, 32, 45, 32, 34, 52, 41]
                                }, {
                                    name: 'Customers',
                                    data: [15, 11, 32, 18, 9, 24, 11]
                                }],
                                chart: {
                                    height: 350,
                                    type: 'area',
                                    toolbar: {
                                        show: false
                                    },
                                },
                                markers: {
                                    size: 4
                                },
                                colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                fill: {
                                    type: "gradient",
                                    gradient: {
                                        shadeIntensity: 1,
                                        opacityFrom: 0.3,
                                        opacityTo: 0.4,
                                        stops: [0, 90, 100]
                                    }
                                },
                                dataLabels: {
                                    enabled: false
                                },
                                stroke: {
                                    curve: 'smooth',
                                    width: 2
                                },
                                xaxis: {
                                    type: 'datetime',
                                    categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                                },
                                tooltip: {
                                    x: {
                                        format: 'dd/MM/yy HH:mm'
                                    },
                                }
                            }).render();
                        });
                    </script>
                   
                </div>

            </div>
        </div> -->

        <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Biểu đồ tròn</h5>

                        <!-- Pie Chart -->
                        <canvas id="pieChart" style="max-height: 400px;"></canvas>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                const tongLSP = <?php echo json_encode($tongLSP); ?>;
                                const tongHSX = <?php echo json_encode($tongHSX); ?>;
                                const tongSP = <?php echo json_encode($tongSP); ?>;
                                const tongBV = <?php echo json_encode($tongBV); ?>;
                                const tongTK = <?php echo json_encode($tongTK); ?>;
                                const tongFA = <?php echo json_encode($tongFA); ?>;
                                
                                new Chart(document.querySelector('#pieChart'), {
                                type: 'pie',
                                data: {
                                    labels: [
                                    'loại sản phẩm',
                                    'hãng sản xuất',
                                    'sản phẩm',
                                    'bài viết',
                                    'tài khoản',
                                    'FAQ',
                                   
                                    
                                    ],
                                    datasets: [{
                                    label: 'Số lượng',
                                    data: [
                                        tongLSP, tongHSX, tongSP, tongBV, tongTK, tongFA
                                        
                                        
                                    ],

                                    backgroundColor: [
                                        'rgb(75, 192, 192)',   // Màu Xanh Lá Cây
                                        'rgb(255, 159, 64)',   // Màu Cam Đất
                                        'rgb(153, 102, 255)',   // Màu Tím Đậm
                                        'rgb(54, 162, 235)',     // Màu Xanh Dương Nhạt
                                        'rgb(201, 203, 207)',   // Màu Xám Nhạt
                                        'rgb(139, 69, 19)',  // Màu Nâu Đậm
                                    ],
                                    hoverOffset: 4
                                    }]
                                }
                                });
                            });
                        </script>
                        <!-- End Pie CHart -->
                    </div>
                    <p class="text-center">Tổng số lượng từng danh mục</p>
                </div>
            </div>
        </div>   

    </section>
</main>

@endsection