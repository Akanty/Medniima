<?php


/*
.............................................................................
. This is a project for school and others 								.
. intereted in having a persoal website or blog								.											.   																		.	
.					-------------Author----------							.
.					|  Yekeen Ibrahim Olamilekan  |							.
.					-------------------------------							.							.																			.
.							iSmart Team										.
...........................................................................	.
*/

include '../controller/header.php';

if(!isset($_POST['sub_session_id']))
{
	ob_end_clean(); // Delete the buffer.
	$Redirect_url=''.SITE_URL.'exam/test.php';   
    header("Location: $Redirect_url"); 
	exit();
	
}else{
$SubId = $_POST["sub_session_id"];
$CatId = $_POST["cat_session_id"];
$exam_name = $_POST["exam_name"];
$subject_name = $_POST["subject_name"];

include ($_SERVER['DOCUMENT_ROOT']."/student/engine/tophead.php");
$title = "CBT Exam Categories";
include($_SERVER['DOCUMENT_ROOT']."/student/design/header.html");
include($_SERVER['DOCUMENT_ROOT']."/student/design/nav.html");



?>

 
 	<!--banner-->	
		     <div class="banner">
		    	<h2>
                Exam <i class="fa fa-angle-right"></i>
				Instructions
				
				</h2>
		    </div>
		<!--//banner-->
 	
 	<div class="blank">
	

			
           
           
          <section class="instruction-bg">
    <div class="container"> 
           
       <div class="row">
            <div class="col-md-9">
                <div class="instruction-hdr">
                    <h3>Instructions</h3>

                    <div class="hdr-divider"></div>
                    <br>
                    <p>Please read the following instructions carefully:</p>
                    <br>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="details-bg text-center">
                            Test: <span class="bold"></span><? echo $exam_name;?>                       </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="details-bg text-center">
                            Time: <span id="time_limit1" class="bold"><? echo $iSMartFUN->minutes2(EXAM_TIME);?></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="details-bg text-center"> 
                         Subject:                       
                            <span class="bold">
                               
                                <? echo $subject_name;?>                            </span>
                        </div>
                    </div>
                    <div class="col-md-6">

                                                    <div class="details-bg text-center" style="padding-bottom: 40px;">
                                <div class="col-md-4">Question</div>
                                <div class="col-md-8">
                                 <form action="<?php echo SITE_URL;?>exam/exam-hall.php" method="post">
                        <input type="hidden" name="sub_session_id" value="<?php echo $SubId;?>" />
                        <input type="hidden" name="cat_session_id" value="<?php echo $CatId;?>" />
                        <input type="hidden" name="subject_name" value="<?php echo $subject_name;?>" />
                        <input type="hidden" name="exam_name" value="<?php echo $exam_name;?>" />
                        <select id="question_limit" class="form-control question_limit" name="question_limit" onchange="changeQuestion(this)">
<option value="5">5</option>
<option value="10">10</option>
<option value="20">20</option>
<option value="50">50</option>
<option value="100">100</option>
</select>                                </div>
                            </div>
                                            </div>
                                            
                                            
                                            
                                            
                                            
                                            
<div class="col-md-12">
                            <div class="details-bg text-center" style="padding-bottom: 60px; ">
                                <div class="col-md-3" style="padding-top:10px;">Time Limit</div>
                                <div class="col-md-9">
                                    <div class="input-group input-group-md">
<select name="examtime" class="form-control Time_limit" id="examtime"  required="required" onchange="changeTime(this)">
<? 


$time_List = array("00:00:60","00:05:00","00:10:00","00:15:00","00:20:00","00:30:00","00:45:00","00:50:00","01:00:00","01:15:00","01:45:00","02:00:00","02:15:00","02:30:00","02:45:00","03:00:00","03:30:00","04:00:00");
foreach($time_List as $Option_t){
if(EXAM_TIME == $Option_t){
	
?>
<option value="<? echo $Option_t;?>" selected><? echo $iSMartFUN->minutes2($Option_t);?></option>
<? }else{?>
<option value="<? echo $Option_t;?>"><? echo $iSMartFUN->minutes2($Option_t);?></option>
<? }}?>

</select>
</div>                                </div>
                            </div>
                    </div>
                                            
                        
                </div>
                <ul>
                    <li>There are <b><span id="question_id">5</span> questions</b> and you are expected to
                        attempt all.</li>
                    <li>The maximum time allowed for this test is <b><span id="time_limit2"><? echo $iSMartFUN->minutes2(EXAM_TIME);?></span></b>.</li>
                    <li>If you do not have an instant idea of a question you can skip it by clicking on the next button,
                        you can re-attempt the skipped question when you have attempted others.
                    </li>
                    <li>The attempted questions will have their button colored below the page.</li>
                    <li>Upon answering your questions, you can click on each question button below to re-visit the
                        question. Clicking on the submit button will give you the opportunity to submit your test.
                    </li>
                    <li>In the event of exhausting your maximum allowed time , the system will end the test and
                        automatically submit it for grading.
                    </li>
                </ul>
            </div>
            <div class="col-md-3">
                <div class="phone-holder">

                                            <button type="submit" class="test-btn">Start <span class="ml5"><i class="fa fa-long-arrow-right"></i></span></button>                       </form>             </div>
            </div>
        </div>    
           
               
  </div></section>         
           
       
    
                
	        	
                
                
	        
	       </div>
           
           
           <script>
		   function changeQuestion(val) {
	var question_limit=$(".question_limit").val();
	document.getElementById('question_id').innerHTML=question_limit;
}

function changeTime(val) {
	var Time_limit=$(".Time_limit").val();
	document.getElementById('time_limit1').innerHTML=Time_limit;
	document.getElementById('time_limit2').innerHTML=Time_limit;
}

		   
		   </script>
	
<?php include($_SERVER['DOCUMENT_ROOT']."/student/design/footer.html"); }?>
