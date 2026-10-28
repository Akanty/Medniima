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
ob_start();
include '../controller/header.php';
include ($_SERVER['DOCUMENT_ROOT']."/student/engine/tophead.php");
$title ="Exam Hall";
include($_SERVER['DOCUMENT_ROOT']."/student/design/header.html");
include($_SERVER['DOCUMENT_ROOT']."/student/design/nav.html");

$_SESSION["SubId"] = $_POST["sub_session_id"];
$_SESSION["CatId"] = $_POST["cat_session_id"];
$question_limit = $_POST["question_limit"];
$CurrentQurrentIDs = array();
$sub_id = $_SESSION["SubId"];
$cat_id = $_SESSION["CatId"];
if($_SESSION["SubId"] =="" || $_SESSION["CatId"] ==""){
	ob_end_clean(); // Delete the buffer.
	$Redirect_url=''.SITE_URL.'exam/test.php';   
    header("Location: $Redirect_url"); 
	exit();
}else{

 

?>


<? $Quiz_sub_Details = $db->query("SELECT quiz_subjects.*, quiz_categories.name as cat_name from quiz_subjects join quiz_categories WHERE quiz_subjects.subject_id ='$sub_id' and quiz_categories.id ='$cat_id'  ");

if($Quiz_sub_Details->num_rows < 1){
	
	
}else{
	$Quiz_sub_Detail = $Quiz_sub_Details->fetch_object();
	
}

$exam_id = rand(1111111,9999999);
$limit= QUESTION_PER_PAGE;
$time = $_POST["examtime"];
$quiz_staus=1;
 

?>
<style>
.examnavbtn{
	margin:5px;	
}

.result-bg i {
    position: absolute;
    top: -10px;
    left: 50%;
    width: 50px;
    height: 50px;
	background-color:#2c4167;
	border-radius:50%;
	color:#FFF;
}

</style>
 
 	
 	<div class="blank">
	


            <div class="row">
                <div id="test">                  
                                                                                                                                                                                   
                        <div class="col-md-6">
                            <div class="info-boxx">
                                <div class="info-boxx-lemon clearfix">
                                    <i class="fa fa-book fa-2x"></i>
                                </div>
                                <div class="info-boxx-text">
								<span class="info-boxx-text-top">
									Exam Details
								</span>
								 <span class="info-boxx-text-btm subject-exam">
								   <? echo $Quiz_sub_Detail->cat_name;?> (<? echo $Quiz_sub_Detail->subject_name;?>)								    									 
								 </span>
                                 <span class="info-boxx-text-btm statex lemon">
									 <span class="fs16"><span id="num_nav">1</span> / <? echo $question_limit;?></span>
								 </span>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        <div class="col-md-6">

                            <div class="info-boxx">
                                <div class="info-boxx-lemon clearfix">
                                    <i class="fa fa-clock-o fa-2x"></i>
                                </div>
                                <div class="info-boxx-text">
								<span class="info-boxx-text-top ">
									Time Remaining 
								</span>
								 <span class="info-boxx-text-btm red">
									 <div id="timee"><span> <strong class="fs16"><span id="countdown" class="timer"><?php echo $time;?></span></strong> Secs</span></div>
									 <!--<span> Time Allowed: <strong class="fs16">:00</strong> Min</span>-->
								 </span>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
               </div>
           
           <div class="row">
   <div class="col-md-10 col-md-offset-1" id="test-body">
           
 <?
 $limit_tag="<br>";
  $query = $db->query("SELECT * FROM quiz_questions WHERE sub_id='$sub_id' order by rand() limit $question_limit" );
  $pcount = $query->num_rows;
  $pages = ceil($pcount/$limit);
  
 $lt=1;$pn=0;

while($row = $query->fetch_object())
   {
	   
	       $id = $row->id;
		   array_push($CurrentQurrentIDs,$row->id);
		   $ques_iddd[] = $row->id;
			$qns = $row->Question;
			  $ans = $row-Answer;
			$opt1 = $row->Option_A;
			$opt2 = $row->Option_B;
			$opt3 = $row->Option_C;
			$opt4 = $row->Option_D;
			$opt5 = $row->Option_E;
	   
 if($lt>$limit)
			  $disp="style='display:none;'";
			else
			 $disp="";
 
 ?>
 
  <div class="main-exam disp_<? echo $pn;?>" <? echo $disp;?>>
  <input type="hidden" id="ans_<? echo $row->id;?>" value="<? echo $row->Answer;?>">

                                    <div class="question-text"> 
                                    <div class="question-text text-justify">
                                         <b><? echo $lt;?></b>.)   <? echo $qns;?>                                   
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="options-holder"> 
                                     <div class="radio-holder">

                                                <div class="col-md-1"> (A)</div>
       <input type="radio" id="radio1" class="radio" name="options_<? echo $row->id;?>" value="A" onclick="chooseAns('A','<? echo $row->id;?>')"> <label for="radio1"><? echo $row->Option_A;?> <? echo $limit_tag;?></label>                                                    
                                                </div>
                                                
                                                
                                                
                                                <div class="radio-holder">

                                                <div class="col-md-1"> (B)</div>
       <input type="radio" id="radio2" class="radio" name="options_<? echo $row->id;?>" value="B" onclick="chooseAns('B','<? echo $row->id;?>')"> <label for="radio2"><? echo $row->Option_B;?> <? echo $limit_tag;?></label>                                                    
                                                </div>
                                                
                                                <div class="radio-holder">
                                                <div class="col-md-1"> (C)</div>
       <input type="radio" id="radio3" class="radio" name="options_<? echo $row->id;?>" value="C" onclick="chooseAns('C','<? echo $row->id;?>')"> <label for="radio3"><? echo $row->Option_C;?> <? echo $limit_tag;?></label>                                                    
                                                </div>  
 
 <? if($row->Option_D!=''){ ?>
 <div class="radio-holder">
 <div class="col-md-1"> (D)</div>
       <input type="radio" id="radio4" class="radio" name="options_<? echo $row->id;?>" value="D" onclick="chooseAns('D','<? echo $row->id;?>')"> <label for="radio4"><? echo $row->Option_D;?> <? echo $limit_tag;?></label>                                                    
                                                </div> 
                                                <? }?>
                                                
 <? if($row->Option_E!=''){ ?>
 <div class="radio-holder">
 <div class="col-md-1"> (E)</div>
       <input type="radio" id="radio5" class="radio" name="options_<? echo $row->id;?>" value="E" onclick="chooseAns('E','<? echo $row->id;?>')"> <label for="radio5"><? echo $row->Option_E;?> <? echo $limit_tag;?></label>                                                    
                                                </div> 
                                                <? }?>
                                                
                                                </div>
                                        </div>
                                    
                                
 
 
 <? 
 if($lt%$limit==0)
	    $pn++;
      $lt++;       
 
   }
 ?>
 
 
 
 <div class="row">
                                   <div class="col-md-12">
                                       <div class="navigate row">
                                           <div class="col-md-4 col-xs-3">
                                               
                                            <button type="button" value="Previous" style='display:none;' id="prev" onclick="prevnext(0)" class="button-nexter-left btn-block"><span class="fa fa-long-arrow-left"></span>Previous </button>
                                                                                      </div>

                                           <div class="col-md-4 col-xs-3">
                                               <button type="button" class="button-nexter-right btn-block" value='Next'  id='next' onclick="prevnext(1)"> Next<i class="fa fa-long-arrow-right"></i></button>                                           </div>

                                            <div class="col-md-4 col-xs-6 ">

                                                   <button type="submit" onclick='results()' id='res_btn' style='display:none;' class="button-nexter-submit   btn-block">Submit <span class="fa fa-chevron-down"></span></button>

                                            </div>

                                       </div>
                                   </div>
                               </div>
 
 
 
 
 <div class="row">
                                   <div class="col-md-12">
                                   
                                   
                                   
                                  
                                       <? 
									   
									   
									   
									   for($i=1; $i<=$pages; $i++){
 ?>
                                       
										   
                                       
                                           <div class="col-xs-1">
                                           <button type="button" onclick="JumpTo('<? echo $i;?>')" class="btn btn-block btn-default btn-xs examnavbtn" value="<? echo $i;?>"  id="number_nav_id_<? echo $i;?>"><? echo $i;?></button></div> 
                                           <? }?>
                                           </div></div>
 
 
 
 
 
 
 
 
 
 <!--//col-9 offset--->
 </div></div><!--row--->
 
 
<section class="result-body">
    <div class="container">
 
  <div class="row">
   <div class="col-md-9" id="result-body" style='display:none;'>
   
 <div id="msg"></div>
 
 </div></div>
 
 </div><!--container-->
 </section>
  		
        
        
        
        </div><!--/blanl-->
 
 
 
	
    
   
<script type="text/javascript">
		     var cresult=0;
			 var num_nav=$('#num_nav').html();
		     var wresult=0;
		     var currpage=0;
		     var time_out;
		     var prev=0;
		     var cstatus=0;
			 var uname="<?php echo $uname;?>";
			 var cat_id="<?php echo $catid;?>";
		     var total_pages="<?php echo $pages;?>";
			 var hm="<?php echo $hm;?>";
			 var hm2="<?php echo $hm2;?>";
		     total_pages=total_pages-1;
		     var total_ques="<?php echo   $pcount ;?>";
 function chkans(opt,ansid)
 {
	
     $ans=$('#ans_'+ansid).val()
     if ($ans==opt) {
		  cresult=parseInt(cresult)+1;
		  
     }
     else
     {
		  wresult=parseInt(wresult)+1;     
	 
     }
 
 }
  function prevnext(opt) {
	
    $('.disp_'+currpage).css('display','none');
    
    if (opt=="1") {
	currpage=parseInt(currpage)+1;
	document.getElementById('num_nav').innerHTML=(currpage)+1;
    }
    else
     {
	currpage=parseInt(currpage)-1;
	document.getElementById('num_nav').innerHTML= 1+currpage;	     
     }
      
     if (currpage>=total_pages) {
	 $('#next').css('display','none');
	  
	  
	 $('#res_btn').css('display','block');
	cstatus=1;
	
     }
     else{
	 $('#next').css('display','block');
	  $('#res_btn').css('display','none');
     }
    
     if (currpage<=0)
      {
	 $('#prev').css('display','none'); 	     
      }
        else{
		       
	 $('#prev').css('display','block'); 	     
     }
     if (cstatus==1) {
	$('#prev').css('display','none');
	  	    	
     }
    $('.disp_'+currpage).css('display','block'); 
 }
 
 
 function JumpTo(opt) {
	
    $('.disp_'+currpage).css('display','none');
    
    
	currpage=parseInt(opt-1);
	document.getElementById('num_nav').innerHTML=opt;
    
      
     if (currpage>=total_pages) {
	 $('#next').css('display','none');
	  
	  
	 $('#res_btn').css('display','block');
	cstatus=1;
	
     }
     else{
	 $('#next').css('display','block');
	  $('#res_btn').css('display','none');
     }
    
     if (currpage<=0)
      {
	 $('#prev').css('display','none'); 	     
      }
        else{
		       
	 $('#prev').css('display','block'); 	     
     }
     if (cstatus==1) {
	$('#prev').css('display','none');
	  	    	
     }
    $('.disp_'+currpage).css('display','block'); 
 }
 
 
 
 function chooseAns(opt,ques_id)
 {
	 var student_id = "<? echo $student_datail_list->StudentId;?>";
	 var cat_id = "<? echo $cat_id;?>";
	var sub_id = "<? echo $sub_id;?>";
	var exam_id = "<? echo $exam_id;?>";
	var score = 0;
	var ans= $('#ans_'+ques_id).val();
     if (ans==opt) {
		 score = 1;
     }
	    
	   $.ajax({//Make the Ajax Request
                    type: "POST",
                    url: "update_quiz_ans.php",
                    data:{studentid:student_id,catid:cat_id,subid:sub_id,choosopt:opt,quesid:ques_id,tscore:score,exam_id:exam_id},
                    /*success: function(data){
			
                 $('#error_msg').html(""); 
                 $('#msg').html(data);
				

                    }*/
                });
	
 }
 
 
 function results()
 {
	info = [];     
	var exam_id = "<? echo $exam_id;?>";
	var total_question = "<? echo $question_limit;?>";
	var question_id = <? echo json_encode($CurrentQurrentIDs); ?>;  
	$tcans=	cresult;
	$twans=	wresult;
	$examtime=$('#countdown').html();
	$('#cans').html($tcans);
	$('#wans').html($twans);
	$('#marks').html(cresult);
	$('#test-body').css('display','none');
	$('#timee').remove('div');
	//document.getElementById('countdown').innerHTML="00:00:00";
	$('#result-body').css('display','block');
	   $.ajax({//Make the Ajax Request
                    type: "POST",
                    url: "update_quiz_ans.php",
                    data:{view_result:"yes",examid:exam_id,tquestion:total_question,question_ids:question_id,subject:"<? echo $Quiz_sub_Detail->subject_name;?>"},
                    success: function(data){
			
                       $('#error_msg').html(""); 
                 $('#msg').html(data);
				 
                    }
                });
	
 }
     function count() {
     
    var startTime = document.getElementById('countdown').innerHTML;
    var pieces = startTime.split(":");
    var time = new Date();
    time.setHours(pieces[0]);
    time.setMinutes(pieces[1]);
    time.setSeconds(pieces[2]);
    var timedif = new Date(time.valueOf() - 1000);
    var newtime = timedif.toTimeString().split(" ")[0];
    document.getElementById('countdown').innerHTML=newtime;
    if (newtime=="00:00:00") {
		     clearTimeout(time_out);
		     $('#timee').css('display','none');
		     alert("Sorry!!your time is over..")
		      $('#next').css('display','none');
	  $('#top_next').css('display','none');
	  
	 $('#res_btn').css('display','block');
	cstatus=1;
	$('#prev').css('display','none');
	 $('#top_prev').css('display','none');
	results();
	 
	
	
    }
    time_out= setTimeout(count, 1000);
}
count();
</script>
    
    
<?php include($_SERVER['DOCUMENT_ROOT']."/student/design/footer.html");
}
unset($_SESSION['SubId']);
unset($_SESSION['CatId']);
ob_end_flush();?>
