@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <form class="d-flex">
                            <div class="input-group">
                                <input type="text" class="form-control form-control-light" id="dash-daterange">
                                <span class="input-group-text bg-success border-success text-white">
                                    <i class="mdi mdi-calendar-range font-13"></i>
                                </span>
                            </div>
                            <a href="javascript: void(0);" class="btn btn-success ms-2">
                                <i class="mdi mdi-autorenew"></i>
                            </a>
                        </form>
                    </div>
                    <h4 class="page-title">Edit Celebrity</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @if (session()->has('success'))
                    <div class="alert alert-success">{{ session()->get('success') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form enctype="multipart/form-data" method="POST" action="{{ route('admin.celebrity.update', $celebrity) }}" class="">
                    @csrf
                    @method('PUT')
                    <div class="col-3">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" class="form-control" value="{{ $celebrity->name }}" id="exampleInputEmail1"
                                name="name" placeholder="Enter email">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Description</label>
                            <input type="text" class="form-control" value="{{ $celebrity->description }}" id="exampleInputEmail1"
                                name="description" placeholder="Enter email">
                        </div>
                        <div class="mb-3">
                            <img src="{{ Storage::url($celebrity->image) }}" width="100px" alt="">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Description</label>
                            <input type="text" class="form-control" value="{{ $celebrity->description }}" id="exampleInputEmail1"
                                name="description" placeholder="Enter email">
                        </div>
                        <div class="mb-3">
                            <select style="width: 120px" class="form-select" name="status" id="">
                                <option @if (!$celebrity->status) selected @endif value="0">Disable</option>
                                <option @if ($celebrity->status) selected @endif value="1">Enable</option>
                            </select>
                        </div>
                        <button class="btn btn-primary">Save</button>
                        <a href="{{ route('admin.celebrity.index') }}" class="btn btn-danger ms-2">Back</a>

                    </div>
                </form>
            </div>
        </div>
        <!-- end page title -->

    </div>
@endsection
