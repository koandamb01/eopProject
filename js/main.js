function addHours(){
    var x = document.getElementById("secondHours").childElementCount; // get the number of the element in this section
    
    if(x == 5){
        // do nothing
    }else{
        document.getElementById("hoursErr").style.display = 'none';

        var newfield = '';

        newfield = `<div class="col-md-3" id="1">
                        <div class="form-group">
                            <label>Monday</label><br>
                            FROM<input type="time" class="form-control" name="MonFrom2">
                            TO<input type="time" class="form-control" name="MonTo2">
                        </div>
                    </div>

                    <div class="col-md-2" id="2">
                        <div class="form-group">
                            <label>Tuesday</label><br>
                            FROM<input type="time" class="form-control" name="TuesFrom2">
                            TO<input type="time" class="form-control" name="TueTo2">
                        </div>
                    </div>

                    <div class="col-md-2" id="3">
                        <div class="form-group">
                            <label>Wednesday</label><br>
                            FROM<input type="time" class="form-control" name="WedFrom2">
                            TO<input type="time" class="form-control" name="WedTo2">
                        </div>
                    </div>

                    <div class="col-md-2" id="4">
                        <div class="form-group">
                            <label>Thursday</label><br>
                            FROM<input type="time" class="form-control" name="ThuFrom2">
                            TO<input type="time" class="form-control" name="ThuTo2">
                        </div>
                    </div>

                    <div class="col-md-3" id="5">
                        <div class="form-group">
                            <label>Friday</label><br>
                            FROM<input type="time" class="form-control" name="FriFrom2">
                            TO<input type="time" class="form-control" name="FriTo2">
                        </div>
                    </div>`;

        document.getElementById("secondHours").innerHTML += newfield;
    }
}


function removeHours(){
    var y = document.getElementById("secondHours").childElementCount; // get the number of the element in this section
    
    if(y == 0){
        document.getElementById("hoursErr").innerHTML = "* You need at least one week of hours";
        document.getElementById("hoursErr").style.display = 'block';
        document.getElementById("hoursErr").style.color = 'red';
        document.getElementById("hoursErr").style.textAlign = 'right';
        document.getElementById("hoursErr").style.float = 'right';
    }
    else{
        for(var i = y; i >= 1; i--){
            hours = document.getElementById(i);
            hours.remove();
        }
    }  
}







// function to add new course if the user press the plus button
function addfields(){
	var x = document.getElementById("fields").childElementCount; // get the number of the element in this section
    x += 1;
	
    document.getElementById("CourseErr").style.display = 'none';
    
    var newfield = '';
	newfield = `<div class="col-md-3" id="field`+x+`">
                    <div class="form-group">
                        <label>Course `+x+`</label>
                        <input type="text" class="form-control" name="course`+x+`" placeholder="CRS 101...">
                    </div>
                </div>`;
    document.getElementById("fields").innerHTML += newfield;
}


// function to remove the last of the course list if the user press the minus button
function removefields(){
    var y = document.getElementById("fields").childElementCount; // get the number of the element in this section
    
    if(y <= 4){
        document.getElementById("CourseErr").innerHTML = "* You need at least 4 Courses";
        document.getElementById("CourseErr").style.display = 'block';
        document.getElementById("CourseErr").style.color = 'red';
        document.getElementById("CourseErr").style.textAlign = 'right';
        document.getElementById("CourseErr").style.float = 'right';
    }
    else{
        field = document.getElementById("field"+y);
        field.remove();
    }  
}

