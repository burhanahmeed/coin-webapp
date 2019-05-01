@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-md-4">
    <div class="card card-user" style="text-align: center">
        <div class="image" style="height: 180px; padding-top: 20px; background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwd5zTuxCcjzdn3uStHCQr79uM3MX4NieQ9dGCzjPelq8jrPfLUQ'); background-size: cover;">
					<span>Nomor Wallet</span>
					<h5 class="title">{{$wallet->wallet_number}}</h5>                    
					<span>Atas Nama</span>
					<p class="description">
							{{$wallet->getProfile->fname}} {{$wallet->getProfile->lname}}
					</p>
        </div>
        <div class="">
            <div class="author">                                        
             
            </div>
        <!-- <p class="description text-center">           
        </p> -->
        </div>
        <div class="card-footer">
        <hr>
        <div class="button-container">
            <div class="row">
            <div class="col-lg-12 col-md-12 col-12 ml-auto">
                <h5>IDR {{number_format($wallet->amount)}}
                <br>
                <small>Saldo</small>
                </h5>
            </div>
						</div>						
        </div>
        </div>
    </div>
    </div>
    <div class="col-md-8">
    <div class="card card-user">
        <div class="card-header">
        <h5 class="card-title">Transfer Ke Rekening Lain</h5>
        </div>
        <div class="card-body">
        <form action="/wallet/transfer-process" method="get">
				@csrf
            <div class="row">
            <div class="col-md-6 pr-1">
                <div class="form-group">
                    <label>Nomor Wallet</label>
                    <input name="wnum" type="text" class="form-control {{ $errors->has('wnum') ? ' is-invalid' : '' }}" placeholder="Masukkan nomor wallet tujuan" value="{{ old('wnum') }}">
										@if ($errors->has('wnum'))
										<span class="invalid-feedback">
											<strong>{{ $errors->first('wnum') }}</strong>
										</span>
										@endif
                </div>                
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Email Tujuan</label>
                        <input name="email" type="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Masukkan email tujuan" value="{{ old('email') }}">
												@if ($errors->has('email'))
												<span class="invalid-feedback">
													<strong>{{ $errors->first('email') }}</strong>
												</span>
												@endif
                    </div>                
								</div>
            </div>
            <div class="row">
							<div class="col-md-12">
									<div class="form-group">
											<label>Jumlah Transfer</label>
											<input name="amount" type="number" class="form-control {{ $errors->has('amount') ? ' is-invalid' : '' }}" placeholder="Jumlah yang dipindah tangankan" value="{{ old('amount') }}">
											@if ($errors->has('amount'))
											<span class="invalid-feedback">
												<strong>{{ $errors->first('amount') }}</strong>
											</span>
											@endif
									</div>                
							</div>
            </div>
            <div class="row">
            <div class="update ml-auto mr-auto">
                <button type="submit" class="btn btn-primary btn-round">Lanjutkan</button>
            </div>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
@endsection