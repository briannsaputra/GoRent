        @extends('layouts.mainlayouts')

        @section('title', 'Detail user')

        @section('content')
        <div class="page-inner">
                <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row">
                        <form action="/users-edit/{{ $user->slug }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                <div class="card mb-4">
                                        <h5 class="card-header">Profile Details</h5>
                                        <!-- Account -->
                                        <div class="card-body">
                                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                                                @if ($user->foto != '')
                                                <img src="{{ asset('storage/foto/' . $user->foto) }}" alt=""
                                                        style="width:100px; height:150px;">
                                                @else
                                                <img src="{{ asset('img/profil-kosong.jpg') }}" alt="" style="width:100px; height:150px;">
                                                @endif
                                                <div class="button-wrapper">
                                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                        <span class="d-none d-sm-block text-white">Upload new photo</span>
                                                        <i class="fas fa-file-upload d-block d-sm-none"
                                                        style="color: aliceblue"></i>
                                                        <input type="file" id="upload" name="image"
                                                        class="account-file-input" hidden accept="image/png, image/jpeg" />
                                                </label>
                                                @if ($user->status == 'inactive')
                                                        <a href="/user-approve/{{ $user->slug }}"
                                                        class="btn              btn-success account-image-reset mb-4">
                                                        <i class="fas fa-history d-block d-sm-none"></i>
                                                        <span class="d-none d-sm-block">Setujui Pengguna</span>
                                                        </a>
                                                @endif
                                                <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                                </div>
                                        </div>
                                        </div>
                                        <hr class="my-0" />
                                        <div class="card-body">
                                        <div class="row">
                                                <div class="mb-3 col-md-6">
                                                <label for="firstName" class="form-label">username</label>
                                                <input class="form-control" type="text" id="firstName"
                                                        value="{{ $user->username }}" autofocus />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                <label for="lastName" class="form-label">no_ktp</label>
                                                <input class="form-control" type="text" id="lastName"
                                                        value="{{ $user->no_ktp }}" />
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                <label class="form-label" for="phoneNumber">Phone Number</label>
                                                <div class="input-group input-group-merge">
                                                        <span class="input-group-text">ID (+62)</span>
                                                        <input type="text" id="phoneNumber" class="form-control"
                                                        placeholder="{{ $user->phone }}" />
                                                </div>
                                                </div>
                                                <div class="mb-3 col-md-6">
                                                <label for="state" class="form-label">State</label>
                                                <input class="form-control" type="text" id="state"
                                                        placeholder="{{ $user->status }}" />
                                                </div>
                                                <div class="form-group">
                                                        <label for="comment">Address</label>
                                                        <textarea class="form-control" name="address" id="comment" rows="5"> {{ $user->address }}
                                                        </textarea>
                                                </div>
                                        </div>
                                        <div class="mt-2">
                                                <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                                <a href="/users" class="btn btn-outline-secondary">Cancel</a>
                                        </div>
                                        </div>
                                        <!-- /Account -->
                                </div>
                                <div class="card">
                                        <h5 class="card-header">List Sewa Mobil</h5>
                                        <div class="card-body">
                                        <div class="mb-3 col-12 mb-0">
                                                <div class="alert alert-warning">
                                                <div class="card-body">
                                                        <div class="table-responsive">
                                                        <table id="basic-datatables"
                                                                class="display table table-striped table-hover">
                                                                <thead align="center">
                                                                <tr>
                                                                        <th>No.</th>
                                                                        <th>User</th>
                                                                        <th>Mobil</th>
                                                                        <th>Tanggal Sewa</th>
                                                                        <th>Tanggal Kembali</th>
                                                                        <th>Tanggal Pengembalian</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody align="center">
                                                                @foreach ($rent_logs as $item)
                                                                        <tr>
                                                                        <td>{{ $loop->iteration }}</td>
                                                                        <td>{{ $item->user->username }}</td>
                                                                        <td align="left">{{ $item->car->model }}</td>
                                                                        <td>{{ $item->rent_date }}</td>
                                                                        <td>{{ $item->return_date }}</td>
                                                                        <td>
                                                                                <span
                                                                                class="{{ $item->actual_return_date == null ? '' : ($item->return_date < $item->actual_return_date ? 'btn btn-danger' : 'btn btn-success') }}">
                                                                                {{ $item->actual_return_date }}
                                                                                </span>
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
                                </div>
                        </form>
                        </div>
                </div>
                <!-- / Content -->
                <!-- / Footer -->
                <div class="content-backdrop fade"></div>
                </div>
        </div>
        @endsection
