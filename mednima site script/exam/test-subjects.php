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
include ($_SERVER['DOCUMENT_ROOT']."/student/engine/tophead.php");
$title = "Subjects";
include($_SERVER['DOCUMENT_ROOT']."/student/design/header.html");
include($_SERVER['DOCUMENT_ROOT']."/student/design/nav.html");

$slug = $db->real_escape_string(strip_tags($_GET['slug']));

$Quiz_cat_condition['where'] = array('slug'=> $slug);
$Quiz_cat_condition['return_type'] = 'single';
$Quiz_cat_List = $iSMartFUN->getTRows("quiz_categories",$Quiz_cat_condition);

if(!$Quiz_cat_List){
	
}else{

$query_sub = $db->query("SELECT quiz_subjectcombination.CatId, quiz_subjectcombination.SubjectId, quiz_categories.name, quiz_categories.fullname, quiz_categories.img, quiz_subjects.subject_id,quiz_subjects.subject_name,quiz_subjects.subject_desc FROM `quiz_subjectcombination` JOIN quiz_categories on quiz_categories.id = quiz_subjectcombination.CatId JOIN quiz_subjects on quiz_subjects.subject_id= quiz_subjectcombination.SubjectId WHERE quiz_subjectcombination.CatId='$Quiz_cat_List->id' order by quiz_subjects.subject_name ");

?>

 
 	<!--banner-->	
		     <div class="banner">
		    	<h2>
				Examinations & Resources Available for <?php echo $Quiz_cat_List->fullname;?>
				
				</h2>
		    </div>
		<!--//banner-->
 	 <!--faq-->
 	<div class="blank">
	

			<div class="">
				
               
               
        
           <div class="row">
            
            <? if($query_sub->num_rows > 0){
				while($Quiz_sub = $query_sub->fetch_object() ){
				$Count_question = $db->query("SELECT count(id) as total_question FROM `quiz_questions` WHERE sub_id='$Quiz_sub->subject_id'");
	$Count_total_question = $Count_question->fetch_object();
	if($Count_total_question->total_question > 0) $disabble = ''; else $disabble = 'disabled="disabled"';
				?>
            
            <div class="col-md-3">
                    <div class="subjects-bg">
                        <div class="subjects-header">
                            <h3><?php echo $Quiz_sub->subject_name;?></h3>
                            <p><?php echo $Quiz_sub->subject_desc;?> </p>
                            <hr>
                            <img class="img-responsive" src="<? echo SITE_URL;?>exam/images/<?php echo $Quiz_cat_List->img;?>" alt="">
                        </div>
                        <table class="table table-responsive">
                            <tbody>
                                <tr>
                                    <td><i class="fa fa-adn fa-2x"></i></td>
                                    <td>Questions</td>
                                    <td><?php echo $Count_total_question->total_question;?></td>
                                </tr>
                                <tr>
                                    <td><i class="fa fa-clock-o fa-2x"></i></td>
                                    <td>Duration</td>
                                    <td><? echo $iSMartFUN->minutes2(EXAM_TIME);?></td> 
                                </tr>
                            </tbody>
                        </table>
                        <div class="subjects-btn">
                        
                        <form action="<?php echo SITE_URL;?>exam/exam-instruction.php" method="post">
                        <input type="hidden" name="sub_session_id" value="<?php echo $Quiz_sub->subject_id;?>" />
                        <input type="hidden" name="cat_session_id" value="<?php echo $Quiz_sub->CatId;?>" />
                        <input type="hidden" name="subject_name" value="<?php echo $Quiz_sub->subject_name;?>" />
                        <input type="hidden" name="exam_name" value="<?php echo $Quiz_sub->name;?>" />
                        
                        <button type="submit" class="button-start btn-block" <? echo $disabble;?>><i class="fa fa-power-off"></i><span class="ml5">Start now</span></button>
                        </form>
                        
                            <!--<a href="<?php echo SITE_URL;?>student/exam-hall.php" onclick="logStartTestEvent('<?php echo $Quiz_sub->subject_id;?>')" class="button-start btn-block"><i class="fa fa-power-off"></i><span class="ml5">Start now</span></a>-->
                        </div>
                    </div>
                </div>
             
             <? }}?>
             
             
             
             </div>
            
           
           
           
           
                
	        </div>
	       </div>
	
    
    <script>
	function logStartTestEvent(sub_id){
		
		$.ajax({//Make the Ajax Request
                    type: "POST",
                    url: "exam-hall.php",
                    data:{sub_id:sub_id},
                    success: function(data){
			
                       $('#error_msg').html(""); 
                 $('#msg').html(data);
				 
                    }
                });
		
	}
	
	
	
	</script>
    
<?php include($_SERVER['DOCUMENT_ROOT']."/student/design/footer.html");

}?>
