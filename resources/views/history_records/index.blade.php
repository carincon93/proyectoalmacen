@extends('layouts.app')
@section('content')
<div class="card">
    <div class="table-responsive">
        <table class="table table-full table-hover" data-form="deleteForm">
            <div class="modal fade" id="confirm-delete">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-capitalize" id="myModalLabel"></h4>
                        </div>
                        <div class="modal-body">
                            Está seguro que desea eliminar este historial?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-danger" id="delete-historical">Eliminar Historial</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div  class="table" data-form="sendForm">
                <div class="modal fade" id="confirm-novedad">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title text-capitalize" id="myModalLabel"></h4>
                            </div>
                            <div class="modal-body modal-prestar">
                                <form action="" method="POST" id="form-solicitud">
                                    {!! csrf_field() !!}
                                    <h1>alsjjd</h1>

                                </form>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" id="submit-solicitud">Prestar Ambiente</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="modal fade" id="confirm-novedad">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST"  id="novedadform">
                                {{ method_field('put') }}
                                {!! csrf_field()  !!}
                                <input type="text" name="novedad_nueva">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-danger" id="botonsend">modificar novedad</button>
                        </div>
                    </div>
                </div>
            </div> --}}
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Instructor</th>
                    <th>Ambiente</th>
                    <th>Fecha Prestado</th>
                    <th>Fecha Entregado</th>
                    <th>Novedad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @php
            $count = 1;
            @endphp
            @foreach($history_record as $his)
                <tr>
                	<td>{{$count++}}</td>
                	<td>{{$his->instructor->nombre.' '.$his->instructor->apellidos  }}</td>
                	<td>{{ $his->classroom->nombre_ambiente}}</td>
                	<td>{{ $his->prestado_en }}</td>
                    <td>{{ $his->entregado_en != '' ? $his->entregado_en : 'Sin entrega'}}</td>
                    <td>
                        
                            <button  type="button" class="btn botonmodal" data-id="{{ $his->id}}">
                                <i class="fa fa-fw fa-pencil"></i>
                            </button>
                    </td>
                        
                        
                    <td>
                        <form action="{{ url('/admin/history_record/'.$his->id) }}" method="POST" style="display: inline-block;" class="form-delete-historical btn btn-danger">
                            {{ method_field('delete') }}
                            {!! csrf_field()  !!}
                            <button type="button" class="btn-delete" data-nombre="{{ $his->instructor->nombre }}">
                                <i class="fa fa-fw fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
               @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
