@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Transactions CRUD</h2>
	        </div>
	        <div class="pull-right">
	        	@permission(('transaction-create'))
	            <a class="btn btn-success" href="{{ route('transaction.create') }}"> Create New Transaction</a>
	            @endpermission
	        </div>
	    </div>
	</div>
	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif
	<table class="table table-bordered">
		<tr>
			<th>No</th>
			<th>Type</th>
			<th>Amount</th>
			<th>Partner</th>
			<th>Cell</th>
			<th>Church</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($transactions as $key => $transaction)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $transaction->type }}</td>
		<td>{{ $transaction->amount }}</td>
		<td>{{ $transaction->user_id }}</td>
		<td>{{ $transaction->cell_id }}</td>
		<td>{{ $transaction->church_id }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('transaction.show',$transaction->id) }}">Show</a>
			@permission(('transaction-edit'))
			<a class="btn btn-primary" href="{{ route('transaction.edit',$transaction->id) }}">Edit</a>
			@endpermission
			@permission(('transaction-delete'))
			{!! Form::open(['method' => 'DELETE','route' => ['transaction.destroy', $transaction->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</table>
	{!! $transactions->render() !!}
@endsection