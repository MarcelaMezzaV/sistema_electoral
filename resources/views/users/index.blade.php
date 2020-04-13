@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <h4 class="card-header">Lista de Usuarios</h4>

                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Opciones</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <button class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></button>
                                <a class="btn btn-success btn-sm" href="{{url('/users/'.$user->id.'/edit')}}"><i class="fas fa-user-edit"></i></a>
                                <button class="btn btn-danger btn-sm"><i class="fas fa-user-minus"></i></button>
                            </td>
                        </tr>
                        @endforeach
                                                   
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
