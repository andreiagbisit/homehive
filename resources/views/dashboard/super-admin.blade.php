<x-base>
    <x-slot name="head">
        <x-head>
            <x-slot name="title">
                <title>HomeHive - Dashboard</title>
            </x-slot>
        </x-head>
    </x-slot>
    
    <x-slot name="sidebar_base">
        <x-sidebar-base>
            <x-slot name="sidebar_landing_link_super_admin">
                <x-sidebar-landing-link-super-admin></x-sidebar-landing-link-super-admin>
            </x-slot>

            <x-slot name="sidebar_landing_link_user"></x-slot>
            <x-slot name="sidebar_landing_link_admin"></x-slot>

            <x-slot name="sidebar_content_super_admin">
                <x-sidebar-content-super-admin></x-sidebar-content-super-admin>
            </x-slot>
            
            <x-slot name="sidebar_content_user"></x-slot>
            <x-slot name="sidebar_content_admin"></x-slot>
        </x-sidebar-base>
    </x-slot>

    <x-slot name="topbar">
        <x-topbar></x-topbar>
    </x-slot>

    <x-slot name="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 id="header-h1">Dashboard</h1>
            </div>

            <!--
            <div class="d-sm-flex mb-4">
                <a href="#" class="btn btn-warning btn-icon-split" data-toggle="modal" data-target="#dashboardModalEdit">
                    <span class="icon text-white-50">
                        <i class="fas fa-poll"></i>
                    </span>
                    <span class="text" style="color: #000; font-weight: 500;">Manage Dashboard</span>
                </a>
            </div> -->

            <!-- Content Rows 
            <div class="row">
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card border-left-secondary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div id="tally-card-title-subdivision" class="d-inline-flex font-weight-bold text-black text-uppercase mb-1">
                                        <i class="fas fa-home fa-2x text-black pr-2"></i> Subdivision
                                    </div>
                                    <div id="tally-card-counter" class="h2 mb-0 font-weight-bold pb-2">Lorem Ipsum Residences</div>
                                </div>
                                
                                <div class="col-auto">
                                    <img id="table-pfp" class="img-circle profile-avatar border border-secondary rounded-circle" src="{{ url('img/subd-logo.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div id="tally-card-title" class="font-weight-bold text-primary text-uppercase mb-1">HOA / Subdivision Official Accounts</div>
                                    <div id="tally-card-counter" class="h5 mb-0 font-weight-bold">{{ $hoaOfficerCount }}</div>
                                </div>
                                
                                <div class="col-auto">
                                    <i class="fas fa-user-tie fa-2x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div id="tally-card-title" class="font-weight-bold text-info text-uppercase mb-1">Household Accounts</div>
                                    <div id="tally-card-counter" class="h5 mb-0 font-weight-bold">{{ $householdAccountsCount }}</div>
                                </div>
                                
                                <div class="col-auto">
                                    <i class="fas fa-house-user fa-2x text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div id="tally-card-title" class="font-weight-bold text-info text-uppercase mb-1">Households Invoiced</div>
                                    <div id="tally-card-counter" class="h5 mb-0 font-weight-bold">{{ $householdsInvoicedCount }}</div>
                                </div>
                                
                                <div class="col-auto">
                                    <i class="fas fa-file-invoice-dollar fa-2x text-info"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div id="tally-card-title" class="font-weight-bold text-success text-uppercase mb-1">Payment Collectors</div>
                                    <div id="tally-card-counter" class="h5 mb-0 font-weight-bold">{{ $paymentCollectorsCount }}</div>
                                </div>
                                
                                <div class="col-auto">
                                    <i class="fas fa-comment-dollar fa-2x text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div id="tally-card-title" class="font-weight-bold text-warning text-uppercase mb-1">Fund Collection Earnings (Monthly)</div>
                                    <div id="tally-card-counter" class="h5 mb-0 font-weight-bold">₱{{ number_format($monthlyFundCollection, 2) }}</div>
                                </div>

                                <div class="col-auto">
                                    <i class="fas fa-donate fa-2x text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div id="tally-card-title" class="font-weight-bold text-warning text-uppercase mb-1">Fund Collection Earnings (Annual)</div>
                                    <div id="tally-card-counter" class="h5 mb-0 font-weight-bold">₱{{ number_format($annualFundCollection, 2) }}</div>
                                </div>
                                
                                <div class="col-auto">
                                    <i class="fas fa-donate fa-2x text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div id="tally-card-title" class="font-weight-bold text-danger text-uppercase mb-1">Facility Reservation Requests</div>
                                    <div id="tally-card-counter" class="h5 mb-0 font-weight-bold">{{ $facilityReservationRequests }}</div>
                                </div>
                                
                                <div class="col-auto">
                                    <i class="fas fa-swimming-pool fa-2x text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div id="tally-card-title" class="font-weight-bold text-danger text-uppercase mb-1">Vehicle Sticker Requests</div>
                                    <div id="tally-card-counter" class="h5 mb-0 font-weight-bold">{{ $vehicleStickerRequests }}</div>
                                </div>
                                
                                <div class="col-auto">
                                    <i class="fas fa-car-side fa-2x text-danger"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0">Subdivision Fund Collection</h6>
                        </div>

                        <div class="card-body">
                            <h1 id="dashboard-amount-value" class="text-center">₱{{ number_format((float) array_sum($categoryTotals), 2) }}</h1>
                            <p id="payment-total-amount-desc" class="text-center">Total Amount</p>

                            <div class="chart-pie pt-4">
                                <canvas id="pieChartAdminTypes"></canvas>
                            </div><hr>
                            
                            <div class="mt-4 text-center small">
                                @foreach ($categoryNames as $index => $name)
                                    <span id="chart-category" class="mr-2">
                                        <i class="fas fa-circle" style="color: {{ $categoryColors[$index] }}"></i> {{ $name }}<br>
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div style="height: 609px;" class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0">Fund Collection Earnings Overview</h6>
                        </div>
                        <div style="height: 609px;" class="card-body">
                            <div style="height: 509px;" class="chart-bar">
                                <canvas id="barChartAdminTypes"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div style="height: 609px;" class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0">Collections Tallied per Category</h6>
                        </div>
                        <div style="height: 609px;" class="card-body overflow-auto">
                            @foreach ($categoryNames as $index => $name)
                                <div id="payment-tally-category-card" class="card shadow mb-4 shadow-lg rounded-lg"> <!-- Added rounded-lg -->
                                    <div class="card-body" style="box-shadow: 2px 2px 10px #969696; border-radius: 5px; background-color: {{ $categoryColors[$index] }};">
                                        <h4 id="payment-tally-h4" class="text-light">{{ $name }}</h4>
                                        <div class="col-auto">
                                            <div id="payment-tally-percentage" class="h5 mb-0 mr-3 text-light">
                                                {{ $categoryPercentages[$index] }}% 
                                                <span id="payment-tally-percentage-desc" class="h6">{{ $categoryCounts[$index] }} collections made</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-4">
                    
                <!--    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0">Facility Reservation Rate</h6>
                        </div>
                        <div class="card-body">
                            <h4 class="text-danger font-weight-bold">Clubhouse <span class="float-right">20%</span></h4>
                            <h6 id="facility-rate-desc">Reserved <span class="text-danger font-weight-bold">2 times</span> by households</h6>

                            <div class="progress mb-4">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <h4 class="text-success font-weight-bold">Basketball Court <span class="float-right">40%</span></h4>
                            <h6 id="facility-rate-desc">Reserved <span class="text-success font-weight-bold">4 times</span> by households</h6>

                            <div class="progress mb-4">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 40%"
                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                            <h4 class="text-primary font-weight-bold">Swimming Pool <span class="float-right">60%</span></h4>
                            <h6 id="facility-rate-desc">Reserved <span class="text-primary font-weight-bold">6 times</span> by households</h6>

                            <div class="progress mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </x-slot>
    
    <x-slot name="footer">
        <x-footer></x-footer>
    </x-slot>

    <x-slot name="scroll_to_top">
        <x-scroll-to-top></x-scroll-to-top>
    </x-slot>

    <x-slot name="modal_logout">
        <x-modal-logout></x-modal-logout>
    </x-slot>

    <x-slot name="modal_change_pw">
    </x-slot>

    <x-slot name="modal_dashboard_edit">
        <x-modal-dashboard-edit></x-modal-dashboard-edit>
    </x-slot>

    <x-slot name="modal_delete_entry">
    </x-slot>

    <x-slot name="modal_bulletin_entry">
    </x-slot>

    <x-slot name="modal_bulletin_add">
    </x-slot>

    <x-slot name="modal_appt_and_res_manage">
    </x-slot>

    <x-slot name="script">
        <x-script></x-script>

        <script>
            // Retrieve dynamic data from the controller
            var categoryLabels = @json($categoryNames);
            var categoryValues = @json($categoryTotals);
            var categoryColors = @json($categoryColors);

            // Initialize the pie chart with dynamic data
            var ctx = document.getElementById("pieChartAdminTypes");
            var myPieChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: categoryLabels,
                    datasets: [{
                        data: categoryValues,
                        backgroundColor: categoryColors,
                        hoverBackgroundColor: categoryColors,
                        hoverBorderColor: "rgba(234, 236, 244, 1)",
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#858796",
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem, data) {
                                var dataset = data.datasets[tooltipItem.datasetIndex];
                                var currentValue = dataset.data[tooltipItem.index];
                                var label = data.labels[tooltipItem.index];
                                return `${label}: ₱${currentValue}`;
                            }
                        }
                    },
                    legend: {
                        display: false
                    },
                    cutoutPercentage: 80,
                },
            });
        </script>

        <script>
            // Get the monthly revenue data from PHP
            // Set a default max value if monthlyRevenueData is empty or undefined
            var monthlyRevenueData = Object.values(@json($monthlyData));
            console.log("Monthly Revenue Data (Array Format):", monthlyRevenueData); // Check the array format

            // Set max based on data if available, or a default of 1000000
            var maxRevenue = monthlyRevenueData.length ? Math.max(...monthlyRevenueData) * 1.1 : 1000000;

            var ctx = document.getElementById("barChartAdminTypes");
            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                    datasets: [{
                        label: "Revenue",
                        backgroundColor: "#f6c23e",
                        hoverBackgroundColor: "#e6a500",
                        borderColor: "#f6c23e",
                        data: monthlyRevenueData, // Now in proper array format
                    }],
                },
                options: {
                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0
                        }
                    },
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'month'
                            },
                            gridLines: {
                                display: false,
                                drawBorder: false
                            },
                            ticks: {
                                maxTicksLimit: 12
                            },
                            maxBarThickness: 25,
                        }],
                        yAxes: [{
                            ticks: {
                                min: 0,
                                max: maxRevenue, // Dynamically set max value based on data
                                maxTicksLimit: 6,
                                padding: 10,
                                callback: function(value) {
                                    return '₱' + number_format(value);
                                }
                            },
                            gridLines: {
                                color: "rgb(190, 190, 190)",
                                zeroLineColor: "rgb(190, 190, 190)",
                                drawBorder: false,
                                borderDash: [2],
                                zeroLineBorderDash: [2]
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        titleMarginBottom: 10,
                        titleFontColor: '#000',
                        titleFontSize: 14,
                        backgroundColor: "rgb(255,255,255)",
                        bodyFontColor: "#000",
                        borderColor: '#dddfeb',
                        borderWidth: 1,
                        xPadding: 15,
                        yPadding: 15,
                        displayColors: false,
                        caretPadding: 10,
                        callbacks: {
                            label: function(tooltipItem) {
                                return 'Revenue: ₱' + number_format(tooltipItem.yLabel);
                            }
                        }
                    },
                }
            });

        </script>


    </x-slot>
</x-base>
