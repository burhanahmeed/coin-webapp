@extends('layouts.dashboard')

@section('content')
<div class="row justify-content-md-center">
	<div class="col-md-8 center-block">
			<div class="card card-user" style="padding: 20px">
				<h4 style="text-align: center">Transaksi Berhasil</h4>
				<table>
					<tr>
						<th width="150px">Nomor Referensi</th>
						<td>{{$dari->refNumber}}</td>
					</tr>
					<tr>
						<th width="150px">Nomor Asal</th>
						<td>{{$dari->wallet_id}}</td>
					</tr>
					<tr>
						<th width="150px">Nomor Tujuan</th>
						<td>{{$ke->wallet_id}}</td>
					</tr>
					<tr>
						<th>Email</th>
						<td>{{$ke->getWallet->getUser->email}}</td>
					</tr>
					<tr>
						<th>Atas Nama</th>
						<td>{{$ke->getWallet->getProfile->fname}} {{$ke->getWallet->getProfile->lname}}</td>
					</tr>
					<tr>
						<th>Jumlah</th>
						<td>IDR {{number_format($ke->amount)}}</td>
					</tr>
				</table>
				<div style="text-align: center; padding: 10px">
					<p>Periksa kembali sebelum anda melakukan transfer ke nomor rekening lainnya.</p>
				</div>
				<div class="update ml-auto mr-auto">										
					<a href="/wallet" class="btn btn-danger btn-round">Kembali</a>
				</div>
			</div>				
	</div>
</div>
@endsection