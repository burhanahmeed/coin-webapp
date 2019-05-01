@extends('layouts.dashboard')

@section('content')
<div class="row justify-content-md-center">
    <div class="col-md-8 center-block">
        <div class="card card-user" style="text-align: center; padding: 20px">
					<h4>Transfer Gagal</h4>
					<p>Nomor Wallet <strong style="font-size: 17px">{{$input}}</strong> tidak dapat ditemukan didalam database. Periksa kembali informasi wallet tujuan (seperti nomor dan email) dan pastikan sado anda mencukupi sebelum anda mengirimkan dari wallet anda.</p>
					<div class="update ml-auto mr-auto">
						<a href="/wallet" class="btn btn-primary btn-round">Kembali</a>
					</div>
        </div>				
    </div>		
</div>
@endsection