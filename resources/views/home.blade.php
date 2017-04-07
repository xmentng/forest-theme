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
                    @if (Auth::user()->admin && Auth::user()->owner)
                    <li><a href="/admin/user">Manage Users</a></li>
                    <li><a href="/admin/church">Manage Churches</a></li>
                    @elseif (Auth::user()->admin && Auth::user()->leader && Auth::user()->pastor)
                    <li><a href="/admin/cell">Manage Cells</a></li>
                    @elseif (Auth::user()->admin && Auth::user()->member && Auth::user()->pastor && Auth::user()->worker)
                    <li><a href="/admin/testimony">Manage Testimonies</a></li>
                    @elseif (Auth::user()->admin && Auth::user()->member && Auth::user()->leader && Auth::user()->worker)
                    <li><a href="/admin/transaction">Manage Transactions</a></li>
                    @else
                    <li><a href="/admin/media">Manage Gallery</a></li>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
