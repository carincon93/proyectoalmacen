@extends('layouts.app')

@section('title', 'Ver ficha')

@section('navbar-top')
<ul class="breadcrumb">
	<li><a href="{{ url('/admin/file') }}" class="btn-link">Lista de fichas</a></li>
	<li>Adicionar ficha</li>
</ul>
@endsection

@section('content')
	<h1 class="text-uppercase">{{ $file->id_ficha }}</h1>
	<hr>
	@if (session('status'))
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
		{!!  html_entity_decode(session('status')) !!}
	</div>
	@endif
	<div class="table-responsive">
		<table class="table table-stripped table-bordered table-hover">
			<tr>
				<th>id</th>
				<td>{{ $file->id }}</td>
			</tr>
			<tr>
				<th>ID ficha</th>
				<td>{{ $file->id_ficha }}</td>
			</tr>
			<tr>
				<th>Nombre de la ficha</th>
				<td>{{ $file->nombre_ficha }}</td>
			</tr>
			<tr>
				<th>Tipo de formacion</th>
				<td>{{ $file->tipo_formacion }}</td>
			</tr>
		</table>
	</div>
@endsection
