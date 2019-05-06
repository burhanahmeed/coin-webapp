@extends('layouts.dashboard')

@section('content')
<div class="row">	
	<div class="col-md-12">
		<h3>Bayar Kebutuhan Sehari-hari</h3>
	</div>
</div>
<div class="row">
    <div class="col-md-4">
			<a href="/lain-lain/my-bill">
				<div class="card">
					<div style="padding: 20px">
						<img style="height: 130px; display: block; margin: 0 auto;" src="{{asset('img/mybill.png')}}" alt="...">
					</div>
					<div style="text-align: center">
						<h6>MY BILLS</h6>
					</div>				
				</div>
			</a>
		</div>
		<!-- baris 2 -->
		<div class="col-md-4">
			<a href="/lain-lain/my-charity">
				<div class="card">
					<div style="padding: 20px">
						<img style="height: 130px; display: block; margin: 0 auto;" src="{{asset('img/mycharity.png')}}" alt="...">
					</div>
					<div style="text-align: center">
						<h6>MY CHARITY</h6>
					</div>				
				</div>
			</a>
		</div>
		<!-- baris 3 -->
		<div class="col-md-4">
			<a href="/lain-lain/my-ticket">
				<div class="card">
					<div style="padding: 20px">
						<img style="height: 130px; display: block; margin: 0 auto;" src="{{asset('img/myticket.png')}}" alt="...">
					</div>
					<div style="text-align: center">
						<h6>MY TICKET</h6>
					</div>				
				</div>
			</a>
		</div>
</div>
@endsection