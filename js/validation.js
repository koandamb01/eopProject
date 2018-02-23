function formatData(p){
	p = p.replace("(", "", p);
	p = p.replace(")", "", p);
	p = p.replace("-", "", p);
	return p;
}


// Validating the input firstname
function validateFirstName(){
	var first = document.forms['myForm']['firstname'].value;
	var letters = /^[A-Za-z '.-]+$/;

	if(first.length == 0){
		document.forms['myForm']['firstname'].style.border = "1px solid red";
		document.forms['myForm']['firstname'].focus;
		document.getElementById("fnameErr").innerHTML = "* First Name required";
		document.getElementById("fnameErr").style.display = 'block';
		document.getElementById("fnameErr").style.color = 'red';
		document.getElementById("fnameErr").style.textAlign = 'right';
		document.getElementById("fnameErr").style.float = 'right';
		return false;
	}
	else if(first.match(letters)){
		document.forms['myForm']['firstname'].style.border = "1px solid #ccc";
		document.getElementById("fnameErr").style.display = 'none';
		return true;
	}else{
		document.forms['myForm']['firstname'].style.border = "1px solid red";
		document.forms['myForm']['firstname'].focus;
		document.getElementById("fnameErr").innerHTML = "* Alphabet characters only";
		document.getElementById("fnameErr").style.display = 'block';
		document.getElementById("fnameErr").style.color = 'red';
		document.getElementById("fnameErr").style.textAlign = 'right';
		document.getElementById("fnameErr").style.float = 'right';
		return false;
	}
}


// Validating the input lastname
function validateLastName(){
	var last = document.forms['myForm']['lastname'].value;
	var letters = /^[A-Za-z '.-]+$/;
	
	
	if(last.length == 0){
		document.forms['myForm']['lastname'].style.border = "1px solid red";
		document.forms['myForm']['lastname'].focus;
		document.getElementById("lnameErr").innerHTML = "* Last Name required";
		document.getElementById("lnameErr").style.display = 'block';
		document.getElementById("lnameErr").style.color = 'red';
		document.getElementById("lnameErr").style.textAlign = 'right';
		document.getElementById("lnameErr").style.float = 'right';
		return false;
	}
	else if(last.match(letters)){
		document.forms['myForm']['lastname'].style.border = "1px solid #ccc";
		document.getElementById("lnameErr").style.display = 'none';
		return true;
	}else{
		document.forms['myForm']['lastname'].style.border = "1px solid red";
		document.forms['myForm']['lastname'].focus;
		document.getElementById("lnameErr").innerHTML = "* Alphabet characters only";
		document.getElementById("lnameErr").style.display = 'block';
		document.getElementById("lnameErr").style.color = 'red';
		document.getElementById("lnameErr").style.textAlign = 'right';
		document.getElementById("lnameErr").style.float = 'right';
		return false;
	}
}


// Validating the academic dropdown
function validateAcademic(){
	var acad = document.forms['myForm']['academic'].value;
	
	if(acad.length == 0){
		document.forms['myForm']['academic'].style.border = "1px solid red";
		document.forms['myForm']['academic'].focus;
		document.getElementById("academicErr").innerHTML = "* Academmic Year required";
		document.getElementById("academicErr").style.display = 'block';
		document.getElementById("academicErr").style.color = 'red';
		document.getElementById("academicErr").style.textAlign = 'right';
		document.getElementById("academicErr").style.float = 'right';
		return false;
	}
	else{
		document.forms['myForm']['academic'].style.border = "1px solid #ccc";
		document.getElementById("academicErr").style.display = 'none';
		return true;
	}
}



// Validation the email
function validateEmail(){
	var email = document.forms['myForm']['email'].value;
	var mailFormat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	
	document.forms['myForm']['email'].style.background = "#fff";
	if(email.length == 0){
		document.forms['myForm']['email'].style.border = "1px solid red";
		document.forms['myForm']['email'].focus;
		document.getElementById("emailErr").innerHTML = "* Email required";
		document.getElementById("emailErr").style.display = 'block';
		document.getElementById("emailErr").style.color = 'red';
		document.getElementById("emailErr").style.textAlign = 'right';
		document.getElementById("emailErr").style.float = 'right';
		return false;
	}
	else if(email.match(mailFormat)){
		document.forms['myForm']['email'].style.border = "1px solid #ccc";
		document.getElementById("emailErr").style.display = 'none';
		return true;
	}else{
		document.forms['myForm']['email'].style.border = "1px solid red";
		document.forms['myForm']['email'].focus;
		document.getElementById("emailErr").innerHTML = "* Invalid email address!";
		document.getElementById("emailErr").style.display = 'block';
		document.getElementById("emailErr").style.color = 'red';
		document.getElementById("emailErr").style.textAlign = 'right';
		document.getElementById("emailErr").style.float = 'right';
		return false;
	}
}


// Validating the counselor dropdown
function validateCounselor(){
	var counselor = document.forms['myForm']['counselor'].value;
	var checkbox = document.querySelector("input[name=iseop]");

	if(checkbox.checked){
		// do nothing
		return true;
	}
	else{
		if(counselor.length == 0){
			document.forms['myForm']['counselor'].style.border = "1px solid red";
			document.forms['myForm']['counselor'].focus;
			document.getElementById("counselorErr").innerHTML = "* Counselor required";
			document.getElementById("counselorErr").style.display = 'block';
			document.getElementById("counselorErr").style.color = 'red';
			document.getElementById("counselorErr").style.textAlign = 'right';
			document.getElementById("counselorErr").style.float = 'right';
			return false;
		}
		else{
			document.forms['myForm']['counselor'].style.border = "1px solid #ccc";
			document.getElementById("counselorErr").style.display = 'none';
			return true;
		}
	}
}


// Validating the Mentor dropdown
function validateMentor(){
	var mentor = document.forms['myForm']['mentor'].value;
	
	if(mentor.length == 0){
		document.forms['myForm']['mentor'].style.border = "1px solid red";
		document.forms['myForm']['mentor'].focus;
		document.getElementById("mentorErr").innerHTML = "* Mentor required";
		document.getElementById("mentorErr").style.display = 'block';
		document.getElementById("mentorErr").style.color = 'red';
		document.getElementById("mentorErr").style.textAlign = 'right';
		document.getElementById("mentorErr").style.float = 'right';
		return false;
	}
	else{
		document.forms['myForm']['mentor'].style.border = "1px solid #ccc";
		document.getElementById("mentorErr").style.display = 'none';
		return true;
	}
}


// Validating the Session Type dropdown
function validateSessionType(){
	var sessionType = document.forms['myForm']['sessionType'].value;
	
	if(sessionType.length == 0){
		document.forms['myForm']['sessionType'].style.border = "1px solid red";
		document.forms['myForm']['sessionType'].focus;
		document.getElementById("sessionTypeErr").innerHTML = "* Session Type required";
		document.getElementById("sessionTypeErr").style.display = 'block';
		document.getElementById("sessionTypeErr").style.color = 'red';
		document.getElementById("sessionTypeErr").style.textAlign = 'right';
		document.getElementById("sessionTypeErr").style.float = 'right';
		return false;
	}
	else{
		document.forms['myForm']['sessionType'].style.border = "1px solid #ccc";
		document.getElementById("sessionTypeErr").style.display = 'none';
		return true;
	}
}




function validateForms(){
	var error = 0;

	if(!validateFirstName()) {error = 1;}
	if(!validateLastName()) {error = 1;}
	if(!validateAcademic()) {error = 1;}
	if(!validateCounselor()) {error = 1;}
	if(!validateEmail()) {error = 1;}
	if(!validateMentor()) {error = 1;}
	if(!validateSessionType()) {error = 1;}

	if (error == 1){return false}
	return true;
}