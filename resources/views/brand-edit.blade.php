@extends('layouts.mainlayouts')

@section('title', 'Edit Brand')

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
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="/brand">Brand</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Edit Brand</div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="/brands-edit/{{$brand->slug}}" method="POST">
                                @csrf
                                @method('put')
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <label>Nama Brand</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Nama Brand" value="{{$brand->name}}" />
                                    </div>
                                </div>
                                <div class="card-action">
                                    <button class="btn btn-success" type="submit">Submit</button>
                                    <a href="/brand" class="btn btn-danger">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
