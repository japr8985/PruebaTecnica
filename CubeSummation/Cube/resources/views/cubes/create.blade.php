@extends('template.main')

@section('title',"Create Cube")

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
	{!! Form::open(['route' => 'cubes.store', 'method' => 'POST']) !!}
    	<div class="form-group">
    		{{ Form::Label('name','Name')}}
    		{!! Form::text('name',null,['class' => 'form-control'])!!}
    	</div>
    	<div class="form-group">
    		{{ Form::Label('dimension','Dimension')}}
    		{!! Form::number('dimension',2,['class'=>'form-control'])!!}
    	</div>
    	<div class="form-group">
    		{!!Form::submit('Create Cube',['class'=>'btn btn-primary'])!!}
    	</div>
	{!! Form::close() !!}
@endsection