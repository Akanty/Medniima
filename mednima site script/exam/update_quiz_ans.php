<?php
include('../controller/header.php');
if(!empty($_POST["studentid"])) 
{
	$table = "quiz_result";
	$student_id = $_POST["studentid"];
	$cat_id = $_POST["catid"];
	$sub_id = $_POST["subid"];
	$ques_id = $_POST["quesid"];
	$choose_ans = $_POST["choosopt"];
	$score = $_POST["tscore"];
	$exam_id = $_POST["exam_id"];
	
	$InsertData = array(
			'student_id' => $student_id,
			'cat_id' => $cat_id,
			'sub_id' =>  $sub_id,
			'ques_id'=> $ques_id,
			'choose_ans'=> $choose_ans,
			'score' => $score,
			'exam_id' => $exam_id
			);

 $CheckAnswer = $db->query("SELECT * FROM $table WHERE student_id='$student_id' and cat_id='$cat_id' and sub_id='$sub_id' and ques_id='$ques_id' ");
 if($CheckAnswer->num_rows < 1){
	 $insertAnswer = $iSMartFUN->insertTable($table,$InsertData);
 
 }else{
	$db->query("UPDATE $table SET choose_ans='$choose_ans', score='$score' WHERE student_id='$student_id' and cat_id='$cat_id' and sub_id='$sub_id' and ques_id='$ques_id' and exam_id='$exam_id'");
	 
 }
  }
  
  
  
  if(!empty($_POST["view_result"])) 
{
	
	$exam_id = $_POST["examid"];
	$total_question = $_POST["tquestion"];
	$subject = $_POST["subject"];
	$question_id = $_POST["question_ids"];
	$GetScore = $db->query("SELECT SUM(score) as total_score FROM `quiz_result` WHERE exam_id ='$exam_id'");
	$GetScore_ = $GetScore->fetch_object();
	
	if($GetScore_->total_score ==""){
	$student_total_score = 0;	
	}else{
	$student_total_score = $GetScore_->total_score;	
	}
	
	
	?>
	
	<div class="result-bg text-center">
                    <img class="img-responsive" src="/images/result.png">
                    <p>You Scored <span><? echo $student_total_score;?> / <? echo $total_question;?></span> in <? echo $subject;?></p>
                   
                </div>
                
                
                
                <?  for($j=0; $j<count($question_id);$j++){
					$qid = ($j+1);
	$Quection_check_condtion['where'] = array('id' => $question_id[$j]);
	$Quection_check_condtion['return_type'] = 'single'; 
	$Question_Details = $iSMartFUN->getTRows("quiz_questions",$Quection_check_condtion);
	
			//get the student answer for the question if any
		$CheckAnswer = $db->query("SELECT * FROM quiz_result WHERE exam_id='$exam_id' and ques_id='$question_id[$j]'");
		if($CheckAnswer->num_rows > 0){
			$choosed_ans = $CheckAnswer->fetch_object();
			$student_ans = $choosed_ans->choose_ans;
			
		}else{
		$student_ans = "Nothing";
		}
					?>
               
                <div class="rslt-bg">
                        <div class="result-hdr">
                            <h4>Question <? echo $qid;?>  </h4>
                        </div>
                                                <? echo $Question_Details->Question;?>
                        <br>
                        <div class="space"></div>
                        <ul>
                                                                                                                                                                        
                                                                                                                                            

                                                                                                                                            

                            

                            <div class="radio-holder text- ">
                                A. <label for="radio10"><? echo $Question_Details->Option_A;?> <span class=" "></span> </label>
                            </div>
                            <div class="radio-holder text- ">
                                B. <label for="radio20"><? echo $Question_Details->Option_B;?> <span class=" "></span> </label>
                            </div>
                            <div class="radio-holder text- ">
                                C. <label for="radio30"><? echo $Question_Details->Option_C;?> </label>
                            </div>
                             <? if($Question_Details->Option_D!=''){ ?>
                            <div class="radio-holder text- ">
                                D. <label for="radio40"><? echo $Question_Details->Option_D;?> <span class=" "></span> </label>
                            </div> 
                            <? }?>
                            
                            <? if($Question_Details->Option_E!=''){ ?>
                             <div class="radio-holder text- ">
                                E. <label for="radio40"><? echo $Question_Details->Option_E;?> <span class=" "></span> </label>
                            </div> 
                            <? }?>
                                                   
                        </ul>

                        <hr> 
                        <span class="grey">You Chose: </span><span class="text-danger"> <? echo $student_ans;?></span>  <br>
                        <span class="grey">Correct Answer is:</span> <? echo $Question_Details->Answer;?> <br>

                        <div class="space10"></div>
                        <div class="question-text">
                            <div class="explain"> <span class="labelmi label-exams">Explanation</span></div>                                    
                            
                                                                                    <span class="text-info"><? echo $Question_Details->Answer;?> is the correct option.</span>                                                                                </div>

                        <!--<div class="accordion" id="my-accordion">
                            <div class="accordion-group">
                                <div class="accordion-heading flag-error">
                                    <a href="#collapse-0" data-toggle="collapse" data-parent="#my-accordion" class="accordion-toggle ">Report Error</a>
                                </div>
                                <div class="accordion-body collapse" id="collapse-0">
                                    <div class="accordion-inner">
                                        <form class="contact0" name="contact0" onsubmit="return false;">
                                            <input type="hidden" name="details" value="<? echo $Question_Details->Question;?><br>
                                                OptionA: <? echo $Question_Details->Option_A;?><br>
                                                OptionB: <? echo $Question_Details->Option_B;?><br>
                                                OptionC: <? echo $Question_Details->Option_C;?><br>
                                                OptionD: <? echo $Question_Details->Option_D;?><br>
                                                OptionE: <? echo $Question_Details->Option_E;?><br>
                                                Ans Choose: <br>
                                                Correct Ans: <? echo $Question_Details->Answer;?>">
                                           
                                           <input type="hidden" name="id" value="<? echo $question_id[$j];?>">
                                           
                                            <textarea name="message" id="message" class="form-control" placeholder="Comment"></textarea>
                                            <button type="submit" id="report0" class="btn-xs btn-success btn-right">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                    </div>

    
    <? }?>
    
    
	
<? }
  
  
  ?>


