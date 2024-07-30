@extends('layouts.mainlayouts')

@section('title', 'List-Mobil')

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
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">List Mobil</h3>
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
                            <h4 class="card-title">Tambah Mobil</h4>
                            <button class="btn btn-primary btn-round ms-auto" data-bs-toggle="modal"
                                data-bs-target="#addRowModal">
                                <i class="fa fa-plus"></i>
                                Tambah Mobil
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Modal -->
                        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title">
                                            <span class="fw-mediumbold">Tambah</span>
                                            <span class="fw-light"> Mobil </span>
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="add-car" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Nomor Plat</label>
                                                        <input id="car_plate" type="text" class="form-control"
                                                            name="car_plate" placeholder="nomor plat" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>Merek</label>
                                                        <input id="model" type="text" class="form-control"
                                                            name="model" placeholder="merek" />
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group form-group-default">
                                                        <label>
                                                            Pilih Merek
                                                        </label>
                                                        <select name="brands" id="brands" class="form-select">
                                                            @foreach ($brand as $item)
                                                                <option value="{{ $item->id }}">{{ $item->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Foto</label>
                                                        <input type="file" name="image" class="form-control-file"
                                                            id="image" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Tahun</label>
                                                        <input type="number" name="tahun" placeholder="2023" class="form-control"
                                                            id="tahun" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Jumlah Bangku/jok</label>
                                                        <input type="number" name="jok" placeholder="4" class="form-control"
                                                            id="jok" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Harga/Hari</label>
                                                        <input type="text" name="harga" placeholder="600" class="form-control"
                                                            id="harga" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Bahan Bakar</label>
                                                        <input type="text" name="bbm" placeholder="Diesel" class="form-control"
                                                            id="bbm" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group form-group-default">
                                                        <label>Jarak Yang Bisa di Tempuh Mobil</label>
                                                        <input type="text" name="odometer" placeholder="10 KM / 1 Liter" class="form-control"
                                                            id="odometer" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Transmisi</label>
                                                    <select name="transmisi" id="transmisi" class="form-select form-control">
                                                            <option>Manual</option>
                                                            <option>Otomatis</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0">
                                            <button type="submit"  class="btn btn-primary">
                                                Save
                                            </button>
                                            <a href="/car" class="btn btn-danger">Cancel</a>
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
                                        <th>No Plate</th>
                                        <th>Model</th>
                                        <th>Foto</th>
                                        <th>Status</th>
                                        <th style="width: 20% ">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($car as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}.</td>
                                            <td>{{ $item->car_plate }}</td>
                                            <td>{{ $item->model }}</td>
                                            <td>
                                                    @if ($item->foto != '')
                                                        <img src="{{ asset('storage/foto/' . $item->foto) }}" alt=""
                                                            width="100px">
                                                    @else
                                                        <img src="{{ asset('img/foto-tidak-ada.png') }}" alt=""
                                                            width="100px">
                                                    @endif
                                            </td>
                                            <td>
                                                <span class="{{$item->status == 'in stock' ? 'badge badge-success' : 'badge badge-danger'}}">{{ $item->status }}</span>
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="/car-edit/{{ $item->slug }}" class="btn btn-link btn-primary">
                                                        <i class="fa fa-edit"></i>
                                                        Edit
                                                    </a>
                                                    <a href="/car-destroy/{{ $item->slug }}" class="btn btn-link      btn-danger" id="alert_demo_4"
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
                            <div class="mt-0 p-4">
                                {{ $car->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
