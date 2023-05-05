function checkStrength(password){
	//verify the number of characters
	if(password.length<8){
		$("#eightchardiv").removeAttr("style");
	}else{
		$("#eightchardiv").css("display","none");
	}
	//verify number with lower case
	if (password.match(/([0-9])/)){
		$("#numdiv").css("display","none");
	}else{
		$("#numdiv").removeAttr("style");
	}
	if(password.match(/([ña-z])/) ){
		$("#lcasediv").css("display","none");
	}else{
		$("#lcasediv").removeAttr("style");
	}
	if(password.match(/([ÑA-Z])/)){
		$("#ucasediv").css("display","none");
	}else{
		$("#ucasediv").removeAttr("style");
	}
	if (password.match(/([^ña-zÑA-Z0-9_])/)){
		$("#noalfadiv").css("display","none");
	}else{
		$("#noalfadiv").removeAttr("style");
	}
}
function passwordsAreEqual(password1,password2){
if(password1 === password2){
		$("#passmissmatchdiv").css("display","none");
	}else{
		$("#passmissmatchdiv").removeAttr("style");
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

