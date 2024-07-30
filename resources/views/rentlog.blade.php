@extends('layouts.mainlayouts')

@section('title', 'Rent-Log')


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
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Sewa Mobil</h4>
                    </div>
                    <div class="card-body">
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
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $item->user->username }}</td>
                                            <td align="left">{{ $item->car->model }}</td>
                                            <td>{{ $item->rent_date }}</td>
                                            <td>{{ $item->return_date }}</td>
                                            <td>
                                                <span class="{{ $item->actual_return_date == null ? '' : ($item->return_date < $item->actual_return_date ? 'btn btn-danger' : 'btn btn-success') }}">
                                                    {{ $item->actual_return_date }}
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
