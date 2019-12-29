@extends('layouts.app')

@section('title', 'Creación de Producto')

@section('title2', 'Nueva Producto')

@section('content')

	<div class="row" >
	<div class="col-sm">
		<div class="card" style="margin-top: 10px;">
			@if($errors->any())
				@foreach($errors->all() as $error)
					{{ $error }}
				@endforeach
			@endif
				
			<div class="card-body">
				
				<form method="POST" action="/producto" accept-charset="UTF-8" style="display:inline">
					@csrf			
					<div class="form-group">
						<label for="producto">Id de Producto</label>
						<input type="text" class="form-control" name="id_Producto" id="id_Producto" value= "{{old('id_Producto')}}">
						{!! $errors->first('id_Producto', '<div class="alert alert-danger" role="alert">:message</div>')!!}
					</div>
					<div class="form-group">
						<label for="producto">Nomb. Producto</label>
						<input type="text" class="form-control" name="nomb_Producto" id="nomb_Producto" value= "{{old('nomb_Producto')}}">
						{!! $errors->first('nomb_Producto', '<div class="alert alert-danger" role="alert">:message</div>')!!}
					</div>
					<div class="form-group">
						<label for="producto">Desc.. Producto</label>
						<input type="text" class="form-control" name="desc_Producto" id="desc_Producto" value= "{{old('desc_Producto')}}">
						{!! $errors->first('desc_Producto', '<div class="alert alert-danger" role="alert">:message</div>')!!}
					</div>
					<div class="form-group">
						<label for="stocks">Id Inventario</label>
						<select name='id_Invent' class = 'form-control'>
							<option value="">Seleccione uno ... </option>
							@foreach($stocks as $stock)
								<option value = '{{ $stock->id_Invent }}' 
									{{(old('id_Invent') == $stock->id_Invent) ? 'selected':''}}>{{ $stock->id_Invent }}
								</option>								
							@endforeach
						</select>
						{!! $errors->first('id_Invent', '<div class="alert alert-danger" role="alert">:message</div>')!!}
					</div>
					<button type="submit" class="btn btn-primary btn-xs fa fa-save" style="margin-left: 10px"> Grabar </button>				
				</form>
				<a href="/comuna" class="btn btn-danger btn-xs fa fa-arrow-alt-circle-right" style="margin-left: 10px"> Cancelar </a>				
			</div>
		</div>
		</div>
	</div>
@endsection


