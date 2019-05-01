@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-md-4">
    <div class="card card-user">
        <div class="image">
        <img src="../assets/img/damir-bosnjak.jpg" alt="...">
        </div>
        <div class="">
					<div class="author">
							<a href="#">
							<img class="avatar border-gray" src="../assets/img/mike.jpg" alt="...">
							<h5 class="title">{{$profile->fname}} {{$profile->lname}}</h5>
							</a>
							<p class="description">
								{{$profile->getUser->email}}
							</p>
					</div>
        <!-- <p class="description text-center">           
        </p> -->
        </div>        
    </div>
    </div>
    <div class="col-md-8">
    <div class="card card-user">
        <div class="card-header">
        <h5 class="card-title">Profile</h5>
        </div>
        <div class="card-body">
        <form>
            <div class="row">
            <div class="col-md-6 pr-1">
                <div class="form-group">
                <label>Email (disabled)</label>
                <input type="text" class="form-control" disabled="" placeholder="Company" value="{{$profile->getUser->email}}">
                </div>
						</div>
						<div class="col-md-6 pr-1">
                <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="text" class="form-control" placeholder="Company" value="{{$profile->telp_number}}">
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-6 pr-1">
                <div class="form-group">
                <label>Nama Depan</label>
                <input type="text" class="form-control" placeholder="Company" value="{{$profile->fname}}">
                </div>
            </div>
            <div class="col-md-6 pl-1">
                <div class="form-group">
                <label>Nama Belakang</label>
                <input type="text" class="form-control" placeholder="Last Name" value="{{$profile->lname}}">
                </div>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" placeholder="Home Address" value="{{$profile->address}}">
                </div>
            </div>
            </div>
            <div class="row">
            <!-- <div class="update ml-auto mr-auto">
                <button type="submit" class="btn btn-primary btn-round">Update Profile</button>
            </div> -->
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
@endsection