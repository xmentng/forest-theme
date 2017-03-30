@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Cells CRUD</h2>
	        </div>
	        <div class="pull-right">
	        	@permission(('cell-create'))
	            <a class="btn btn-success" href="{{ route('cell.create') }}"> Create New cell</a>
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
			<th>Name</th>
			<th>Cell Leader</th>
			<th>Church</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($groups as $key => $cell)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $cell->name }}</td>
		<td>{{ $cell->user_id }}</td>
		<td>{{ $cell->church_id }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('cells.show',$cell->id) }}">Show</a>
			@permission(('cell-edit'))
			<a class="btn btn-primary" href="{{ route('cells.edit',$cell->id) }}">Edit</a>
			@endpermission
			@permission(('cell-delete'))
			{!! Form::open(['method' => 'DELETE','route' => ['cells.destroy', $cell->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</table>
	{!! $groups->render() !!}
@endsection