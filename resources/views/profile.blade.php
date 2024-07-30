@extends('layouts.mainlayouts')

@section('title', 'Profile')

@section('content')
    <div class="page-inner">
        <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="row">
                    <form action="clientntuser-edit" method="POST" enctype="multipart/form-data" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <h5 class="card-header">Profile Details</h5>
                                <!-- Account -->
                                <div class="card-body">
                                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                                        @if (Auth::user()->foto != '')
                                            <img src="{{ asset('storage/foto/' . Auth::user()->foto) }}" alt=""
                                            style="width:100px; height:150px;">
                                        @else
                                            <img src="{{ asset('img/profil-kosong.jpg') }}" alt="" 
                                                style="width:100px; height:150px;">
                                        @endif
                                        <div class="button-wrapper">
                                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                                <span class="d-none d-sm-block text-white">Upload new photo</span>
                                                <i class="fas fa-file-upload d-block d-sm-none"
                                                    style="color: aliceblue"></i>
                                                <input type="file" id="upload" name="image"
                                                    class="account-file-input" hidden accept="image/png, image/jpeg" />
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-0" />
                                <div class="card-body">
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="firstName" class="form-label">username</label>
                                            <input class="form-control" type="text" id="firstName"
                                                value="{{ Auth::user()->username }}" autofocus />
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="lastName" class="form-label">no_ktp</label>
                                            <input class="form-control" type="text" id="lastName"
                                                value="{{ Auth::user()->no_ktp }}" />
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="phoneNumber">Phone Number</label>
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text">ID (+62)</span>
                                                <input type="text" id="phoneNumber" class="form-control"
                                                    placeholder="{{ Auth::user()->phone }}" />
                                            </div>
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="state" class="form-label">Status</label>
                                            <input class="form-control" type="text" id="state"
                                                placeholder="{{ Auth::user()->status }}" />
                                        </div>
                                        <div class="form-group">
                                            <label for="comment">Address</label>
                                            <textarea class="form-control" name="address" id="comment" rows="5"> {{ Auth::user()->address }}
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
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
