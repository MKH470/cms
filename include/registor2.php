<?php


	else{

		$sql_username= mysqli_query($conn , "SELECT 'user-name' FROM 'formuser' WHERE 'user-name' ='$name'");

	    $sql_email= mysqli_query($conn,"SELECT 'user-email' FROM 'formuser' WHERE 'user-email'= '$email' ");

	    if(mysqli_num_rows ($sql_username)>0){
	         echo '<div class="alert alert-danger" role="alert"><i class="fa fa-bell-o" aria-hidden="true"></i> The username already exists choose a different name </div>'.'<br/>';
	       }

	    elseif (mysqli_num_rows ($sql_email)>0) {
	         echo '<div class="alert alert-danger" role="alert"><i class="fa fa-bell-o" aria-hidden="true"></i> The user-email already exists choose a different email </div>'.'<br/>';}
	   else{ 
	     
           
                   
              
              	
              		
	                      
                            $Password=md5($_POST['pass']);
	                            $insert="INSERT INTO 'formuser' ('user-name',
	                                                  'user-email',
	                                                  'user-pass',
	                                                  'gender',
	                                                  'avatar',
	                                                  'useer-comment',
	                                                  'linkedin',
	                                                  'date',
	                                                  'role') 
	                                                  VALUES (
                                                            '$name',
	                                                        '$email',
	                                                        '$Password',
	                                                        '$gender',
	                                                        '$image_db ',
	                                                        '$about',
	                                                        '$linkedin',
	                                                        '$date',
	                                                        'user'

	                                                            )"; 
                                $insert_sql=mysqli_guery($conn,$insert);

                               if(isset($insert_sql)){
                                                        	echo '<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> your membership has been successfully registered.</div>';
                                                        }



	                      }
	                  




              		}
              		






              	}
              	
              
              


              }
	          

}
}
	}                   
 }
?>

$Password=md5($_POST['pass']);
           $insert="INSERT INTO 'formuser' ('user-name',
	                                                  'user-email',
	                                                  'user-pass',
	                                                  'gender',
	                                                  'avatar',
	                                                  'useer-comment',
	                                                  'linkedin',
	                                                  'date',
	                                                  'role') 
	                                                  VALUES (
                                                            '$name',
	                                                        '$email',
	                                                        '$Password',
	                                                        '$gender',
	                                                        '$image_db ',
	                                                        '$about',
	                                                        '$linkedin',
	                                                        '$date',
	                                                        'user'

	                                                            )";
	        $insert_sql=mysqli_guery($conn,$insert);
	        if(isset($insert_sql)){
                    echo '<div class="alert alert-success" role="alert"> <i class="fa fa-check" aria-hidden="true"></i> your membership has been successfully registered.</div>';
                         }

             