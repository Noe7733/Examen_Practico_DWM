$(document).ready(function(){
	
	// Listen to login button
	$('#login').on('click', function(){
		login();
	});
});


// Function to login a user
function login(){
	var loginUsername = $('#Username').val();
	var loginPassword = $('#Password').val();
	
	$.ajax({
		url: 'controller/validar.php',
		method: 'GET',
		data: {
			loginUsername:loginUsername,
			loginPassword:loginPassword,
		},
		success: function(data){
			var msg_alerta = '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'+
			'Nombre de usuario y/o contraseña incorrectos</div>';
			var msg_correcto = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'+
			'¡Bienvenido a su sistema!</div>'
			
			var jsonData = JSON.parse(data);
			
            if (jsonData.success == "1")
			{		
				$('#loginMessage').html(msg_correcto);
				window.location = 'dashboard.php';
			}else{
				$('#loginMessage').html(msg_alerta);
			}
		}
	});
}
