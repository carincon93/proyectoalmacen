@extends('layouts.app')
@section('navbar-top')
<div class="search-navbar-wrapper">
    <i class="fa fa-fw fa-search"></i>
    <input type="text" id="myInputFicha" onkeyup="filterTableFicha()" placeholder="Buscar por ficha de grupo" class="form-control search-navbar">
</div>
@endsection
@section('big-content-desc')
@endsection
@section('content')

@include('layouts.messages')
<a href="{{ url('/admin/class_group/create') }}" class="action-round btn"><i class="fa fa-fw fa-plus"></i></a>
<div class="card">
    <div class="table-responsive">
        <table class="table table-full table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID de ficha</th>
                    <th>Nombre ficha</th>
                    <th>Tipo de formación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody  id="myTableFicha">
                @php
                $count = 1;
                @endphp
                @foreach($dataClassGroup as $dg)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $dg->id_ficha }}</td>
                    <td>{{ $dg->nombre_ficha }}</td>
                    <td>{{ $dg->tipo_formacion }}</td>
                    <td class="td-actions">
                        <a class="btn btn-round" href="{{ url('/admin/class_group/'.$dg->id) }}">
                            <i class="fa fa-fw fa-search"></i>
                        </a>
                        <a class="btn btn-round" href="{{ url('/admin/class_group/'.$dg->id.'/edit') }}">
                            <i class="fa fa-fw fa-pencil"></i>
                        </a>
                        @if($dg->disponibilidad == 'disponible')
                        <form action="{{ url('/admin/class_group/'.$dg->id) }}" style="display: inline-block;"data-nombre="{{ $dg->nombre_ficha }}"  method="POST" class="btn-delete-tbl btn btn-round">
                            {{ method_field('delete') }}
                            {!! csrf_field()  !!}
                            <i class="fa fa-fw fa-trash"></i>
                        </form>
                        @else
                        @foreach($dg->classrooms as $classroom)
                           <a href="{{ url('/#').$classroom->id }}" class="btn btn-round btn-not-delete" data-title="La ficha aun esta en uso, para poder eliminarlo primero debe hacer la entrega del ambiente. Haga clic en este elemento para direccionarte al préstamo de ambientes" data-toggle="tooltip" data-placement="bottom">
                               <i class="fa fa-fw fa-trash"></i>
                           </a>
                        @endforeach
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        function filterTableFicha() {
            var input, filter, table, tr, td, i;
            input = document.getElementById("myInputFicha");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTableFicha");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[2];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
@endpush
