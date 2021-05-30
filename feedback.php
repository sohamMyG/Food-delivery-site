
<?php
include("inc/connect.inc.php");

session_start();
if (isset($_SESSION['user_login'])) {
}
else {
	header("location: index.php");
}
?>


<?php 
    include("includes/header.php");
    if(isset($_POST['submit']))
    {
      $name=$_POST['name'];
      $age=$_POST['age'];
      $paragraph_text1=$_POST['paragraph_text1'];
      $paragraph_text2=$_POST['paragraph_text2'];
      $paragraph_text3=$_POST['paragraph_text3'];
      $paragraph_text4=$_POST['paragraph_text4'];
      $un=$_POST['un'];
  
      $query ="INSERT INTO feedback(`name`,`age`,`text1`,`text2`,`text3`,`text4`,`feedback`) VALUES ('$name','$age','$paragraph_text1','$paragraph_text2','$paragraph_text3','$paragraph_text4','$un')";
  
      $query_run = mysqli_query($conn,$query);
      $success_message = '<h4 class="m-5 text-center">Thank You For Your Feedback!</h4>
            <a href="index.php" style="display:block; margin-left:45%;"> Go to Home </a>';
    }
  
?>



<?php if(isset($success_message)) {echo $success_message;}
    else{ echo '
        
    
<h2 class="text-center mt-5">Feedback Form</h2>
            <div style="display:flex;justify-content:center;">
        	<form action="feedback.php" method="POST" class="feedback mt-5" style="margin-bottom:5rem;">
        		
        			<label for="name">Name:<br><input type="text" id="name" name="name"></label>
                    <label for="age">Age :<select name="age">
                                <option value="">Select Any one</option>
                                <option value="10-20">10 to 20</option>
                                <option value="20-30">20 to 30</option>
                                <option value="30-40">30 to 40</option>
                                <option value="40-">40 and above</option>
                    </select></label>   
			        		
        			<label for="paragraph_text1"> What was your first impression when you entered the website?<br><textarea name="paragraph_text1" cols="70" rows="4"> </textarea></label>	
			        		
			        <label for="paragraph_text2">How did you first hear about us?<br><textarea name="paragraph_text2" cols="70" rows="4"> </textarea></label>		
			        	
        			<label for="paragraph_text3">Is there anything missing on this page?<br><textarea name="paragraph_text3" cols="70" rows="4"> </textarea></label>
        			
			        <label for="paragraph_text4"></label>
			        		 How likely are you to recommend us to a friend or colleague?<br>
			        		<textarea name="paragraph_text4" cols="70" rows="4"> </textarea>

                        
                    
                    <div>
                    <label for="un">Overall rating for website:</label>                      
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="un" id="exampleRadios1" value="Unsatisfactory" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Unsatisfactory
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="un" id="exampleRadios2" value="Satisfactory">
                    <label class="form-check-label" for="exampleRadios2">
                        Satisfactory
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="un" id="exampleRadios3" value="Good">
                    <label class="form-check-label" for="exampleRadios3">
                        Good
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio" name="un" id="exampleRadios4" value="Excellent">
                    <label class="form-check-label" for="exampleRadios4">
                        Excellent
                    </label>
                    </div>
                    </div>  
			        <input type="submit" name="submit" value="Submit">			        
			        
			    </table>
            </form>
            </div>
 '; } ?>	        

<?php include("includes/footer.php"); ?>