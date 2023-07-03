@include('layouts.header')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-flex align-items-center justify-content-between">
                        <div class="page-title">
                           @php $interest = ($type == 'distributor')? 'Distributor':(($type == 'frenchies')? 'Frenchies' :'Sales Agent'); @endphp
                            <h4 class="mb-0 font-size-18">{{ $interest}} List</h4>
                            <!--<ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="subscription-list.php">Subscription</a></li>
                                <li class="breadcrumb-item active">Subscription list</li>
                            </ol>-->
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <!-- Start page content-wrapper -->
            <div class="page-content-wrapper">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mb-0">
                                <thead>
                                <tr class="table-warning">
                                        <th>#</th>
                                        <th>Logo</th>
                                        <th>Title</th>
                                        <th>Mode</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(isset($lists))
                                
                                    @foreach ($lists as $key=> $list)
                                    <tr>
                                        <th>{{ ++$key}}</th>
                                        <th><img src="{{ url($list->logo) }}" class="img img-thumbnail" width="100"/></th>
                                        <td>{{ $list->name }}</td>
                                        <td>{{ ucfirst($list->mode) }}</td>
                                        <td>{{Helper::getCatName($list->category_id)}}</td>
                                        <td><button
                                            class="btn btn-sm" href="#" data-bs-target="#modal-quickview"
                                            onclick="viewDist('{{ $list->id }}','{{ $type }}','{{ route('admin.view') }}')"
                                            data-bs-toggle="modal"><i
                                            class="fa-sharp fa-solid fa-eye"></i></button>
                                           &nbsp; | &nbsp;
                                                    
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="featured-{{$list->id}}" onclick="featured('{{ $list->id }}','{{ $type}}','{{ route('featured') }}','featured-{{$list->id}}')"   {{($list->is_featured)?'checked':''}}>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Featured 
                                            </label>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                            {{ $lists->links() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.distributionship.view')
@include('layouts.footer')