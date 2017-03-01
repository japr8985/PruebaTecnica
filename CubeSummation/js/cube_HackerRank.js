var cube = [];
function init(n_n_n_matrix,number_of_operations){
	n = n_n_n_matrix;
	m = number_of_operations;
	if (
			(1 <= n && n <= 100) &&
			(1 <= m && m <= 1000)){
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


function query(x1,y1,z1,x2,y2,z2){
	var sum = 0;
		for (var i = (x1 - 1); i < x2; i++) {
			for (var j = (y1 - 1); j < y2; j++) {
				for (var k = (z1 -1); k < z2; k++) {
					sum = sum + cube[i][j][k];
				}
			}
		}
		return sum;

}



var t = 0;
var n = m = 0;
input = input.split("\n");
for (var i = 0; i < input.length; i++) {
	var line = input[i].split(" ");
	switch(line.length){
		case 1:
			t = line[0]
			break;
		case 2:
			cube = []
			init(line[0],line[1]);
			break;
		case 5: //UPDATE
			var num = parseInt(line[4]);
			if (Math.pow(-10,9) <= num && num <= Math.pow(10,9)) 
				cube[line[1]-1][line[2]-1][line[3]-1] = num;
			else 
				cube[line[1]-1][line[2]-1][line[3]-1] = 0;
			break;
		case 7:
			console.log(query(line[1],line[2],line[3],line[4],line[5],line[6]));
			break;
	}
}

