<?php
include '../controller/header.php';
include 'engine/tophead.php';

if(isset($_GET['asid']))
{
$asid=intval($_GET['asid']);

$query  =  $db->query("SELECT tblassignment.*,tblteacher.id as teacher_id,tblteacher.fullname as teacher_name,tblclasses.ClassName,tblclasses.Section,tblclasses.id,tblsubjects.id as subid,tblsubjects.SubjectName from tblassignment join tblclasses on tblclasses.id=tblassignment.class_id join tblsubjects on tblsubjects.id = tblassignment.subject_id join tblteacher on tblteacher.id=tblassignment.teacher_id where tblassignment.id='$asid'");

if($query->num_rows > 0){
$assignment_view_result = $query->fetch_object();

?>   

  <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo htmlentities($assignment_view_result->name);?> | Assignment Details</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo SITE_URL;?>res/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo SITE_URL;?>res/css/AdminLTE.min.css">
<style>

.page-header {
    margin: 10px 0 20px 0;
    font-size: 22px;
    text-align: center;
}

</style>
  
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
        
         <div class="row">
        <div class="col-md-2">
          <img src="<?php echo SITE_URL;?>images/<? echo SCHOOL_LOGO;?>" height="100" width="100"/>
          </div>
          
           <div class="col-md-8">
           <?php echo SCHOOL_NAME;?>
           <br><small><?php echo SCHOOL_DESC;?></small><br>
           <small><?php echo SCHOOL_ADDRESS;?></small>
          </div>
          <small class="pull-right">Date: <? echo date("d/m/Y");?></small>
          </div>
          
        </h2>
      </div>
      <!-- /.col -->
    </div>
    

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 text-center">
        <h1><u>Assginment Details</u></h1><br>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
    
    <div class="col-xs-12">
        <p class="lead">Title: <?php echo htmlentities($assignment_view_result->name);?></p>
        <p class="lead">Subject: <?php echo htmlentities($assignment_view_result->SubjectName);?></p>
        <p class="lead">From: <?php echo htmlentities(ucwords($assignment_view_result->teacher_name));?></p>
        <p class="lead">Deadline: <?php echo htmlentities($assignment_view_result->dead_line_date);?> by <?php echo htmlentities($assignment_view_result->dead_line_time);?></p>

        <div class="table-responsive">
        <p class="lead">Question:</p>
        
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;"><?php echo htmlentities($assignment_view_result->question);?></p>
        </div>
      </div>
      <!-- /.col -->
    
      
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>

<? }}else{
	
}?>
