@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    <br><br>
                    @role(('owner'))
                    <li><a href="/admin/user">Manage Users</a></li>
                    @endrole
                    <li><a href="/admin/church">Manage Churches</a></li>
                    <li><a href="/admin/media">Manage Medias</a></li>
                    <li><a href="/admin/testimony">Manage Testimonies</a></li>
                    <li><a href="/admin/transaction">Manage Transactions</a></li>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
