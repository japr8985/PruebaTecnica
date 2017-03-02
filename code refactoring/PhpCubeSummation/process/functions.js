

function createCube(){
	var obj = {
		dim : $("#dim").val()
	}
	$.ajax({
		url:'process/create.php',
		method:'POST',
		data:obj,
		dataType:'json',
		success:function(data){
			console.log(data);
		},
		error:function(xhr,status,error){
			alert(xhr.status+" - "+error);
		}
	});
}