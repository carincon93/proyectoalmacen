@extends('layouts.app')

@section('title', 'Cambiar contraseña')

@section('big-content-desc')
	<h3>Cambiar mi contraseña</h3>
@endsection

@section('content')
	<div class="col-md-8">
		<div class="card-form">
			<form method="POST" action="{{url('admin/updatepassword')}}">
				{{csrf_field()}}
				<div class="form-group{{ $errors->has('mypassword') ? ' has-error' : '' }}">
					<label for="mypassword" class="control-label">Introduce tu actual contraseña:</label>
					<input type="password" name="mypassword" class="form-control">
					@if ($errors->has('mypassword'))
						<span class="help-block">
							{{ $errors->first('mypassword') }}
						</span>
					@endif
				</div>
				<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
					<label for="password" class="control-label">Introduce tu nueva contraseña:</label>
					<input type="password" name="password" class="form-control">
					@if ($errors->has('password'))
						<span class="help-block">
							{{ $errors->first('password') }}
						</span>
					@endif
				</div>
				<div class="form-group">
					<label for="mypassword" class="control-label">Confirma tu nueva contraseña:</label>
					<input type="password" name="password_confirmation" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary">Cambiar contraseña</button>
			</form>
		</div>
	</div>

@endsection
