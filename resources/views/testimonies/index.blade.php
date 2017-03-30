@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Testimonies CRUD</h2>
	        </div>
	        <div class="pull-right">
	        	@permission(('testimony-create'))
	            <a class="btn btn-success" href="{{ route('testimony.create') }}"> Create New Testimony</a>
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
			<th>Title</th>
			<th>Description</th>
			<th>Testifier</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($testimonies as $key => $testimony)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $testimony->title }}</td>
		<td>{{ $testimony->body }}</td>
		<td>{{ $testimony->user_id }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('testimonies.show',$testimony->id) }}">Show</a>
			@permission(('testimony-edit'))
			<a class="btn btn-primary" href="{{ route('testimonies.edit',$testimony->id) }}">Edit</a>
			@endpermission
			@permission(('testimony-delete'))
			{!! Form::open(['method' => 'DELETE','route' => ['testimonies.destroy', $testimony->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
	</table>
	{!! $testimonies->render() !!}
@endsection