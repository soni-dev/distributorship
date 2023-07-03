@include('layouts.header')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title">
                            <h4 class="mb-0 font-size-18">Dashboard</h4>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active">Welcome to Distributor India Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Start page content-wrapper -->
            <div class="page-content-wrapper">
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary mini-stat position-relative">
                            <div class="card-body">
                                <div class="mini-stat-desc">
                                    <h5 class="text-uppercase verti-label font-size-16 text-white-50">Users</h5>
                                    <div class="text-white">
                                        <h5 class="text-uppercase font-size-16 text-white-50">Users
                                        </h5>
                                        <h3 class="mb-3 text-white">{{$counts['user']}}</h3>
                                        <div class="">
                                            <span class="badge bg-light text-info"></span> <span
                                                class="ms-2"></span>
                                        </div>
                                    </div>
                                    <div class="mini-stat-icon">
                                        <i class="mdi mdi-cube-outline display-2"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary mini-stat position-relative">
                            <div class="card-body">
                                <div class="mini-stat-desc">
                                    <h5 class="text-uppercase verti-label font-size-16 text-white-50">Distributor</h5>
                                    <div class="text-white">
                                        <h5 class="text-uppercase font-size-16 text-white-50">Distributor</h5>
                                        <h3 class="mb-3 text-white">{{$counts['dist']}}</h3>
                                        <div class="">
                                            <span class="badge bg-light text-danger"></span> <span
                                                class="ms-2"></span>
                                        </div>
                                    </div>
                                    <div class="mini-stat-icon">
                                        <i class="mdi mdi-buffer display-2"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary mini-stat position-relative">
                            <div class="card-body">
                                <div class="mini-stat-desc">
                                    <h5 class="text-uppercase verti-label font-size-16 text-white-50">Franchise
                                    </h5>
                                    <div class="text-white">
                                        <h5 class="text-uppercase font-size-16 text-white-50">Franchise</h5>
                                        <h3 class="mb-3 text-white">{{$counts['fran']}}</h3>
                                        <div class="">
                                            <span class="badge bg-light text-primary"></span> <span
                                                class="ms-2"></span>
                                        </div>
                                    </div>
                                    <div class="mini-stat-icon">
                                        <i class="mdi mdi-tag-text-outline display-2"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary mini-stat position-relative">
                            <div class="card-body">
                                <div class="mini-stat-desc">
                                    <h5 class="text-uppercase verti-label font-size-16 text-white-50">Sales Agent
                                    </h5>
                                    <div class="text-white">
                                        <h5 class="text-uppercase font-size-16 text-white-50">Sales Agent</h5>
                                        <h3 class="mb-3 text-white">{{$counts['sale']}}</h3>
                                        <div class="">
                                            <span class="badge bg-light text-info"></span> <span
                                                class="ms-2"></span>
                                        </div>
                                    </div>
                                    <div class="mini-stat-icon">
                                        <i class="mdi mdi-briefcase-check display-2"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">

                                    <!-- End Col -->

                                    <div class="col-xl-12">
                                        <h4 class="card-title mb-12">Daily Report</h4>
                                        <div class="p-3">
                                            <ul class="nav nav-pills nav-justified mb-3" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="pills-first-tab"
                                                        data-bs-toggle="pill" href="#pills-first" role="tab"
                                                        aria-controls="pills-first" aria-selected="true">Today</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-second-tab" data-bs-toggle="pill"
                                                        href="#pills-second" role="tab" aria-controls="pills-second"
                                                        aria-selected="false">Yesterday</a>
                                                </li>                                               
                                            </ul>

                                            <div class="tab-content">
                                                <div class="tab-pane show active" id="pills-first" role="tabpanel"
                                                    aria-labelledby="pills-first-tab">
                                                    <div class="p-3">
                                                        <h2>Distributors</h2>
                                                        <h2 class="text-muted">{{$counts['distTCount']}}</h2>
                                                        <h2>Franchisee</h2>
                                                        <h2 class="text-muted">{{$counts['franTCount']}}</h2>
                                                        <h2>Sales Agent</h2>
                                                        <h2 class="text-muted">{{$counts['saleTCount']}}</h2>
                                                    </div>
                                                </div>
                                                <div class="tab-pane" id="pills-second" role="tabpanel"
                                                    aria-labelledby="pills-second-tab">
                                                    <div class="p-3">
                                                        <h2>Distributors</h2>
                                                        <h2 class="text-muted">{{$counts['distYCount']}}</h2>
                                                        <h2>Franchisee</h2>
                                                        <h2 class="text-muted">{{$counts['franYCount']}}</h2>
                                                        <h2>Sales Agent</h2>
                                                        <h2 class="text-muted">{{$counts['saleYCount']}}</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Col -->
                                </div>
                                <!-- end row -->
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                {{--  <div class="col-xl-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Sales Analytics</h4>
                                <div id="morris-donut-example" class="dashboard-charts morris-charts"
                                    data-colors='["--bs-light",  "--bs-primary", "--bs-warning"]'></div>
                            </div>
                        </div>
                        <!-- End Card -->
                    </div> --}}
                    <!-- End Col -->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-3">Inbox</h4>
                                <div data-simplebar style="max-height: 334px;">
                                    <div class="inbox-wid">
                                        @forelse($counts['dists'] as $dist)
                                        <a href="{{url('distributor/'.$dist->slug)}}" class="text-dark">
                                            <div class="inbox-item">
                                                <div class="inbox-item-img float-start me-3"><img
                                                        src="{{ url($dist->logo) }}"
                                                        class="avatar-md rounded-circle" alt=""></div>
                                                <h6 class="inbox-item-author mb-1 text-dark">{{$dist->name}}</h6>
                                                <p class="inbox-item-text text-muted mb-0">@if(!empty($dist->anualsale_start)){{$dist->anualsale_start}} - {{$dist->anualsale_end}} {{$dist->anualsale_unit}}
                                                    @else
                                                    {{Str::limit($dist->remark,50)}}
                                                @endif</p>
                                                <p class="inbox-item-date text-muted">{{\Carbon\Carbon::parse($dist->created_at)->format('D M ,h:m A')}}</p>
                                            </div>
                                        </a>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->

                    {{-- <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-5 text-dark">Recent Activity Feed</h4>
                                <div>
                                    <ul class="nav nav-pills nav-justified recent-activity-tab mb-4"
                                        id="recent-activity-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="activity1-tab" data-bs-toggle="pill"
                                                href="#activity1" role="tab" aria-controls="activity1"
                                                aria-selected="true">21 Sep</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="activity2-tab" data-bs-toggle="pill"
                                                href="#activity2" role="tab" aria-controls="activity2"
                                                aria-selected="false">22 Sep</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="activity3-tab" data-bs-toggle="pill"
                                                href="#activity3" role="tab" aria-controls="activity3"
                                                aria-selected="false">23 Sep</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="activity4-tab" data-bs-toggle="pill"
                                                href="#activity4" role="tab" aria-controls="activity4"
                                                aria-selected="false">24 Sep</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane show active" id="activity1" role="tabpanel"
                                            aria-labelledby="activity1-tab">
                                            <div class="p-3">
                                                <div class="text-muted">
                                                    <p>21 Sep, 2018</p>
                                                    <h5 class="text-dark font-size-16">Responded to need
                                                        “Volunteer
                                                        Activities”</h5>
                                                    <p>Aenean vulputate eleifend tellus</p>
                                                    <p>Maecenas nec odio et ante tincidunt tempus. Donec vitae
                                                        sapien ut libero venenatis faucibus Nullam quis ante.
                                                    </p>
                                                    <a href="#" class="text-primary">Read More...</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="activity2" role="tabpanel"
                                            aria-labelledby="activity2-tab">
                                            <div class="p-3">
                                                <div class="text-muted">
                                                    <p>22 Sep, 2018</p>
                                                    <h5 class="text-dark font-size-16">Added an interest
                                                        “Volunteer
                                                        Activities”</h5>
                                                    <p>Neque porro quisquam est qui dolorem ipsum quia dolor sit
                                                        amet consectetur velit sed quia non tempora incidunt.
                                                    </p>
                                                    <p>Ut enim ad minima veniam quis nostrum</p>
                                                    <a href="#" class="text-primary">Read More...</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="activity3" role="tabpanel"
                                            aria-labelledby="activity3-tab">
                                            <div class="p-3">
                                                <div class="text-muted">
                                                    <p>23 Sep, 2018</p>
                                                    <h5 class="text-dark font-size-16">Joined the group
                                                        “Boardsmanship Forum”
                                                    </h5>
                                                    <p>Nemo enim voluptatem quia voluptas</p>
                                                    <p>Donec pede justo fringilla vel aliquet nec vulputate eget
                                                        arcu. In enim justo rhoncus ut imperdiet a venenatis
                                                        vitae. </p>
                                                    <a href="#" class="text-primary">Read More...</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="activity4" role="tabpanel"
                                            aria-labelledby="activity4-tab">
                                            <div class="p-3">
                                                <div class="text-muted">
                                                    <p>24 Sep, 2018</p>
                                                    <h5 class="text-dark font-size-16">Attending the event “Some
                                                        New Event”
                                                    </h5>
                                                    <p>At vero eos et accusamus et iusto odio</p>
                                                    <p>Sed ut perspiciatis unde omnis iste natus error sit
                                                        voluptatem accusantium doloremque laudantium </p>
                                                    <a href="#" class="text-primary">Read More...</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Col -->

                    <div class="col-xl-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Top product sales</h4>
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-16">Computers</h5>
                                                    <p class="text-muted mb-0">The languages only differ</p>
                                                </td>
                                                <td>
                                                    <div>
                                                        <span class="peity-pie"
                                                            data-peity='{ "fill": ["#f16c69", "#f2f2f2"]}'
                                                            data-width="54" data-height="54">70/100</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="font-size-16">70%</h5>
                                                    <p class="text-muted mb-0">Sales</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-16">Laptops</h5>
                                                    <p class="text-muted mb-0">Maecenas tempus tellus</p>
                                                </td>
                                                <td>
                                                    <div>
                                                        <span class="peity-donut"
                                                            data-peity='{ "fill": ["#35a989", "#f2f2f2"], "innerRadius": 20, "radius": 32 }'
                                                            data-width="54" data-height="54">9,4</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="font-size-16">84%</h5>
                                                    <p class="text-muted mb-0">Sales</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-16">Ipad</h5>
                                                    <p class="text-muted mb-0">Donec pede justo</p>
                                                </td>
                                                <td>
                                                    <div>
                                                        <span class="peity-pie"
                                                            data-peity='{ "fill": ["#9e4537", "#f2f2f2"]}'
                                                            data-width="54" data-height="54">62/100</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="font-size-16">62%</h5>
                                                    <p class="text-muted mb-0">Sales</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h5 class="font-size-16">Mobile</h5>
                                                    <p class="text-muted mb-0">Aenean leo ligula</p>
                                                </td>
                                                <td>
                                                    <div>
                                                        <span class="peity-donut"
                                                            data-peity='{ "fill": ["#35a989", "#f2f2f2"], "innerRadius": 20, "radius": 32 }'
                                                            data-width="54" data-height="54">20,4</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h5 class="font-size-16">89%</h5>
                                                    <p class="text-muted mb-0">Sales</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    <!-- End Col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end page-content-wrapper-->
        </div>
        <!-- Container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
<!-- end main content-->
@include('layouts.footer')