<?php include 'functions/functions.php';
/* declare page variable */
$page = 'New Mentor';

/*start html beginning tags and display page navigation bar */
header_Nav($page);
?>
<section id="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="sessions.php">Sessions</a></li>
            <li class="active">Edit Session</li>
        </ol>
    </div>
</section>

<section id="main">
    <div class="container">
      <div class="row">
        <?php dataOverview();?>
        <div class="col-md-9">
          <!-- Websitte overview -->
            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                  <h3 class="panel-title">Edit Page</h3>
                </div>
                <div class="panel-body">
                  <?php mentorForm();?>
                </div>
            </div>
        </div>
      </div>
    </div>
</section>

<?php footer();?>