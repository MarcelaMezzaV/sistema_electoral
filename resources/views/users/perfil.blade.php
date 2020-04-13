@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-primary card-outline text-center">
                <div class="card-header">
                    @if($user->avatar!="")
                    <img src="{{url('/imgs/'.$user->avatar)}}" width="150px" height="150px" class="rounded-circle mx-auto d-block mb-4" style="background:#efefefef">
                    @else
                    <img src="{{url('/user_default.png')}}" width="150px" height="150px" class="rounded-circle mx-auto d-block mb-4" style="background:#efefefef">
                    @endif
                    <p><h3>{{$user->name}}</h3></p>
                    <p>{{$user->email}}</p>
                </div>

                <div class="card-body">
                    
                    <a href="{{ url('users/'.Auth::user()->id.'/edit') }}" class="btn btn-link">Editar perfil</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
