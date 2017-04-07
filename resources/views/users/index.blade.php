
@extends('layouts.app')
 
@section('content')
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Members Management</h2>
	        </div>
	        <div class="pull-right">
	        	@permission(('user-create'))
	            <a class="btn btn-success" href="{{ route('admin.user.create') }}"> Create New Member</a>
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
			<th>Roles</th>
			<th width="280px">Action</th>
		</tr>
	@foreach ($data as $key => $user)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $user->name }}</td>
		<td>{{ $user->email }}</td>
		<td>
			@if(!empty($user->roles))
				@foreach($user->roles as $v)
					<label class="label label-success">{{ $v->display_name }}</label>
				@endforeach
			@endif
		</td>
		<td>
			<a class="btn btn-info" href="{{ route('user.show',$user->id) }}">Show</a>
			<a class="btn btn-primary" href="{{ route('admin.user.edit',$user->id) }}">Edit</a>
			{!! Form::open(['method' => 'DELETE','route' => ['admin.user.destroy', $user->id],'style'=>'display:inline']) !!}
			<button class='btn btn-xs btn-danger' type='submit' data-toggle="modal" data-target="#confirmDelete" data-title="Delete User" data-message='Are you sure you want to delete this user ?'>
			<i class='glyphicon glyphicon-trash'></i>Delete
	    	</button>
	    	{{ Form::close() }}
			<?php require_once(app_path().'/libraries/delete_confirm.php');?>
		</td>
	</tr>
	@endforeach
	</table>
	{!! $data->render() !!}
@endsection