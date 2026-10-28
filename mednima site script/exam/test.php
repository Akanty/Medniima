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
$title = "CBT Exam Categories";
include($_SERVER['DOCUMENT_ROOT']."/student/design/header.html");
include($_SERVER['DOCUMENT_ROOT']."/student/design/nav.html");

$Quiz_cat_condition['where'] = array('status'=> 1);
$Quiz_cat_condition['order_by'] = 'id ASC';
$Quiz_cat_List = $iSMartFUN->getTRows("quiz_categories",$Quiz_cat_condition);


$query = $db->query("SELECT quiz_categories.*,quiz_subjects.subject_name,quiz_subjectcombination.id as scid, COUNT(DISTINCT quiz_subjectcombination.id) as total_subject,  quiz_subjectcombination.status from quiz_subjectcombination join quiz_categories on quiz_categories.id=quiz_subjectcombination.CatId join quiz_subjects on quiz_subjects.subject_id=quiz_subjectcombination.SubjectId group by quiz_subjectcombination.CatId ");
 $cnt=1;


?>

 
 	<!--banner-->	
		     <div class="banner">
		    	<h2>
				Examinations & Resources Available
				
				</h2>
		    </div>
		<!--//banner-->
 	 <!--faq-->
 	<div class="blank">
	

			<div class="">
				
               
               
        
           <div class="row">
            
            <? if($query->num_rows > 0)
{
	while($Quiz_cat = $query->fetch_object()){
	$attempt_Count_ = $db->query("SELECT COUNT(DISTINCT exam_id) as total_attempt FROM quiz_result where cat_id='$Quiz_cat->id'");
	$attempt_Count_row = $attempt_Count_->fetch_object();
				?>
            
            <div class="col-md-4">
            <div class="exams-bg">
                <div class="exams-header">
                    <h3><?php echo $Quiz_cat->name;?></h3>
                    <p><?php echo $Quiz_cat->fullname;?></p>
                    <hr>                           
                    <img class="img-responsive" src="<? echo SITE_URL;?>exam/images/<?php echo $Quiz_cat->img;?>" alt="">
                </div>

                <table class="table table-responsive">
                    <tbody>
                       <!-- <tr>
                            <td><i class="fa fa-adn fa-2x"></i></td>
                            <td>Total Questions</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-clock-o fa-2x"></i></td>
                            <td>Number of years</td>
                            <td>17</td>
                        </tr>-->
                        <tr>
                            <td><i class="fa fa-book fa-2x"></i></td>
                            <td>Total Subjects</td>
                            <td><?php echo $Quiz_cat->total_subject;?></td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-twitch fa-2x"></i></td>
                            <td>Total Attempts</td>
                           
                                                        <td><?php echo $attempt_Count_row->total_attempt;?></td>
                        </tr>

                    </tbody>
                </table>
                <div class="exams-btn">
                    <a href="<?php echo SITE_URL;?>student/test/<?php echo $Quiz_cat->slug;?>/subject"  class="button-start btn-block"><i class="fa fa-power-off"></i><span class="ml5">Take test</span></a>
                </div>
            </div>
        </div>
             
             <? }}?>
             
             
             
             </div>
            
           
           
           
           
           
           
               
           
           
       
    
                
	        	
                
                
	        </div>
	       </div>
	
<?php include($_SERVER['DOCUMENT_ROOT']."/student/design/footer.html");?>
