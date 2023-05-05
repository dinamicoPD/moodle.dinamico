window.onload = () => {
 const myInput = document.getElementById('password2');
 //myInput.onpaste = e => e.preventDefault();
}
function mostrarPassword(){
	var x = document.getElementById("password1");
 if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}