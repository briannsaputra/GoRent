@extends('layouts.mainlayouts')

@section('title', 'User')

@section('content')
<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Ini halaman List User</h3>
        </div>
        <div class="ms-md-auto py-2 py-md-0">
            <a href="" class="btn btn-label-info btn-round me-2">
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
                        <div class="card-title">New Customers</div>
                        <div class="card-tools">
                            <div class="dropdown">
                                <button class="btn btn-icon btn-clean me-0" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-list py-4">
                        @foreach ($bannedUser as $item)
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
                            <a href="/user-restore/{{$item->slug}}" class="btn btn-link btn-primary">
                                <i class="fas fa-user-plus"></i>
                                Kembalikan
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection