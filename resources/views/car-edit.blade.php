@extends('layouts.mainlayouts')

@section('title', 'List-Mobil')

@section('content')
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Mobil</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="/cars-edit/{{$car->slug}}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <div class="col-md-6 col-lg-4">
                                <div class="form-group">
                                    <label>Car Plate</label>
                                    <input type="text" class="form-control" name="car_plate" id="car_plate"
                                        value="{{$car->car_plate}}"/>
                                </div>
                                <div class="form-group">
                                    <label>Model</label>
                                    <input type="text" class="form-control" name="model" id="model"
                                        value="{{$car->model}}"/>
                                </div>
                                <div class="form-group">
                                    <label>Masukan Foto Mobil</label>
                                    <input type="file" name="image" class="form-control-file"
                                        id="image" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Foto Lama</label>
                                    <div class="row">
                                        <div class="col-6 col-sm-4">
                                            <label class="imagecheck mb-4">
                                                <figure class="imagecheck-figure">
                                                    @if ($car->foto != '')
                                                        <img src="{{ asset('storage/foto/' . $car->foto) }}" alt=""
                                                            width="100px">
                                                    @else
                                                        <img src="{{ asset('img/foto-tidak-ada.png') }}" alt=""
                                                            width="100px">
                                                    @endif
                                                </figure>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Pilih Merek</label>
                                    <select name="brands[]" id="brand" class="form-select form-control">
                                        @foreach ($brands as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Tahun</label>
                                        <input type="number" name="tahun" value="{{$car->tahun}}" class="form-control"
                                            id="tahun" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Jumlah Bangku/jok</label>
                                        <input type="number" name="jok" value="{{$car->jok}}" class="form-control"
                                            id="jok" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Harga</label>
                                        <input type="text" name="harga" value="{{$car->harga}}" class="form-control"
                                            id="harga" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Bahan Bakar</label>
                                        <input type="text" name="bbm" value="{{$car->bbm}}" class="form-control"
                                            id="bbm" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Jarak Yang Bisa di Tempuh Mobil</label>
                                        <input type="text" name="odometer" value="{{$car->odometer}}" class="form-control"
                                            id="odometer" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Transmisi</label>
                                    <select name="transmisi" id="transmisi" class="form-select form-control">
                                        {{$car->transmisi}}
                                            <option>Manual</option>
                                            <option>Otomatis</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Merek Yang Dipakai</label>
                                    @foreach ($car->brands as $item)
                                        <li>{{ $item->name }}</li>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-success" type="submit">
                                    <i class="fa-solid fa-floppy-disk"></i>
                                    Simpan</button>
                                <a href="/car" class="btn btn-danger">Cancel</a>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </div>
@endsection
