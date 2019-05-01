@extends('layouts.dashboard')

@section('content')
<div class="row justify-content-md-center">
	<div class="col-md-8 center-block">
			<div class="card card-user" style="padding: 20px">
				<h4 style="text-align: center">Informasi Transaksi</h4>
				<table>
					<tr>
						<th width="150px">Nomor Tujuan</th>
						<td>{{$input['wnum']}}</td>
					</tr>
					<tr>
						<th>Email</th>
						<td>{{$input['email']}}</td>
					</tr>
					<tr>
						<th>Jumlah</th>
						<td>IDR {{number_format($input['amount'])}}</td>
					</tr>
				</table>
				<div style="text-align: center; padding: 10px">
					<p>Periksa kembali sebelum anda melakukan transfer ke nomor rekening lainnya.</p>
				</div>
				<div class="update ml-auto mr-auto">					
					<form action="/wallet/transfer-process" method="post">
					@csrf
					<input type="hidden" name="wnum" value="{{$input['wnum']}}">
					<input type="hidden" name="email" value="{{$input['email']}}">
					<input type="hidden" name="amount" value="{{$input['amount']}}">
						<a href="/wallet" class="btn btn-danger btn-round">Kembali</a>
						<button type="submit" class="btn btn-primary btn-round">Transfer</button>
					</form>					
				</div>
			</div>				
	</div>
</div>
@endsection