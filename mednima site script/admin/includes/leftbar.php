<div class="left-sidebar bg-black-300 box-shadow ">
                        <div class="sidebar-content">
                            <div class="user-info closed">
                                <img src="http://placehold.it/90/c2c2c2?text=User" alt="John Doe" class="img-circle profile-img">
                                <h6 class="title">Admin</h6>
                                <small class="info"><?php echo SCHOOL_NAME;?></small>
                            </div>
                            <!-- /.user-info -->

                            <div class="sidebar-nav">
                                <ul class="side-nav color-gray">
                                    <li class="nav-header">
                                        <span class="">Main Category</span>
                                    </li>
                                    <li>
                                        <a href="<?php echo SITE_URL;?>admin/index.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>
                                     
                                    </li>

                                    <li class="nav-header">
                                        <span class="">Appearance</span>
                                    </li>
                                    
                                    
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-info-circle"></i> <span>Home Page Slider</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            
                                            <li><a href="<?php echo SITE_URL;?>admin/manage-slider.php"><i class="fa fa fa-server"></i> <span>Manage Slider Photos</span></a></li>
                                           
                                        </ul>
                                        </li>
                                     
                                    
                                    
                                    
                                     
                                     <li class="has-children">
                                        <a href="#"><i class="fa fa-info-circle"></i> <span>Gallery</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="<?php echo SITE_URL;?>admin/upload-image.php"><i class="fa fa-bars"></i> <span>Add To Gallery</span></a></li>
                                            <li><a href="<?php echo SITE_URL;?>admin/manage-gallery.php"><i class="fa fa fa-server"></i> <span>Manage Gallery</span></a></li>
                                           
                                        </ul>
                                        </li>
                                     
                                     
                                     
                                     
                                     
                                     <li class="has-children">
                                        <a href="#"><i class="fa fa-info-circle"></i> <span>News</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="<?php echo SITE_URL;?>admin/create-news.php"><i class="fa fa-bars"></i> <span>Post News</span></a></li>
                                            <li><a href="<?php echo SITE_URL;?>admin/manage-news.php"><i class="fa fa fa-server"></i> <span>Manage News</span></a></li>
                                           
                                        </ul>
                                        </li>
                                        
                                        
                                        
                                        <li class="has-children">
                                        <a href="#"><i class="fa fa-info-circle"></i> <span>P.T.A Meeting</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="<?php echo SITE_URL;?>admin/create-pta-news.php"><i class="fa fa-bars"></i> <span>Post P.T.A News</span></a></li>
                                            <li><a href="<?php echo SITE_URL;?>admin/manage-pta-news.php"><i class="fa fa fa-server"></i> <span>Manage P.T.A News</span></a></li>
                                           
                                           <li><a href="<?php echo SITE_URL;?>admin/manage-pta-exco.php"><i class="fa fa fa-server"></i> <span>Manage P.T.A Excos</span></a></li>
                                           
                                        </ul>
                                        </li>
                                        
                                        
                                        
                                        <li class="has-children">
                                        <a href="#"><i class="fa fa-info-circle"></i> <span>Events</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="<?php echo SITE_URL;?>admin/create-events.php"><i class="fa fa-bars"></i> <span>Post Events</span></a></li>
                                            <li><a href="<?php echo SITE_URL;?>admin/manage-events.php"><i class="fa fa fa-server"></i> <span>Manage Events</span></a></li>
                                           
                                        </ul>
                                        </li>
                                        
                                        
                                        
                                        <li class="has-children">
                                        <a href="#"><i class="fa fa-info-circle"></i> <span>CBT</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                              
                              <!-- cbt questions-->
                               <li class="has-children">
                                        <a href="#"><i class="fa fa-info-circle"></i> <span>CBT Questions</span> <i class="fa fa-angle-right arrow"></i></a>
                                       
                                       <ul class="child-nav">
                                       <li><a href="<?php echo SITE_URL;?>admin/add-cbt-question.php"><i class="fa fa-plus"></i> <span>Add CBT Question</span></a></li>
                                       <li><a href="<?php echo SITE_URL;?>admin/manage-cbt-questions.php"><i class="fa fa fa-server"></i> <span>Manage CBT Questions</span></a></li>
                                       </ul> 
                                        </li>
                                      <!-- //cbt questions-->  
                                        
                              <!-- cbt subjects-->
                               <li class="has-children">
                                        <a href="#"><i class="fa fa-info-circle"></i> <span>CBT Subject</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                              
                                            <li><a href="<?php echo SITE_URL;?>admin/create-cbt-subject.php"><i class="fa fa-bars"></i> <span>Create CBT Subject</span></a></li>
                                           
                                            <li><a href="<?php echo SITE_URL;?>admin/manage-cbt-subjects.php"><i class="fa fa fa-server"></i> <span>Manage CBT Subjects</span></a></li>
                                           <li><a href="<?php echo SITE_URL;?>admin/add-cbt-subjectcombination.php"><i class="fa fa-newspaper-o"></i> <span>Add CBT Subject Combination </span></a></li>
                                           
                                           <a href="<?php echo SITE_URL;?>admin/manage-cbt-subjectcombination.php"><i class="fa fa-newspaper-o"></i> <span>Manage CBT Subject Combination </span></a></li>
                                        
                                        </ul>
                                        </li>
                                        <!--/cbt subjects-->
                                        
                                        
                                        
                                        
                                        <!-- cbt categories-->
                               <li class="has-children">
                                        <a href="#"><i class="fa fa-info-circle"></i> <span>CBT Exam Categories</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                              
                                            
                                            <li><a href="<?php echo SITE_URL;?>admin/create-cbt-category.php"><i class="fa fa-bars"></i> <span>Create CBT Category</span></a></li>
                                            <li><a href="<?php echo SITE_URL;?>admin/manage-cbt-category.php"><i class="fa fa fa-server"></i> <span>Manage CBT Categories</span></a></li>
                                           
                                        
                                        </ul>
                                        </li>
                                        <!--/cbt categories-->
                                        <li><a href="<?php echo SITE_URL;?>admin/cbt-settings.php"><i class="fa fa fa-cog"></i> <span>CBT Settings</span></a></li>
                                        </ul>
                                        </li>
                                    
                                  
                                    
                                    <li class="has-children">
                                        <a href="#"><i class="fa fa-file-text"></i> <span>Student Classes</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="<?php echo SITE_URL;?>admin/create-class.php"><i class="fa fa-bars"></i> <span>Create Class</span></a></li>
                                            <li><a href="<?php echo SITE_URL;?>admin/manage-classes.php"><i class="fa fa fa-server"></i> <span>Manage Classes</span></a></li>
                                           
                                        </ul>
                                    </li>
  <li class="has-children">
                                        <a href="#"><i class="fa fa-file-text"></i> <span>Subjects</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="<?php echo SITE_URL;?>admin/create-subject.php"><i class="fa fa-bars"></i> <span>Create Subject</span></a></li>
                                            <li><a href="<?php echo SITE_URL;?>admin/manage-subjects.php"><i class="fa fa fa-server"></i> <span>Manage Subjects</span></a></li>
                                           <li><a href="<?php echo SITE_URL;?>admin/add-subjectcombination.php"><i class="fa fa-newspaper-o"></i> <span>Add Subject Combination </span></a></li>
                                           <a href="<?php echo SITE_URL;?>admin/manage-subjectcombination.php"><i class="fa fa-newspaper-o"></i> <span>Manage Subject Combination </span></a></li>
                                        </ul>
                                    </li>
   
   
   
   
   <li class="has-children">
                                        <a href="#"><i class="fa fa-users"></i> <span>Teachers</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="<?php echo SITE_URL;?>admin/add-teacher.php"><i class="fa fa-bars"></i> <span>Add Teacher</span></a></li>
                                            <li><a href="<?php echo SITE_URL;?>admin/manage-teachers.php"><i class="fa fa fa-server"></i> <span>Manage Teacher</span></a></li>
                                           
                                        </ul>
                                    </li>
   
   
   
   
   
   
   <li class="has-children">
                                        <a href="#"><i class="fa fa-users"></i> <span>Students</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="<?php echo SITE_URL;?>admin/add-students.php"><i class="fa fa-bars"></i> <span>Add Students</span></a></li>
                                            <li><a href="<?php echo SITE_URL;?>admin/manage-students.php"><i class="fa fa fa-server"></i> <span>Manage Students</span></a></li>
                                           
                                        </ul>
                                    </li>
                                    
                                    
                                    
                                     <li class="has-children">
                                        <a href="#"><i class="fa fa-users"></i> <span>Parent</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="<?php echo SITE_URL;?>admin/add-parent.php"><i class="fa fa-bars"></i> <span>Add Parent</span></a></li>
                                            <li><a href="<?php echo SITE_URL;?>admin/manage-parents.php"><i class="fa fa fa-server"></i> <span>Manage Parent</span></a></li>
                                            
                                            <li><a href="<?php echo SITE_URL;?>admin/manage-pta-exco.php"><i class="fa fa fa-server"></i> <span>Manage P.T.A Excos</span></a></li>
                                           
                                        </ul>
                                    </li>
                                    
                                    
<li class="has-children">
                                        <a href="#"><i class="fa fa-info-circle"></i> <span>Result</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="<?php echo SITE_URL;?>admin/add-result.php"><i class="fa fa-bars"></i> <span>Add Result</span></a></li>
                                            <li><a href="<?php echo SITE_URL;?>admin/manage-results.php"><i class="fa fa fa-server"></i> <span>Manage Result</span></a></li>
                                           
                                        </ul>
                                        
                                        
                                        
                                        <li class="has-children">
                                        <a href="#"><i class="fa fa-info-circle"></i> <span>Scratch Card</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="<?php echo SITE_URL;?>admin/generate-cards.php"><i class="fa fa-bars"></i> <span>Generate Cards</span></a></li>
                                            
                                            <li><a href="<?php echo SITE_URL;?>admin/used-cards.php"><i class="fa fa-bars"></i> <span>View Used Cards</span></a></li>
                                            
                                            
                                            <li><a href="<?php echo SITE_URL;?>admin/manage-cards.php"><i class="fa fa fa-server"></i> <span>Manage Scratch Cards</span></a></li>
                                           
                                        </ul>
                                        </li>
                                        
                                        
                                        
                                        
                                         <li class="has-children">
                                        <a href="#"><i class="fa fa-info-circle"></i> <span>School Fees</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="<?php echo SITE_URL;?>admin/create-fees.php"><i class="fa fa-bars"></i> <span>Add New Fee</span></a></li>
                                            
                                            <li><a href="<?php echo SITE_URL;?>admin/manage-fees.php"><i class="fa fa-bars"></i> <span>Manage School Fees</span></a></li>
                                            
                                            
                                            
                                           
                                        </ul>
                                        </li>
                                        
                                        
                                         <li class="has-children">
                                        <a href="#"><i class="fa fa-info-circle"></i> <span>Settings</span> <i class="fa fa-angle-right arrow"></i></a>
                                        <ul class="child-nav">
                                            <li><a href="<?php echo SITE_URL;?>admin/global-settings.php"><i class="fa fa-bars"></i> <span>Global Settings</span></a></li>
                                            
                                            <li><a href="<?php echo SITE_URL;?>admin/home-settings.php"><i class="fa fa-bars"></i> <span>Homepage Settings</span></a></li>
                                            
                                            <li><a href="<?php echo SITE_URL;?>admin/page-settings.php"><i class="fa fa fa-server"></i> <span> Site Pages Settings</span></a></li>
                                            
                                            
                                        <li><a href="<?php echo SITE_URL;?>admin/change-password.php"><i class="fa fa fa-server"></i> <span> Change Password</span></a></li>    
                                           
                                        </ul>
                                        </li>
                                        
                                           
                                    
                            </div>
                            <!-- /.sidebar-nav -->
                        </div>
                        <!-- /.sidebar-content -->
                    </div>