@extends('layouts.app')

@section('title','Usuarios - Ver')


@section('headlinks')
@endsection

@section('content')

<!-- Default box -->
<div class="card">
    <div class="card-header">
        <h3 class="card-title"> Usuario </h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                title="Collapse"><i class="fas fa-minus"></i></button>
        </div>
    </div>
    <div class="card-body">
        <div class="card">
            <div class="card-header">
                <div class="row">

                    <div class="col-md-10">
                        <h3 class="card-title">{{ $usuario->nombre_completo }}</h3>
                    </div>
                    @can('Editar Usuarios')
                    <div class="col-md-2">
                        <a class="btn btn-info btn-sm" href="{{route('dashboard.usuarios.edit',$usuario->id)}}">
                            <i class="fas fa-pencil-alt">
                            </i>
                            Editar
                        </a>
                    </div>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                    {{$usuario->descripcion}}
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <table class="table">
                    <tbody>
                        <tr>
                            <td>CUI</td>
                            <td> {{$usuario->cui}} </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td> {{$usuario->email}} </td>
                        </tr>
                        <tr>
                            <td>Creado</td>
                            <td> {{$usuario->created_at}} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection

@section('footscripts')
@endsection
