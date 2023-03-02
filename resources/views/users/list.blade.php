@extends('layouts.app')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Usuarios</h1>
        <a href="{{route('users.create')}}" class="btn btn-sm btn-primary" >
            <i class="fas fa-plus"></i> Nuevo
        </a>
    </div>

    @if (session('success'))
        <span class="text-success">{{ session('success') }}</span>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Todos los usuarios</h6>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Persmisos</th>
                            <th>Cambiar Rol?</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($users as $user)
                           <tr>
                               <td>{{$user->name}}</td>
                               <td>{{$user->email}}</td>
                               <td>
                                <?php 
                                    foreach ($user->getRoleNames() as $role)
                                    ?>
                                    @switch($role)
                                        @case('Editor')
                                            <span class="label label-primary">Editor</span>
                                            @break
                                        @case('Admin')
                                            <span class="label label-danger">Admin</span>
                                            @break
                                        @default
                                            <span class="label label-info">¡No tiene Rol asigando!</span>
                                    @endswitch
                                </td>
                                <td>
                                    <ul>
                                        <?php 
                                        foreach ($user->getPermissionNames() as $permission)
                                                echo '<li>',$permission,'</li>';
                                        ?>
                                    </ul>
                                </td>
                                <td class="col-xs-1"><a class="btn btn-primary btn-block" 
                                href="/users/{{ $user->id }}/show">Editar</a></td>
                               </td>
                           </tr>
                       @endforeach
                    </tbody>
                </table>
            </div>
        </form>
        </div>
    </div>

</div>


@endsection