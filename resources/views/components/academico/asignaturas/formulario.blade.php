@extends('components.layouts.app')
@section('titulo')
HB GROUP - Gestion de Cursos
@endsection
@section('content')
<div class="main-container container-fluid">

    <!-- PAGE-HEADER -->
    <div class="page-header">
        <h1 class="page-title">Gestion de Asignaturas</h1>
        <div>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Configuraciones</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Gestion de Asignaturas</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$tipo}}</li>
            </ol>
        </div>
    </div>
    <!-- PAGE-HEADER END -->

    <!-- ROW-1 -->
    {{-- @if (in_array(12,$array_accesos)) --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                {{-- <div class="card-status bg-blue br-te-7 br-ts-7"></div> --}}
                <div class="card-header">
                    <h3 class="card-title">{{$tipo}}</h3>
                    <div class="card-options">
                        {{-- @if (in_array(13,$array_accesos)) --}}
                        {{-- <a href="javascript:void(0)" class="btn btn-success btn-sm" id="nuevo" ><i class="fe fe-plus"></i> Nueva Asignatura</a> --}}
                        {{-- @endif --}}
                    </div>
                </div>
                <form id="guardar" action="" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$id}}">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="codigo">Codigo</label>
                                    <input id="codigo" class="form-control form-control-sm" type="text" name="codigo" value="{{($data?$data->codigo:'')}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input id="nombre" class="form-control form-control-sm" type="text" name="nombre" value="{{($data?$data->nombre:'')}}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-success btn-sm"><i class="fe fe-save"></i> Guardar</button>
                        <a href="{{ route('hb.academicos.asignaturas.lista') }}" class="btn btn-danger btn-sm"><i class="fa fa-arrow-circle-left"></i> volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @else
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info" role="alert">
                    <span class="alert-inner--icon"><i class="fe fe-bell"></i></span>
                    <span class="alert-inner--text"><strong>Información!</strong> Solicite los accesos al administrador</span>
                </div>
            </div>
        </div>
    @endif --}}
    <!-- ROW-1 END -->

</div>
@endsection

@section('script')

    <!-- INTERNAL SELECT2 JS -->
    <script src="{{asset('template/plugins/select2/select2.full.min.js')}}"></script>
    {{-- <script src="{{asset('template/js/select2.js')}}"></script> --}}

    <!-- DATA TABLE JS-->
    <script src="{{asset('template/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('template/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
    <script src="{{asset('template/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('template/plugins/datatable/js/buttons.bootstrap5.min.js')}}"></script>

    <script src="{{asset('template/plugins/datatable/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('template/plugins/datatable/responsive.bootstrap5.min.js')}}"></script>
    <script src="{{asset('template/js/table-data.js')}}"></script>

    <script src="{{asset('components/academico/asignaturas/asignatura-model.js')}}"></script>
    <script src="{{asset('components/academico/asignaturas/asignatura-view.js')}}"></script>
    <script>
        // Select2

        $(document).ready(function () {
            const view = new AsignaturaView(new AsignaturaModel(csrf_token));
            // view.listar();
            view.eventos();
        });



    </script>
@endsection
