@extends('layouts.app')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Editar Usuario</h1>
        <a href="{{route('users.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left fa-sm text-white-50"></i> Atras</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Editar</h6>
        </div>
        <div class="card-body">
        <form method="POST" action="{{route('users.update')}}">
                @csrf
                <div class="form-group row">
                    <input type="hidden" id="id_user" name="id_user" value="{{$user->id}}">
                    {{-- Name --}}
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        Name</label>
                        <input type="text" disabled class="form-control form-control-user" id="exampleName"
                            placeholder="Name" required name="name" value="{{$user->name}}">

                    </div>
                    {{-- Email --}}
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        Email</label>
                        <input type="email" disabled class="form-control form-control-user" id="exampleEmail"
                            placeholder="Email" required name="email" value="{{$user->email}}">
                    </div>
                    {{-- Permission --}}
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        Admin?</label>
                        <input type="checkbox" class="form-control form-control-user" id="exampleAdmin"
                            placeholder="Admin" name="admin" value="yes" <?php echo ($rol==="Admin" ? 'checked' : '');?>>

                    </div>


                    </div>

                </div>
                <button type="submit" class="btn btn-success btn-user btn-block">
                    Save
                </button>

            </form>
        </div>
    </div>

</div>


@endsection