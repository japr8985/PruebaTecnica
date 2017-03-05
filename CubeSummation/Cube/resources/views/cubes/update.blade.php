@extends('template.main')

@section('title',"Operations")

@section('contenido')

<div class="row">
		<h1>
			Name: {{ $cube->name }}
		</h1>
		<h3>
			Dimension: {{ $cube->dimension }}
		</h3>
	</div>
	<hr>
	<div class="row">
		<div class="col-xs-6">
			<fieldset>
				<legend>
					Update
				</legend>
				{!! Form::open(['route' => ['cubes.processUpdate',$cube->id], 'method' => 'PUT'])!!}
				{{
					Form::Label('x','X')
					}}
				{!!
					Form::number('x',null,['class' =>'form-control','min' => '1', 'max' => $cube->dimension ])
					!!}
				{{
					Form::Label('y','Y')
					}}
				{!!
					Form::number('y',null,['class' =>'form-control','min' => '1', 'max' => $cube->dimension ])
					!!}
				{{
					Form::Label('z','Z')
					}}
				{!!
					Form::number('z',null,['class' =>'form-control','min' => '1', 'max' => $cube->dimension ])
					!!}
				{{
					Form::Label('value','Value')
					}}
				{!!
					Form::number('value',null,['class' => 'form-control','min' => '1'])
					!!}
				<hr>
				{!!
					Form::submit('Update',['class' => 'btn btn-primary'])
					!!}
				{!! Form::close()!!}
			</fieldset>
		</div>
	</div>

@endsection