function addHours(){
    var x = document.getElementById("hours").childElementCount; // get the number of the element in this section
    x += 1;

    var newfield = '';

    newfield = `<div class="col-md-2">
                    <div class="form-group">
                        <label>Monday</label><br>
                        FROM<input type="time" class="form-control" name="MonFrom">
                        TO<input type="time" class="form-control" name="MonTo1`+x+`">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>Tuesday</label><br>
                        FROM<input type="time" class="form-control" name="TuesFrom">
                        TO<input type="time" class="form-control" name="TueTo1`+x+`">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>Wednesday</label><br>
                        FROM<input type="time" class="form-control" name="WedFrom">
                        TO<input type="time" class="form-control" name="WedTo1`+x+`">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label>Thursday</label><br>
                        FROM<input type="time" class="form-control" name="ThuFrom">
                        TO<input type="time" class="form-control" name="ThuTo1`+x+`">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Friday</label><br>
                        FROM<input type="time" class="form-control" name="FriFrom">
                        TO<input type="time" class="form-control" name="FriTo1`+x+`">
                    </div>
                </div>`;

    document.getElementById("hours").innerHTML += newfield;

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

