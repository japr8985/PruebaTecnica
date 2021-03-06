<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title','Home')</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	
	<script
  src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
  integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc="
  crossorigin="anonymous"></script>
	<script 
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
	integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
	crossorigin="anonymous"></script>
</head>
<body>

<div class="container-fluid">
	@if (session()->has('flash_notification.message'))
    	<div class="alert alert-{{ session('flash_notification.level') }}">
       		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       		{!! session('flash_notification.message') !!}
    	</div>
	@endif
</div>
	<div class="container">
		<h1>
			<a href="{{route('cubes.list')}}">Cube Summation</a>
		</h1>
		@yield('contenido')
	</div>
</body>
</html>