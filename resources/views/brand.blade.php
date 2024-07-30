@extends('layouts.mainlayouts')

@section('title', 'List-Brand')

@section('search')
<form action="" method="GET">
<div class="input-group">
    <div class="input-group-prepend">
        <button type="submit" class="btn btn-search pe-1">
            <i class="fa fa-search search-icon"></i>
        </button>
    </div>
    <input type="text" placeholder="Search ..." name="keyword" class="form-control" />
</div>
</form>
@endsection

@section('content')
    {{-- <div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Ini halaman List Brand Mobil</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="#" class="btn btn-label-info btn-round me-2">Manage</a>
            <a href="#" class="btn btn-primary btn-round">Add Customer</a>
        </div>
    </div> --}}
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">List Merek</h3>
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
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title">Tambah Merek</h4>
                            {{-- <a href="/brand-add"> --}}
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                data-bs-target="#addRowModal">
                                <i class="fa fa-plus"></i>
                                Tambah Brand
                            </button>
                            {{-- </a> --}}
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="/brands-add" method="POST">
                                        @csrf
                                        <div class="modal-header border-0">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold"> Tamabahkan </span>
                                                <span class="fw-light"> Merek </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group form-group-default">
                                                <label>Name Merek</label>
                                                <input id="addName" type="text" name="name" class="form-control"
                                                    id="name" placeholder="nama" />
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="submit" id="addRowButton" class="btn btn-primary">
                                                Add
                                            </button>
                                            <a href="/brand" class="btn btn-danger">Cancel</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Merek</th>
                                        <th style="width: 10%">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brand as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}.</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="/brand-edit/{{ $item->slug }}"
                                                        class="btn btn-link btn-primary">
                                                        <i class="fa fa-edit"></i>
                                                        Edit
                                                    </a>
                                                    <a href="/brand-hapus/{{ $item->slug }}"
                                                        class="btn btn-link      btn-danger" id="alert_demo_4"
                                                        onclick="return confirm('Are you sure?')">
                                                        <i class="fa fa-times"></i>
                                                        Delete
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-2 px-3">
                                {{ $brand->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
