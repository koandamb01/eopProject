<?php 
session_start();
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing registration page!";
  header("location: error.php");    
}

$active = $_SESSION['active'];
$firstname = $_SESSION['firstname'];

if(!$active){
    header("location: profile.php");
}

require 'functions/pdo.php';
require 'functions/functions.php';
require 'functions/vars.php';
/* declare page variable */
$page = 'Edit Mentor';

/*start html beginning tags and display page navigation bar */
header_Nav($page, $firstname);

/* Declarer form variables */
$message = $mentor_id = $firstname = $lastname = $email = $academic_year = "";

$timestamp = time();
$date = date('Y-m-d', $timestamp);

$mentor_id = $_GET['mentor_id'];
$sql = 'SELECT * FROM tblmentors WHERE mentor_id = :mentor_id';
$stmt = $pdo->prepare($sql);
$stmt->execute(['mentor_id' => $mentor_id]);
$row = $stmt->fetch();

$firstname = $row->firstname;
$lastname = $row->lastname;
$email = $row->email;
$academic_year = $row->academic_year;


// Fetch all courses for this mentor using the mentor id
$sql = 'SELECT DISTINCT course_name FROM tblcourses WHERE mentor_id = :mentor_id ORDER BY course_name ASC';
$stmt = $pdo->prepare($sql);
$stmt->execute(['mentor_id' => $mentor_id]);
$rows = $stmt->fetchAll();
$courses = array();

foreach ($rows as $row) {
  array_push($courses, $row->course_name);
}

// declare an array to record the form value
$formVars = array('firstname' => $firstname, 'lastname' => $lastname, 'email' => $email, 'academic' => $academic_year);
?>
<section id="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="sessions.php">Sessions</a></li>
            <li class="active">Edit Mentor</li>
        </ol>
    </div>
</section>

<section id="main">
    <div class="container">
      <div class="row">
        <?php sideMenu(1);?>
        <div class="col-md-9">
          <!-- Websitte overview -->
            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                  <h3 class="panel-title">Edit Mentor</h3>
                </div>
                <div class="panel-body">
                  <?php mentorForm(1, $formVars);?>
                </div>
            </div>
        </div>
      </div>
    </div>
</section>

<did id="scheduleHint"></div>

<script>
var mentor_id = "<?php echo $mentor_id; ?>";

// Ajax Function to fetch mentor's schedule from database 
function showshedule(){

  if(mentor_id == ""){

    document.getElementById("scheduleHint").innerHTML = "";
    return;
  } else{

    if(window.XMLHttpRequest){
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    }else{
      // code for IE6+, IE5+
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function(){
      
      if(this.readyState == 4 && this.status == 200){
          
        document.getElementById("scheduleHint").innerHTML = this.responseText;
      }

    };

    xmlhttp.open("GET", "getschedule.php?mentor_id="+mentor_id, true);
    xmlhttp.send();
  }

}


// JS function to show fields for removing course.
function showfields(x){
  var crs = document.getElementById('crs1');
  var btn = document.getElementById('btn-crs');
  var addbtn = document.getElementById('addbtn');
  var addcourse = document.getElementById('crs2');

  if(x == 1){
    crs.classList.remove('hide');
    btn.classList.remove('hide');
  }
  else{
    addbtn.classList.remove('hide');
    addcourse.classList.remove('hide');
  }
}


// ajax validation courses.
function validateAjaxCourse(x){
  var course = document.getElementById('crs'+x).value;
  var courseElem = document.getElementById('crs'+x);
  
  if(x == 1){
    var resultElem = document.getElementById('Removeresult');
  }else{
    var resultElem = document.getElementById('Addresult');
  }
  
  var courseFormat = /^[A-Za-z]{3}[0-9]{3}/;

  if(course.length == 0){
    courseElem.style.border = "1px solid red";
    courseElem.focus;
    resultElem.innerHTML = `<p class="text text-success">* Course Name required</p>`;
    return false;
  }
  else if(course.match(courseFormat)){
    
    for(let i = 0; i < coursesList.length; i++){
      if(course == coursesList[i]){
        courseElem.style.border = "1px solid #ccc";
        resultElem.innerHTML = "";
        return true;
      }
    }
    courseElem.style.border = "1px solid red";
    courseElem.focus;
    resultElem.innerHTML = `<p class="text text-success">* Invalid Course Name!</p>`;
    return false;
  
  }else{
    courseElem.style.border = "1px solid red";
    courseElem.focus;
    resultElem.innerHTML = `<p class="text text-success">* 3 letters and 3 Numbers only</p>`;
    return false;
  }
}



function RemoveCourse(){
  var error = 0;
  if(!validateAjaxCourse(1)){error = 1;}

  if(error == 1){return;}

  var crs = document.getElementById('crs1').value;
  if(crs.length == 0){
    document.getElementById("Removeresult").innerHTML = "";
    return;
  }else{

    if(window.XMLHttpRequest){
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    }else{
      // code for IE6+, IE5+
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function(){
      
      if(this.readyState == 4 && this.status == 200){
        document.getElementById("Removeresult").innerHTML = "";
        document.getElementById("Removeresult").innerHTML = this.responseText;
      }

    };

    xmlhttp.open("GET", "removecourse.php?mentor_id="+mentor_id+"&crs="+crs, true);
    xmlhttp.send();
  }
}


function AddCourse(){
  var error = 0;

  if(!validateAjaxCourse(2)){error = 1;}

  if(error == 1){return;}

  var crs = document.getElementById('crs2').value;
  if(crs.length == 0){
    document.getElementById("Addresult").innerHTML = "";
    return;
  }else{

    if(window.XMLHttpRequest){
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
    }else{
      // code for IE6+, IE5+
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange = function(){
      
      if(this.readyState == 4 && this.status == 200){
        document.getElementById("Addresult").innerHTML = "";
        document.getElementById("Addresult").innerHTML = this.responseText;
      }

    };

    xmlhttp.open("GET", "addcourse.php?mentor_id="+mentor_id+"&crs="+crs, true);
    xmlhttp.send();
  }
}

</script>

<?php footer();?>