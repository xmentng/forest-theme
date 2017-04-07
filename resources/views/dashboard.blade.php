@extends('templates.admins.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                    <br><br>
                    @if(Auth::check()) 
                        @if (Auth::user()->isAdmin())
                            <li><a href="/users/index">Manage Members</a></li>
                            <li><a href="/churches/index">Manage Churches</a></li>
                            <li><a href="/admin/media">Manage Galleries</a></li>
                            <li><a href="/admin/testimony">Manage Testimonies</a></li>
                            <li><a href="/admin/transaction">Manage Partnerships</a></li>
                        @endif 
                    @endif
                    @if(Auth::check()) 
                        @if (Auth::user()->isOwner())
                            <li><a href="/church/index">Manage Churches</a></li>
                            <li><a href="/admin/group/">Manage Cells</a></li>
                        @endif 
                    @endif
                    @if(Auth::check()) 
                        @if (Auth::user()->isPastor())
                            <li><a href="/group/index">Manage Cells</a></li>
                             <li><a href="/admin/media">Manage Galleries</a></li>
                            <li><a href="/admin/testimony">Manage Testimonies</a></li>
                        @endif 
                    @endif
                    @if(Auth::check()) 
                        @if (Auth::user()->isLeader())
                            <li><a href="/group/index">Manage Cells</a></li>
                             <li><a href="/admin/media">Manage Galleries</a></li>
                            <li><a href="/admin/testimony">Manage Partnerships</a></li>
                        @endif 
                    @endif
                    @if(Auth::check()) 
                        @if (Auth::user()->isWorker())
                            <li><a href="/testimony/index">Manage Testimony</a></li>
                             <li><a href="/media/">Manage Galleries</a></li>
                            <li><a href="/transaction/">Manage Partnerships</a></li>
                        @endif 
                    @endif
                    @if(Auth::check()) 
                        @if (Auth::user()->isMember())
                            <li><a href="/testimony/index">Manage Testimony</a></li>
                             <li><a href="/media/">Manage Galleries</a></li>
                            <li><a href="/transaction/">Manage Partnerships</a></li>
                        @endif 
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection