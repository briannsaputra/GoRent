@extends('layouts.mainlayouts')

@section('title', 'List-User')

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">List Brand</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="/dashboard">Dashboard</a>
                </li>
            </ul>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                @endforeach
        @endif
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">List User Inactive</h4>
                            <a href="/users" class="btn btn-danger btn-round ms-auto">
                                <i class="fas fa-arrow-left"></i>
                                Kembali
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Username</th>
                                        <th>Phone</th>
                                        <th style="width: 20% ">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registeredUsers as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}.</td>
                                            <td>{{ $item->username }}</td>
                                            <td>{{ $item->phone }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="/user-detail/{{$item->slug}}" class="btn btn-link btn-primary">
                                                        <i class="fa fa-edit"></i>
                                                        Detail
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
