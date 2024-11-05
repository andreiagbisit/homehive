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
            <x-slot name="sidebar_landing_link_user">
                <x-sidebar-landing-link-user></x-sidebar-landing-link-user>
            </x-slot>

            <x-slot name="sidebar_landing_link_admin"></x-slot>
            <x-slot name="sidebar_landing_link_super_admin"></x-slot>

            <x-slot name="sidebar_content_user">
                <x-sidebar-content-user></x-sidebar-content-user>
            </x-slot>
            
            <x-slot name="sidebar_content_admin"></x-slot>
            <x-slot name="sidebar_content_super_admin"></x-slot>
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
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div id="tally-card-title" class="font-weight-bold text-danger text-uppercase mb-1">Pending Payments</div>
                                    <div id="tally-card-counter" class="h5 mb-0 font-weight-bold">{{ $pendingPaymentsCount }}</div>
                                </div>
                                
                                <div class="col-auto">
                                    <i class="fas fa-file-invoice-dollar fa-2x text-danger"></i>
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
                                    <div id="tally-card-title" class="font-weight-bold text-success text-uppercase mb-1">Upcoming Appointments</div>
                                    <div id="tally-card-counter" class="h5 mb-0 font-weight-bold">{{ $upcomingAppointmentsCount }}</div>
                                </div>
                                
                                <div class="col-auto">
                                    <i class="fas fa-calendar-alt fa-2x text-success"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div id="tally-card-title" class="font-weight-bold text-primary text-uppercase mb-1">Registered Vehicles</div>
                                    <div id="tally-card-counter" class="h5 mb-0 font-weight-bold">{{ $registeredVehiclesCount }}</div>
                                </div>
                                
                                <div class="col-auto">
                                    <i class="fas fa-car-side fa-2x text-primary"></i>
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
                                    <div id="tally-card-title" class="font-weight-bold text-warning text-uppercase mb-1">Facilities Reserved</div>
                                    <div id="tally-card-counter" class="h5 mb-0 font-weight-bold">{{ $reservedFacilitiesCount }}</div>
                                </div>
                                
                                <div class="col-auto">
                                    <i class="fas fa-swimming-pool fa-2x text-warning"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <!-- Basic Card Example -->
                    <div style="height: 651px;" class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0">Fund Collection Payment (Current Year)</h6>
                        </div>
                        <div style="height: 651px;" class="card-body">
                            <h1 id="dashboard-amount-value" class="text-center">₱{{ number_format(array_sum($categoryTotals), 2) }}</h1>
                            <p id="payment-total-amount-desc" class="text-center">Total Amount</p>

                            <div class="chart-pie pt-4">
                                <canvas id="pieChartUser"></canvas>
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
                <div class="col-lg-4">
                        <!-- Basic Card Example -->
                        <div class="card shadow mb-4" style="height: 651px;">
                            <div class="card-header py-3">
                                <h6 id="card-h6" class="m-0">Payments Tallied per Category</h6>
                            </div>
                            <div class="card-body overflow-auto" style="height: calc(651px - 56px);"> <!-- Adjust height based on header height -->
                                @foreach ($categoryNames as $index => $name)
                                    <div class="card shadow mb-4 rounded-lg" id="payment-tally-category-card"> <!-- Use unique classes -->
                                        <div class="card-body" style="background-color: {{ $categoryColors[$index] }};">
                                            <h4 class="text-light">{{ $name }}</h4>
                                            <div class="col-auto">
                                                @if (isset($categoryPercentages[$index]) && isset($categoryTotals[$index]))
                                                    <div class="h5 mb-0 mr-3 text-light">
                                                        {{ $categoryPercentages[$index] }}% 
                                                        <span class="h6">({{ $categoryCounts[$index] }} payments made)</span>
                                                    </div>
                                                @else
                                                    <div class="h5 mb-0 mr-3 text-light">
                                                        No data available for this category.
                                                    </div>
                                                @endif
                                            </div>

                                            <div class="col">
                                                @if (isset($categoryPercentages[$index]))
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-dark" role="progressbar" 
                                                            style="width: {{ $categoryPercentages[$index] }}%;" 
                                                            aria-valuenow="{{ $categoryPercentages[$index] }}" 
                                                            aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                @else
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-dark" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                <div class="col-lg-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0">Modes of Transaction Utilized</h6>
                        </div>
                        <div id="transaction-mode-rate-content" class="card-body">

                            <div class="card mb-1 py-2 border-bottom-primary shadow">
                                <div class="card-body">
                                    <img id="gcash-logo-1" class="profile" src="{{ url('img/gcash_logo_1.png') }}"/><br>
                                    
                                    <span class="h3 font-weight-bold text-primary">GCash</span><br>
                                    
                                    <span class="h6">
                                        Used <span class="text-primary font-weight-bold">{{ $gcashCount }}</span> as payment medium
                                    </span><hr>
                                    
                                    <h5 id="transaction-mode-rate-desc-2">Usage Rate: <span class="text-primary font-weight-bold">{{ $gcashPercentage }}%</span></h5>
                                    
                                    <div class="progress">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div><br>

                            <div class="card mb-1 py-2 border-bottom-danger shadow">
                                <div class="card-body">
                                    <h1>
                                        <i id="transaction-mode-rate-on-site-icon" class="fas fa-hand-holding-usd text-white bg-danger p-2"></i>
                                    </h1>
                                    
                                    <span class="h3 font-weight-bold text-danger">On-site Payment</span><br>
                                    
                                    <span class="h6">
                                        Used <span class="text-danger font-weight-bold">{{ $onSiteCount }}</span> as payment medium
                                    </span><hr>
                                    
                                    <h5 id="transaction-mode-rate-desc-2">Usage Rate: <span class="text-danger font-weight-bold">{{ $onSitePercentage }}%</span></h5>
                                    
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
            var categoryLabels = @json($categoryNames);
            var categoryValues = @json(array_values($categoryTotals));
            var categoryColors = @json($categoryColors);

            var ctx = document.getElementById("pieChartUser");
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
        

    </x-slot>
</x-base>