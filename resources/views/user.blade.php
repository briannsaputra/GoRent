@extends('layouts.mainlayouts')

@section('title', 'List Customer')

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
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <ul class="breadcrumbs ">
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
            <div class="ms-md-auto py-2 py-md-0">
                <a href="/user-banned" class="btn btn-label-info btn-round me-2">
                    <span class="btn-label">
                        <i class="fas fa-user-alt-slash"></i>
                    </span>
                    View Banned Users</a>
                <a href="registered-users" class="btn btn-primary btn-round">
                    <span class="btn-label">
                        <i class="fas fa-user-plus"></i>
                    </span>
                    Approve User</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-15">
                <div class="card card-round">
                    <div class="card-body">
                        <div class="card-head-row card-tools-still-right">
                            <div class="card-title">List Customer</div>
                            <div class="card-tools">
                                <div class="dropdown">
                                    <button class="btn btn-icon btn-clean me-0" type="button" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-list py-4">
                            @foreach ($user as $item)
                            <div class="item-list border p-3 mt-2">
                                <div class="avatar">
                                    @if ($item->foto != '')
                                                        <img src="{{ asset('storage/foto/' . $item->foto) }}" alt=""
                                                            width="100px" class="avatar-img rounded-circle">
                                                    @else
                                                        <img src="{{ asset('img/profil-kosong.jpg') }}" alt=""
                                                            width="100px" class="avatar-img rounded-circle">
                                                    @endif
                                </div>
                                <div class="info-user ms-3">
                                    <div class="username">{{ $item->username}}</div>
                                    <div class="status">{{ $item->phone}}</div>
                                    <div class="status">{{ $item->address}}</div>
                                </div>
                                <a href="/user-detail/{{$item->slug}}" class="btn btn-link btn-primary">
                                    <i class="fas fa-user-check"></i>
                                    Detail
                                </a>
                                <a href="/user-ban/{{$item->slug}}" class="btn btn-link btn-danger">
                                    <i class="fas fa-user-slash"></i>
                                    Ban User 
                                </a>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-2 px-3">
                            {{ $user->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
