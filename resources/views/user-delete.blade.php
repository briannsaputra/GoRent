@extends('layouts.mainlayouts')

@section('title', 'Ban User')

@section('content')
<div class="page-inner">
    <div class="alert alert-warning">
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3 ">
        <h3 class="mb-0">Apakah Anda Yakin Ingin Ban User : {{$user->username}} ?</h3>
        <div class="col-lg-3 col-sm-6 col-12 mt-4">
            <a href="/user-destroy/{{$user->slug}}" class="btn btn-primary account-image-reset  mx-3">Ban User</a>
            <a href="/users" class="btn btn-danger account-image-reset ">Cancel</a>
        </div>
        </div>
    </div>
</div>

@endsection