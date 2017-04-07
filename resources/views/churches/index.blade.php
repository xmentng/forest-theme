@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Churches CRUD</h2>
	        </div>
	        <div class="pull-right">
	        	@permission(('church-create'))
	            <a class="btn btn-success" href="{{ route('admin.church.create') }}"> Create New Church</a>
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
			<th>Email</th>
			<th>Zone</th>
			<th>Country</th>
			<th>Pastor</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($churches as $key => $church)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $church->name }}</td>
		<td>{{ $church->email }}</td>
		<td>{{ $church->zone }}</td>
		<td>{{ $church->country }}</td>
		<td>{{ $church->user_id }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('church.show',$church->id) }}">Show</a>
			@permission(('church-edit'))
			<a class="btn btn-primary" href="{{ route('admin.church.edit',$church->id) }}">Edit</a>
			@endpermission
			@permission(('church-delete'))
			{!! Form::open(['method' => 'DELETE','route' => ['admin.church.destroy', $church->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</table>
	{!! $churches->render() !!}
@endsection