@extends('template.main')

@section('title',"Cubes' list")

@section('contenido')
	<div class="col-xs-6">
		<a href="{{ route('cubes.create') }}" class="btn btn-primary">
			Create Cube
		</a>
	</div>
	<table class="table table-stripped">
		<thead>
			<td>Name</td>
			<td>Dimension</td>
		</thead>
		<tbody>
			@foreach($cubes as $cube)
				<tr>
					<td>
						{{
							$cube->name
							}}
					</td>
					<td>
						{{
							$cube->dimension
							}}
					</td>
					<td>
						<a href="{{ route('cubes.actions',$cube->id)}}"> Query/Update</a>
					</td>
					<td>
						<a href="#">Delete</a>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endsection