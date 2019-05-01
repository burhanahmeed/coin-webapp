@extends('layouts.dashboard')

@section('content')
<div class="row justify-content-md-center">
	<div class="col-md-10 center-block">
		<div class="card card-user" style="text-align: center; padding: 20px">
		<table class="table">
			<thead class=" text-primary">
				<th>
					No. Referensi
				</th>
				<th>
					Jenis
				</th>
				<th class="text-right">
					Jumlah
				</th>
				<th class="text-right">
					Waktu
				</th>
			</thead>
			<tbody>
				@foreach($transaction as $t)
				<tr>
					<td>
						<a href="/wallet/transfer-success/{{$t->refNumber}}">{{$t->refNumber}}</a>						
					</td>
					<td>
					{{($t->type == 'd')? 'Debet' : 'Kredit'}}
					</td>
					<td class="text-right">
					IDR {{number_format($t->amount)}}
					</td>
					<td class="text-right">
					{{$t->created_at}}
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		</div>				
	</div>		
</div>
@endsection