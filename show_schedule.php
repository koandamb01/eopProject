<?php
	$sql = 'SELECT * FROM tblschedule WHERE mentor_id = :mentor_id AND period = :period ORDER BY day ASC';
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['mentor_id' => $mentor_id, 'period' => 1]);
    $rows1 = $stmt->fetchAll();

    $stmt->execute(['mentor_id' => $mentor_id, 'period' => 2]);
    $rows2 = $stmt->fetchAll();

    $Schedule_1 = array();
    $Schedule_2 = array();


    for ($i=1; $i <= 5; $i++) { 
    
        $check = false;
        foreach ($rows1 as $row) {
            
            if($row->day == $i){
                $Schedule_1[$i] = array($row->start_at, $row->end_at);
                $check = true;
            }
        }

        if($check == false){
            $Schedule_1[$i] = 0;
        }
    }


    for ($i=1; $i <= 5; $i++) { 
    
        $check = false;
        foreach ($rows2 as $row) {
            
            if($row->day == $i){
                $Schedule_2[$i] = array($row->start_at, $row->end_at);
                $check = true;
            }
        }

        if($check == false){
            $Schedule_2[$i] = 0;
        }
    }
    
?>

<script>
   window.onload = function() {
    $('#MySchedule').modal('show');
   };
</script>

<!-- Modal for Printing  -->
<div class="modal fade bs-example-modal-lg" id="MySchedule" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php 
                $sql = 'SELECT firstname, lastname FROM tblmentors WHERE mentor_id = :mentor_id';
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['mentor_id' => $mentor_id]);
                $row = $stmt->fetch();
            ?>
            <h4 class="modal-title" id="myModalLabel"><?php echo $row->firstname. ' ' .$row->lastname . '<h6>Latest Schedule</h6>'?></h4>
        </div>

        <div id="printThis" class="modal-body">
            <div class="well">
                <div class="row">
                    <div class="col-md-2 text-primary">
                        Period\Day<br>
                    </div>

                    <div class="col-md-2">
                        Monday<br>
                    </div>
                    <div class="col-md-2">
                        Tuesday
                    </div>
                    <div class="col-md-2">
                        Wednesday
                    </div>
                    <div class="col-md-2">
                        Thursday
                    </div>
                    <div class="col-md-2">
                        Friday
                    </div>
                    <br>
                </div>
        
                <!-- Morning Schedule -->
                <div class="row">
                    <hr>
                    <div class="col-md-2">Morning</div>
                <?php
                    foreach ($Schedule_1 as $key => $value) {
    
                        if($value == 0){
                            echo '<div class="col-md-2 bg-danger"><br><br><br></div>';
                        }
                        else{
                            echo '<div class="col-md-2">' . $value[0] . '<br> TO <br>'. $value[1] . '</div>';
                        }
                    }    
                ?>
                </div>
                
                <!-- Evening Schedule -->
                <div class="row">
                    <hr>
                    <div class="col-md-2">Evening</div>
                <?php
                    foreach ($Schedule_2 as $key => $value) {
    
                        if($value == 0){
                            echo '<div class="col-md-2 bg-danger"><br><br><br></div>';
                        }
                        else{
                            echo '<div class="col-md-2">' . $value[0] . '<br> TO <br>'. $value[1] . '</div>';
                        }
                    }     
                ?>
                </div>
            </div>
            <br>

            <?php
                $sql = 'SELECT course_name FROM tblcourses WHERE mentor_id = :mentor_id ORDER BY course_name ASC';
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['mentor_id' => $mentor_id]);
                $rows = $stmt->fetchAll();
             ?>
             <h6>Mentor Courses</h6>
             <div class="well">
                 <div class="row">
                    <?php foreach ($rows as $row): ?>
                        <div class="col-md-2"><?php echo $row->course_name; ?></div>
                    <?php endforeach ?>
                </div>
             </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" id="Print" class="btn btn-primary">Print</button>
      </div>
    </div>
  </div>
</div>
?>