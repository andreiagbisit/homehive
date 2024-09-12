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
                <h1 id="header-h1" class="h3 mb-0 text-800">Dashboard</h1>
            </div>

            <!-- Content Rows -->
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div id="tally-card-title" class="font-weight-bold text-primary text-uppercase mb-1">HOA Officer / Admin-Type Accounts</div>
                                    <div id="tally-card-counter" class="h5 mb-0 font-weight-bold">9</div>
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
                                    <div id="tally-card-counter" class="h5 mb-0 font-weight-bold">480</div>
                                </div>
                                
                                <div class="col-auto">
                                    <i class="fas fa-home fa-2x text-info"></i>
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
                                    <div id="tally-card-counter" class="h5 mb-0 font-weight-bold">160</div>
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
                                    <div id="tally-card-counter" class="h5 mb-0 font-weight-bold">4</div>
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
                                    <div id="tally-card-counter" class="h5 mb-0 font-weight-bold">₱37,500</div>
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
                                    <div id="tally-card-counter" class="h5 mb-0 font-weight-bold">₱450,000</div>
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
                                    <div id="tally-card-counter" class="h5 mb-0 font-weight-bold">8</div>
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
                                    <div id="tally-card-counter" class="h5 mb-0 font-weight-bold">12</div>
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
                            <h1 id="header-h1" class="text-center">₱450,000</h1>
                            <p id="payment-total-amount-desc" class="text-center">Total Amount</p>

                            <div class="chart-pie pt-4">
                                <canvas id="pieChartAdminTypes"></canvas>
                            </div><hr>
                            
                            <div class="mt-4 text-center small">
                                <span id="chart-category" class="mr-2">
                                    <i class="fas fa-circle text-danger"></i> Maintenance<br>
                                </span>
                                <span id="chart-category" class="mr-2">
                                    <i class="fas fa-circle text-success"></i> Amenities & Services<br>
                                </span>
                                <span id="chart-category" class="mr-2">
                                    <i class="fas fa-circle text-primary"></i> Security<br>
                                </span>
                                <span id="chart-category" class="mr-2">
                                    <i class="fas fa-circle text-info"></i> Facility Reservation<br>
                                </span>
                                <span id="chart-category" class="mr-2">
                                    <i class="fas fa-circle text-warning"></i> Vehicle Sticker
                                </span>
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

                            <div id="payment-tally-category-card" class="card shadow mb-4 shadow-lg">
                                <div id="payment-tally-category-card" class="card-body bg-gradient-danger">
                                    <div class="row no-gutters align-items-center">
                                        <h2><i id="payment-tally-icon" class="fa fa-wrench text-danger bg-light p-2"></i></h2>
                                    </div>
                                    
                                    <h4 id="payment-tally-h4" class="text-light">Maintenance</h4>
                                    <div class="col-auto">
                                        <div id="payment-tally-percentage" class="h5 mb-0 mr-3 text-light">20% <span id="payment-tally-percentage-desc" class="h6">(2 collections made)</span></div>
                                    </div>

                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="payment-tally-category-card" class="card shadow mb-4 shadow-lg">
                                <div id="payment-tally-category-card" class="card-body bg-gradient-success">
                                    <div class="row no-gutters align-items-center">
                                        <h2><i id="payment-tally-icon" class="fas fa-umbrella-beach text-success bg-light p-2"></i></h2>
                                    </div>
                                    
                                    <h4 id="payment-tally-h4" class="text-light">Amenities & Services</h4>
                                    <div class="col-auto">
                                        <div id="payment-tally-percentage" class="h5 mb-0 mr-3 text-light">40% <span id="payment-tally-percentage-desc" class="h6">(4 collections made)</span></div>
                                    </div>

                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="payment-tally-category-card" class="card shadow mb-4 shadow-lg">
                                <div id="payment-tally-category-card" class="card-body bg-gradient-primary">
                                    <div class="row no-gutters align-items-center">
                                        <h2><i id="payment-tally-icon" class="fas fa-shield-alt text-primary bg-light p-2"></i></h2>
                                    </div>
                                    
                                    <h4 id="payment-tally-h4" class="text-light">Security</h4>
                                    <div class="col-auto">
                                        <div id="payment-tally-percentage" class="h5 mb-0 mr-3 text-light">60% <span id="payment-tally-percentage-desc" class="h6">(6 collections made)</span></div>
                                    </div>
                                    
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="payment-tally-category-card" class="card shadow mb-4 shadow-lg">
                                <div id="payment-tally-category-card" class="card-body bg-gradient-info">
                                    <div class="row no-gutters align-items-center">
                                        <h2><i id="payment-tally-icon" class="fas fa-swimming-pool text-info bg-light p-2"></i></h2>
                                    </div>
                                    
                                    <h4 id="payment-tally-h4" class="text-light">Facility Reservation</h4>
                                    <div class="col-auto">
                                        <div id="payment-tally-percentage" class="h5 mb-0 mr-3 text-light">80% <span id="payment-tally-percentage-desc" class="h6">(8 collections made)</span></div>
                                    </div>
                                    
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="payment-tally-category-card" class="card shadow mb-4 shadow-lg">
                                <div id="payment-tally-category-card" class="card-body bg-gradient-warning">
                                    <div class="row no-gutters align-items-center">
                                        <h2><i id="payment-tally-icon" class="fas fa-car-side text-warning bg-light p-2"></i></h2>
                                    </div>
                                    
                                    <h4 id="payment-tally-h4" class="text-light">Vehicle Sticker</h4>
                                    <div class="col-auto">
                                        <div id="payment-tally-percentage" class="h5 mb-0 mr-3 text-light">90% <span id="payment-tally-percentage-desc" class="h6">(9 collections made)</span></div>
                                    </div>
                                    
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-3">
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
                                        Used <span class="text-primary font-weight-bold">6 times</span> as collection medium
                                    </span><hr>
                                    
                                    <h5 id="transaction-mode-rate-desc-2">Usage Rate: <span class="text-primary font-weight-bold">60%</span></h5>
                                    
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
                                        Used <span class="text-danger font-weight-bold">8 times</span> as collection medium
                                    </span><hr>
                                    
                                    <h5 id="transaction-mode-rate-desc-2">Usage Rate: <span class="text-danger font-weight-bold">80%</span></h5>
                                    
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div style="height: 651px;" class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 id="card-h6" class="m-0">Collectors' Approach Rate</h6>
                        </div>
                        <div style="height: 651px;" class="card-body overflow-auto">
                            <div class="card border-left-danger shadow py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            
                                            <div class="row no-gutters align-items-center">
                                                <img id="collector-rate-img" class="img-profile rounded-circle" src="{{ url('img/pfp_2.png') }}"><br>
                                                <h3 id="collector-rate-h3">John Doe</h3>
                                            </div><hr>

                                            <h6 id="collector-rate-desc">Selected by households <span class="text-danger font-weight-bold">2 times</span> as a payment collector</h6>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 text-danger font-weight-bold">20%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-danger" role="progressbar"
                                                            style="width: 20%" aria-valuenow="20" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><br>

                            <div class="card border-left-success shadow py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            
                                            <div class="row no-gutters align-items-center">
                                                <img id="collector-rate-img" class="img-profile rounded-circle" src="{{ url('img/pfp_3.png') }}"><br>
                                                <h3 id="collector-rate-h3">Jane Doe</h3>
                                            </div><hr>

                                            <h6 id="collector-rate-desc">Selected by households <span class="text-success font-weight-bold">4 times</span> as a payment collector</h6>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 text-success font-weight-bold">40%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: 40%" aria-valuenow="40" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><br>

                            <div class="card border-left-primary shadow py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            
                                            <div class="row no-gutters align-items-center">
                                                <img id="collector-rate-img" class="img-profile rounded-circle" src="{{ url('img/pfp_4.png') }}"><br>
                                                <h3 id="collector-rate-h3">Michael Smith</h3>
                                            </div><hr>

                                            <h6 id="collector-rate-desc">Selected by households <span class="text-primary font-weight-bold">6 times</span> as a payment collector</h6>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 text-primary font-weight-bold">60%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                            style="width: 60%" aria-valuenow="60" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><br>

                            <div class="card border-left-warning shadow py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            
                                            <div class="row no-gutters align-items-center">
                                                <img id="collector-rate-img" class="img-profile rounded-circle" src="{{ url('img/pfp_5.png') }}"><br>
                                                <h3 id="collector-rate-h3">Mary Smith</h3>
                                            </div><hr>

                                            <h6 id="collector-rate-desc">Selected by households <span class="text-warning font-weight-bold">8 times</span> as a payment collector</h6>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 text-warning font-weight-bold">80%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-warning" role="progressbar"
                                                            style="width: 80%" aria-valuenow="80" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card shadow mb-4">
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

    <x-slot name="modal_delete_entry">
    </x-slot>

    <x-slot name="modal_bulletin_entry">
    </x-slot>

    <x-slot name="script">
        <x-script></x-script>
    </x-slot>
</x-base>