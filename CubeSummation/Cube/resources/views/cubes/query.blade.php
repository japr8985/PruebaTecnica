@extends('template.main')

@section('title',"Query")

@section('contenido')
@if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{ $error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
	<h3>
		{{
			$cube->name
			}}
	</h3>
	<h5>
			Dimension: {{ $cube->dimension }}
	</h5>
		<div class="row">
		<fieldset>
			<legend>
				Query
			</legend>
			{!! Form::open(['route' => ['cubes.processQuery',$cube->id],'method' => 'POST']) !!}
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