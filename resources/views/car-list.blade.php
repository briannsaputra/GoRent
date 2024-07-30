@extends('layouts.layouthome')

@section('title', 'Car List')

@section('content')

    <div class="page-inner">
        <div class="row">
            @foreach ($cars as $item)
            <div class="col-md-4">
                <div class="card card-post card-round ">
                    <img class="card-img-top" src="{{ $item->foto != null ?  asset('storage/foto/'.$item->foto) :
                                asset('img/foto-tidak-ada.png')}}" alt="Card image cap" />
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="info-post ms-2">
                                <p class="username">{{ $item->model }}</p>
                                <p class="date text-muted">{{ $item->car_plate }}</p>
                            </div>
                        </div>
                        <div class="separator-solid"></div>
                        <p class="card-category text-success {{$item->status == 'in stock' ? 'text-success' : 'text-danger'}}">
                            {{ $item->status}}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
@endsection
