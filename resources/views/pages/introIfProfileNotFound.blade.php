@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
			<div class="col-md-6 mx-auto">
				<div id="first">
						<div class="myform form ">
								<div class="mb-3">
									<div class="col-md-12 text-center">
										<h4>Lengkapi informasi profile anda sebelum melanjutkan</h4>
									</div>
								</div>
								<form action="{{route('newProfile')}}" method="post">
									@csrf
										<div class="form-group">
											<label for="exampleInputEmail1">Nama Depan</label>
											<input value="{{ old('fname') }}" type="text" name="fname"  class="form-control {{ $errors->has('fname') ? ' is-invalid' : '' }}" id="email" aria-describedby="emailHelp" placeholder="Masukkan nama depan">
											@if ($errors->has('fname'))
                      <span class="invalid-feedback">
                        <strong>{{ $errors->first('fname') }}</strong>
                      </span>
                    	@endif
                    </div>
										<div class="form-group">
											<label for="exampleInputEmail1">Nama Belakang</label>
											<input value="{{ old('lname') }}" type="text" name="lname"  class="form-control {{ $errors->has('lname') ? ' is-invalid' : '' }}" id="email" aria-describedby="emailHelp" placeholder="Masukkan nama belakang">
											@if ($errors->has('lname'))
                      <span class="invalid-feedback">
                        <strong>{{ $errors->first('lname') }}</strong>
                      </span>
                    	@endif
                    </div>
                    <div class="form-group">
											<label for="exampleInputEmail1">Alamat</label>
											<input value="{{ old('address') }}" type="text" name="address"  class="form-control {{ $errors->has('address') ? ' is-invalid' : '' }}" id="email" aria-describedby="emailHelp" placeholder="Masukkan alamat">
											
											@if ($errors->has('address'))
                      <span class="invalid-feedback">
                        <strong>{{ $errors->first('address') }}</strong>
                      </span>
                    	@endif
                    </div>
										<div class="form-group">
											<label for="exampleInputEmail1">Nomor Telephone</label>
											<input value="{{ old('telp') }}" type="text" name="telp"  class="form-control {{ $errors->has('telp') ? ' is-invalid' : '' }}" id="email" aria-describedby="emailHelp" placeholder="Masukkan nomor telephone">
											@if ($errors->has('telp'))
                      <span class="invalid-feedback">
                        <strong>{{ $errors->first('telp') }}</strong>
                      </span>
                    	@endif
                    </div>
									<div class="col-md-12 text-center mb-3">
											<button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Simpan</button>
									</div>									
								</form>
								<form action="{{route('logout')}}" method="post">
								@csrf
									<div class="col-md-12 text-center mb-3">									
											<button type="submit" class=" btn btn-block mybtn btn-danger tx-tfm">Keluar</button>
									</div>
								</form>
								
						</div>
				</div>
			</div>
	</div>
</div>
@endsection
