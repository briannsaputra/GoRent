@extends('layouts.mainlayouts')

@section('title', 'Dashboard')

@section('content')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
            </div>
            <div class="ms-md-auto py-2 py-md-0">
                <a href="/registered-users" class="btn btn-label-info btn-round me-2">
                    <span class="btn-label">
                        <i class="fa-solid fa-user-plus"></i>
                    </span>
                    Setujui Customer
                </a>
                <a href="/mobil-rent" class="btn btn-primary btn-round">
                    <span class="btn-label">
                        <i class="fa-solid fa-car"></i>
                    </span>
                    Sewa Mobil
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-primary card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-car-alt"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Jumlah Mobil</p>
                                    <h4 class="card-title">{{$car_count}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-info card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fab fa-bimobject"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Jumlah Merek</p>
                                    <h4 class="card-title">{{$brand_count}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-success card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="fas fa-user-alt"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Jumlah Customer</p>
                                    <h4 class="card-title">{{$user_count}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-secondary card-round">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-5">
                                <div class="icon-big text-center">
                                    <i class="far fa-check-circle"></i>
                                </div>
                            </div>
                            <div class="col-7 col-stats">
                                <div class="numbers">
                                    <p class="card-category">Belum Dikembalikan</p>
                                    <h4 class="card-title">{{ $rentlogs }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-round">
                    <div class="card-body">
                        <div class="card-head-row card-tools-still-right">
                            <div class="card-title">Customers</div>
                            <div class="card-tools">
                                <div class="dropdown">
                                    <button class="btn btn-icon btn-clean me-0" type="button" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="/users">List Customer</a>
                                        <a class="dropdown-item" href="/registered-users">Setujui Pengguna</a>
                                        <a class="dropdown-item" href="user-banned">View Banned User</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-list py-4">
                            @foreach ($user as $item)
                                
                        
                            <div class="item-list">
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
                                    <div class="username">{{ $item->username }}</div>
                                    <div class="status">{{ $item->phone }}</div>
                                </div>
                                <button class="btn btn-icon btn-link op-8 me-1">
                                    <i class="far fa-envelope"></i>
                                </button>
                                <button class="btn btn-icon btn-link btn-danger op-8">
                                    <i class="fas fa-ban"></i>
                                </button>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-0">
                            {{ $user->links() }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card card-round">
                    <div class="card-header">
                        <div class="card-head-row card-tools-still-right">
                            <div class="card-title">Transaction History</div>
                            <div class="card-tools">
                                <div class="dropdown">
                                    <button class="btn btn-icon btn-clean me-0" type="button" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-h"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="/mobil-rent">Sewa Mobil</a>
                                        <a class="dropdown-item" href="/returncar">Kembalikan Mobil</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center mb-0">
                                
                                <thead class="thead-light">
                                    
                                    <tr>
                                        <th scope="col">User</th>
                                        <th scope="col" class="text-center">Mobil</th>
                                        <th scope="col" class="text-center">Tgl Sewa</th>
                                        <th scope="col" class="text-center">Tgl mobil kembali</th>
                                        <th scope="col" class="text-center">Tgl Dikembalikan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rent_logs as $rent)
                                    <tr>
                                        <th scope="row">
                                            {{ $rent->user->username }}
                                        </th>
                                        <td class="text-center">{{ $rent->car->model }}</td>
                                        <td class="text-center">{{ $rent->rent_date }}</td>
                                        <td class="text-center">{{ $rent->return_date }}</td>
                                        <td class="text-end">
                                            <span class="{{ $rent->actual_return_date == null ? '' : ($rent->return_date < $rent->actual_return_date ? 'btn btn-danger' : 'btn btn-success') }}">
                                                {{ $rent->actual_return_date }}
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-2 px-3">
                                {{ $rent_logs->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
