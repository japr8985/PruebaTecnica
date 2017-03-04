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
	<div class="row">
		<div class="col-xs-6">
			<fieldset>
				<legend>
					Update
				</legend>
				{!! Form::open(['route' =>[ 'cubes.update',$cube->id], 'method' => 'PUT'])!!}
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
	<hr>
	<div class="row">
		<fieldset>
			<legend>
				Query
			</legend>
			{!! Form::open(['route' => ['cubes.query',$cube->id],'method' => 'POST']) !!}
		<div class="col-xs-6">
			{{
				Form::Label('x1','X1')
				}}
			{!!
				Form::number('x1',null,['class' => 'form-control', 'max' => $cube->dimension ])
				!!}
			{{
				Form::Label('y1','Y1')
					}}
			{!!
				Form::number('y1',null,['class' => 'form-control', 'max' => $cube->dimension ])
				!!}
			{{
				Form::Label('z1','Z1')
					}}
			{!!
				Form::number('z1',null,['class' => 'form-control', 'max' => $cube->dimension ])
				!!}
		</div>

		<div class="col-xs-6">
			{{
				Form::Label('x2','X2')
					}}
			{!!
				Form::number('x2',null,['class' => 'form-control', 'max' => $cube->dimension ])
				!!}
			{{
				Form::Label('y2','Y2')
					}}
			{!!
				Form::number('y2',null,['class' => 'form-control', 'max' => $cube->dimension ])
				!!}
			{{
				Form::Label('z2','Z1')
					}}
			{!!
				Form::number('z2',null,['class' => 'form-control', 'max' => $cube->dimension ])
			!!}
		<hr>
		{!!
			Form::submit('Query',['class' => 'btn btn-primary'])
			!!}
		</div>
		
		{!! Form::close() !!}
		</fieldset>
	</div>

@endsection