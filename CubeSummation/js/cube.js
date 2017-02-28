/*--------------------------------
|		Declaracion del 
| 			Cubo
|--------------------------------*/
var cube = [];

/*--------------------------------
|		Inicializacion del 
| 			Cubo
|--------------------------------*/
function initCube(n){
	if (1 <= n && n <= 100){
		dimensiones = n;
		//n dimensiones del cubo (n*n*n)
		//con valores en 0
		for (var i = 0; i < n; i++) {
			cube.push([]);
			for (var j = 0; j < n; j++) {
				cube[i].push([]);
				for (var k = 0; k < n; k++) {
					cube[i][j].push(0)
				}
			}
		}
	}	
}
/*--------------------------------
|		Actualiza el valor
|			de un bloque
|--------------------------------*/
function update(x,y,z,W){
	try{
		x = x <= 0 ? 1 : x;
		y = y <= 0 ? 1 : y;
		z = z <= 0 ? 1 : z;
		//patron de solo numeros
		if (/^\d+$/.test(W))
  		cube[x-1][y-1][z-1] = parseInt(W);
		else
			alert("Valor no valido");
	}
	catch(e){
		alert(e.message);
	}
  console.log(cube)
}
/*--------------------------------
|		Obtener la suma entre
|			2 bloques
|--------------------------------*/
function query(x1,x2,x3,y1,y2,y3){
	return 0;
}


initCube(3);
console.log(cube);