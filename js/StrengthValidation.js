function checkStrength(password){
	//verify the number of characters
	var proceder = true;

	if(password.length<8){
		$("#eightchardiv").removeAttr("style");
		proceder =  false;
	}else{
		$("#eightchardiv").css("display","none");
	}
	//verify number with lower case
	if (password.match(/([0-9])/)){
		$("#numdiv").css("display","none");
	}else{
		$("#numdiv").removeAttr("style");
		proceder =  false;
	}
	if(password.match(/([ña-z])/) ){
		$("#lcasediv").css("display","none");
	}else{
		$("#lcasediv").removeAttr("style");
		proceder =  false;
	}
	if(password.match(/([ÑA-Z])/)){
		$("#ucasediv").css("display","none");
	}else{
		$("#ucasediv").removeAttr("style");
		proceder =  false;
	}
	if (password.match(/([^ña-zÑA-Z0-9_])/)){
		$("#noalfadiv").css("display","none");
	}else{
		$("#noalfadiv").removeAttr("style");
		proceder =  false;
	}

	if (proceder == false){
        $('#password1').addClass('is-invalid');
    }else{
		$('#password1').removeClass('is-invalid');
	}
}
function passwordsAreEqual(password1,password2){
if(password1 === password2){
		$('#password2').removeClass('is-invalid');
	}else{
		$('#password2').addClass('is-invalid');
	}
}
$(document).ready(function(){

	$('#password1').on('input',function(){
		checkStrength($('#password1').val());
		passwordsAreEqual($('#password1').val(),$('#password2').val());
	});
	$('#password1').change(function(){
		checkStrength($('#password1').val());
		passwordsAreEqual($('#password1').val(),$('#password2').val());
	});
	$('#password2').on('input',function(){
		passwordsAreEqual($('#password1').val(),$('#password2').val());
	});
	$('#password2').change(function(){
		passwordsAreEqual($('#password1').val(),$('#password2').val());
	});
});

