@extends('layouts.mainlayouts')

@section('title', 'Dashboard')

@section('content')
    <div class="page-inner">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
            <div>
                <h3 class="fw-bold mb-3">
                    {{$greeting}}, {{ Auth::user()->username }} 👋
                </h3>
                
            </div>
        </div>
        <div class="card alert alert-warning">
            <h5 class="card-header">List Sewa Mobil</h5>
            <div class="mb-3 col-13 mb-0">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover">
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
@endsection
