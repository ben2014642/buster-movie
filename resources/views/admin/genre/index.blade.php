@extends('layouts.admin')
@push('datatable')
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">

    <!-- App css -->
    <link href="{{ asset('a_admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('a_admin/assets/css/app-creative.min.css') }}" rel="stylesheet" type="text/css" id="light-style" />
    {{-- <link href="{{ asset('a_admin/assets/css/app-creative-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style" /> --}}
@endpush
@section('content')
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Products</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Total Movie</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($genres as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>33</td>
                                        <td>Hiển thị</td>
                                        <td>
                                            <button type="button" class="btn btn-info rounded-pill">EDIT</button>
                                            <button type="button" class="btn btn-danger rounded-pill">DELETE</button>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div>
@endsection
@push('js-datatable')
    <script src="{{ asset('a_admin/assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('a_admin/assets/js/app.min.js') }}"></script>

    <!-- third party js -->
    <script src="//cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>

    <script>
        let table = new DataTable('#table-genres');
    </script>
@endpush
