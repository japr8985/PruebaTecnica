<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cube Summation</title>
	<script src="assets/js/jquery.js"></script>
	<script src="process/functions.js"></script>
</head>
<body>
	<label for="dim">
		Dimension del cubo
	</label>
	<input type="number" id="dim" min="2" max="1000">
	<button onclick="createCube()">Crear</button>
	<hr>
	<fieldset>
		<legend>
			Update
		</legend>
		<label for="x1">
			X1
		</label>
		<input type="number" id="x1">
		<label for="y1">
			Y1
		</label>
		<input type="number" id="y1">
		<label for="z1">
			Z1
		</label>
		<input type="number" id="z1">
		|
		<button>Update</button>
	</fieldset>
	<hr>
	<fieldset>
		<legend>
			Query
		</legend>
		<label for="queryX1">
			X1
		</label>
		<input type="number" id="queryX1">
		<label for="queryY1">
			Y1
		</label>
		<input type="number" id="queryY1">
		<label for="queryZ1">
			Z1
		</label>
		<input type="number" id="queryZ1">
		<label for="queryX2">
			X2
		</label>
		<input type="number" id="queryX2">
		<label for="queryY2">
			Y2
		</label>
		<input type="number" id="queryY2">
		<label for="queryZ2">
			Z2
		</label>
		<input type="number" id="queryZ2">
		|
		<button>Query</button>
	</fieldset>
</body>
</html>