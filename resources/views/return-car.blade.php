@extends('layouts.mainlayouts')

@section('title', 'Pengembalian Mobil')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@section('content')
    <div class="page-inner">
        <div class="page-header">
            <ul class="breadcrumbs mb-1">
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
        <div class="mt-3">
            @if (session('message'))
                <div class="alert {{session('alert-class')}}">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Pengembalian Mobil</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="return-cars" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>User</label>
                                    <select class="form-select form-control inputbox" style="width: 100%" name="user_id">
                                        <option>Pilih User</option>
                                        @foreach ($users as $item)
                                            <option value="{{ $item->id }}">{{ $item->username }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Mobil</label>
                                    <select class="form-select form-control inputbox" style="width: 100%" name="car_id">
                                        <option>Pilih Mobil</option>
                                        @foreach ($cars as $item)
                                            <option value="{{ $item->id }}">{{$item->car_plate}} : {{ $item->model }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button class="btn btn-success mx-2 mt-3" type="submit">Submit</button>
                                <a href="/mobil-rent" class="btn btn-danger mt-3">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ 'https://code.jquery.com/jquery-3.7.1.min.js' }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('.inputbox').select2();
    </script>
@endsection
