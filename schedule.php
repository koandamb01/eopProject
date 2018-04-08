<?php

 // Record the time for the week
     // record monday data
       if(isset($_POST['MonFrom2'])){
          
          if(!empty($_POST['MonFrom1'])){

            if(!empty($_POST['MonFrom2'])){
              
              $MonFrom1 = date("H:i", strtotime($_POST['MonFrom1'])); $MonTo1 = date("H:i", strtotime($_POST['MonTo1'])); //
              $MonFrom2 = date("H:i", strtotime($_POST['MonFrom2'])); $MonTo2 = date("H:i", strtotime($_POST['MonTo2'])); // Monday
      
              $schedule["Mon1"] = array($MonFrom1, $MonTo1);
              $schedule["Mon2"] = array($MonFrom2, $MonTo2);
            }
            else {
                
                $MonFrom1 = date("H:i", strtotime($_POST['MonFrom1'])); $MonTo1 = date("H:i", strtotime($_POST['MonTo1'])); //
                $schedule["Mon1"] = array($MonFrom1, $MonTo1);
            }
          }
          elseif (!empty($_POST['MonFrom2'])){
            
            $MonFrom2 = date("H:i", strtotime($_POST['MonFrom2'])); $MonTo2 = date("H:i", strtotime($_POST['MonTo2'])); // Monday
            $schedule["Mon2"] = array($MonFrom2, $MonTo2);
          }
          else{
            //echo "Both Mondays are EMPTY";
          } 
       }

       elseif (!empty($_POST['MonFrom1'])) {
          $MonFrom1 = date("H:i", strtotime($_POST['MonFrom1'])); $MonTo1 = date("H:i", strtotime($_POST['MonTo1'])); //
          $schedule["Mon1"] = array($MonFrom1, $MonTo1);
       }
       else{
          //echo "Both Mondays are EMPTY";
       }

       


      // record tuesday data
       if(isset($_POST['TueFrom2'])){
          
          if(!empty($_POST['TueFrom1'])){

            if(!empty($_POST['TueFrom2'])){
              
              $TueFrom1 = date("H:i", strtotime($_POST['TueFrom1'])); $TueTo1 = date("H:i", strtotime($_POST['TueTo1'])); 
              $TueFrom2 = date("H:i", strtotime($_POST['TueFrom2'])); $TueTo2 = date("H:i", strtotime($_POST['TueTo2'])); 
      
              $schedule["Tue1"] = array($TueFrom1, $TueTo1);
              $schedule["Tue2"] = array($TueFrom2, $TueTo2);
            }
            else {
                
                $TueFrom1 = date("H:i", strtotime($_POST['TueFrom1'])); $TueTo1 = date("H:i", strtotime($_POST['TueTo1']));
                $schedule["Tue1"] = array($TueFrom1, $TueTo1);
            }
          }
          elseif (!empty($_POST['TueFrom2'])){
            
            $TueFrom2 = date("H:i", strtotime($_POST['TueFrom2'])); $TueTo2 = date("H:i", strtotime($_POST['TueTo2'])); 
            $schedule["Tue2"] = array($TueFrom2, $TueTo2);
          }
          else{
            //echo "Both Tuesdays are EMPTY";
          } 
       }

       elseif (!empty($_POST['TueFrom1'])) {
          $TueFrom1 = date("H:i", strtotime($_POST['TueFrom1'])); $TueTo1 = date("H:i", strtotime($_POST['TueTo1']));
          $schedule["Tue1"] = array($TueFrom1, $TueTo1);
       }
       else{
          //echo "Both Tuesdays are EMPTY";
       }




        // record Wednesday data
       if(isset($_POST['WedFrom2'])){
          
          if(!empty($_POST['WedFrom1'])){

            if(!empty($_POST['WedFrom2'])){
              
              $WedFrom1 = date("H:i", strtotime($_POST['WedFrom1'])); $WedTo1 = date("H:i", strtotime($_POST['WedTo1'])); // 
              $WedFrom2 = date("H:i", strtotime($_POST['WedFrom2'])); $WedTo2 = date("H:i", strtotime($_POST['WedTo2'])); // Wednesday
      
              $schedule["Wed1"] = array($WedFrom1, $WedTo1);
              $schedule["Wed2"] = array($WedFrom2, $WedTo2);
            }
            else {
                
                $WedFrom1 = date("H:i", strtotime($_POST['WedFrom1'])); $WedTo1 = date("H:i", strtotime($_POST['WedTo1'])); // 
                $schedule["Wed1"] = array($WedFrom1, $WedTo1);
            }
          }
          elseif (!empty($_POST['WedFrom2'])){
            
            $WedFrom2 = date("H:i", strtotime($_POST['WedFrom2'])); $WedTo2 = date("H:i", strtotime($_POST['WedTo2'])); // Wednesday
            $schedule["Wed2"] = array($WedFrom2, $WedTo2);
          }
          else{
            echo "Both Wednesdays are EMPTY";
          } 
       }

       elseif (!empty($_POST['MonFrom1'])) {
          $WedFrom1 = date("H:i", strtotime($_POST['WedFrom1'])); $WedTo1 = date("H:i", strtotime($_POST['WedTo1'])); // 
          $schedule["Wed1"] = array($WedFrom1, $WedTo1);
       }
       else{
          //echo "Both Wednesdays are EMPTY";
       }



       // record Thursdays data
       if(isset($_POST['ThuFrom2'])){
          
          if(!empty($_POST['ThuFrom1'])){

            if(!empty($_POST['ThuFrom2'])){
              
              $ThuFrom1 = date("H:i", strtotime($_POST['ThuFrom1'])); $ThuTo1 = date("H:i", strtotime($_POST['ThuTo1'])); // 
              $ThuFrom2 = date("H:i", strtotime($_POST['ThuFrom2'])); $ThuTo2 = date("H:i", strtotime($_POST['ThuTo2']));
      
              $schedule["Thu1"] = array($ThuFrom1, $ThuTo1);
              $schedule["Thu2"] = array($ThuFrom2, $ThuTo2);
            }
            else {
                
                $ThuFrom1 = date("H:i", strtotime($_POST['ThuFrom1'])); $ThuTo1 = date("H:i", strtotime($_POST['ThuTo1']));
                $schedule["Thu1"] = array($ThuFrom1, $ThuTo1);
            }
          }
          elseif (!empty($_POST['ThuFrom2'])){
            
            $ThuFrom2 = date("H:i", strtotime($_POST['ThuFrom2'])); $ThuTo2 = date("H:i", strtotime($_POST['ThuTo2']));
            $schedule["Thu2"] = array($ThuFrom2, $ThuTo2);
          }
          else{
            //echo "Both Thursdays are EMPTY";
          } 
       }

       elseif (!empty($_POST['ThuFrom1'])) {
          $ThuFrom1 = date("H:i", strtotime($_POST['ThuFrom1'])); $ThuTo1 = date("H:i", strtotime($_POST['ThuTo1']));
          $schedule["Thu1"] = array($ThuFrom1, $ThuTo1);
       }
       else{
          //echo "Both Thursdays are EMPTY";
       }




        // record Fridays data
       if(isset($_POST['FriFrom2'])){
          
          if(!empty($_POST['FriFrom1'])){

            if(!empty($_POST['FriFrom2'])){
              
              $FriFrom1 = date("H:i", strtotime($_POST['FriFrom1'])); $FriTo1 = date("H:i", strtotime($_POST['FriTo1'])); 
              $FriFrom2 = date("H:i", strtotime($_POST['FriFrom2'])); $FriTo2 = date("H:i", strtotime($_POST['FriTo2'])); 
      
              $schedule["Fri1"] = array($FriFrom1, $FriTo1);
              $schedule["Fri2"] = array($FriFrom2, $FriTo2);
            }
            else {
                
                $FriFrom1 = date("H:i", strtotime($_POST['FriFrom1'])); $FriTo1 = date("H:i", strtotime($_POST['FriTo1']));
                $schedule["Fri1"] = array($FriFrom1, $FriTo1);
            }
          }
          elseif (!empty($_POST['FriFrom2'])){
            
            $FriFrom2 = date("H:i", strtotime($_POST['FriFrom2'])); $FriTo2 = date("H:i", strtotime($_POST['FriTo2']));
            $schedule["Fri2"] = array($FriFrom2, $FriTo2);
          }
          else{
            //echo "Both Fridays are EMPTY";
          } 
       }

       elseif (!empty($_POST['FriFrom1'])) {
          $FriFrom1 = date("H:i", strtotime($_POST['FriFrom1'])); $FriTo1 = date("H:i", strtotime($_POST['FriTo1']));
          $schedule["Fri1"] = array($FriFrom1, $FriTo1);
       }
       else{
          //echo "Both Fridays are EMPTY";
       }


       // Mentor schedule database setup
      $stmt = $pdo->prepare('SELECT mentor_id FROM tblmentors WHERE email = ?');
      $stmt->execute([$email]);
      $row = $stmt->fetch();
      $mentor_id = $row->mentor_id;

      $sql = 'INSERT INTO `tblschedule` (mentor_id, day, start_at, end_at, period) VALUES (:mentor_id, :day, :start_at, :end_at, :period)';

      foreach ($schedule as $key => $value){
      	// Monday
        if($key == "Mon1"){
          $day = 1;
          $period = 1;
          $stmt = $pdo->prepare($sql); // Prepare the SQL statement
          $stmt->execute(['mentor_id' => $mentor_id, 'day' => $day, 'start_at' => $value[0], 'end_at' => $value[1], 'period' => $period]);
        }
        if($key == "Mon2"){
          $day = 1;
          $period = 2;
          $stmt = $pdo->prepare($sql); // Prepare the SQL statement
          $stmt->execute(['mentor_id' => $mentor_id, 'day' => $day, 'start_at' => $value[0], 'end_at' => $value[1], 'period' => $period]);
        }

        // Tuesday
        if($key == "Tue1"){
          $day = 2;
          $period = 1;
          $stmt = $pdo->prepare($sql); // Prepare the SQL statement
          $stmt->execute(['mentor_id' => $mentor_id, 'day' => $day, 'start_at' => $value[0], 'end_at' => $value[1], 'period' => $period]);
        }
        if($key == "Tue2"){
          $day = 2;
          $period = 2;
          $stmt = $pdo->prepare($sql); // Prepare the SQL statement
          $stmt->execute(['mentor_id' => $mentor_id, 'day' => $day, 'start_at' => $value[0], 'end_at' => $value[1], 'period' => $period]);
        }

        // Wednesday
        if($key == "Wed1"){
          $day = 3;
          $period = 1;
          $stmt = $pdo->prepare($sql); // Prepare the SQL statement
          $stmt->execute(['mentor_id' => $mentor_id, 'day' => $day, 'start_at' => $value[0], 'end_at' => $value[1], 'period' => $period]);
        }
        if($key == "Wed2"){
          $day = 3;
          $period = 2;
          $stmt = $pdo->prepare($sql); // Prepare the SQL statement
          $stmt->execute(['mentor_id' => $mentor_id, 'day' => $day, 'start_at' => $value[0], 'end_at' => $value[1], 'period' => $period]);
        }

        // Thursday
        if($key == "Thu1"){
          $day = 4;
          $period = 1;
          $stmt = $pdo->prepare($sql); // Prepare the SQL statement
          $stmt->execute(['mentor_id' => $mentor_id, 'day' => $day, 'start_at' => $value[0], 'end_at' => $value[1], 'period' => $period]);
        }
        if($key == "Thu2"){
          $day = 4;
          $period = 2;
          $stmt = $pdo->prepare($sql); // Prepare the SQL statement
          $stmt->execute(['mentor_id' => $mentor_id, 'day' => $day, 'start_at' => $value[0], 'end_at' => $value[1], 'period' => $period]);
        }


        // Friday
        if($key == "Fri1"){
          $day = 5;
          $period = 1;
          $stmt = $pdo->prepare($sql); // Prepare the SQL statement
          $stmt->execute(['mentor_id' => $mentor_id, 'day' => $day, 'start_at' => $value[0], 'end_at' => $value[1], 'period' => $period]);
        }
        if($key == "Fri2"){
          $day = 5;
          $period = 2;
          $stmt = $pdo->prepare($sql); // Prepare the SQL statement
          $stmt->execute(['mentor_id' => $mentor_id, 'day' => $day, 'start_at' => $value[0], 'end_at' => $value[1], 'period' => $period]);
        }
        // add the rest of the week later
      }

      //Mentor course database setup
      $sql = 'INSERT INTO `tblcourses` (mentor_id, course_name) VALUES (:mentor_id, :course_name)';
      foreach ($_POST['course'] as $course) {
          $stmt = $pdo->prepare($sql); // Prepare the SQL statement
          $stmt->execute(['mentor_id' => $mentor_id, 'course_name' => $course]);
      }



 ?>