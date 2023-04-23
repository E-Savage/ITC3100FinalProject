function validate() {
	var letters = /^[A-Za-z]+$/; 
	var userName = document.getElementById("userName").value;
	if(!userName.match(letters)){
		alert("Not a valid username");
		return false;
	}
	
	var password = document.getElementById("password").value;
	if(!password.match(letters)){
		alert("Not a valid password");
		return false;
	}
	
	return true;
}