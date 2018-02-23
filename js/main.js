// event lister to the checkbox IsEOP
// Disabled the Counselor dropdown menu if Iseop checkbox is check
var checkbox = document.querySelector("input[name=iseop]");

checkbox.addEventListener( 'change', function() {
    if(this.checked) {
    	document.forms['myForm']['counselor'].style.border = "1px solid #ccc";
		document.getElementById("counselorErr").style.display = 'none';
        document.forms['myForm']['counselor'].disabled = true;
    } else {
        document.forms['myForm']['counselor'].disabled = false;
    }
});