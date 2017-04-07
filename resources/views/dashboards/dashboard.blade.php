@extends('templates.admin.layout')

@section('content')

@if(Auth::user->hasRole('admin'))
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    <br><br>
                    @role(('admin'))
                    <li><a href="/admin/user/index">Manage Members</a></li>
                    @endrole
                    @role(('admin,owner'))
                    <li><a href="/admin/church/index">Manage Churches</a></li>
                    @endrole
                     @role(('admin','leader'))
                    <li><a href="/admin/group/index">Manage Cells</a></li>
                    @endrole
                    @role(('admin'))
                    <li><a href="/admin/testimony">Manage Testimonies</a></li>
                    <li><a href="/admin/transaction">Manage Transactions</a></li>
                    @endrole
                </div>
            </div>
        </div>
    </div>
</div>
@endif 
@endsection