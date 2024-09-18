<?php
session_start();

if (!isset($_SESSION['login_active'])) {
  header("Location: adminlogin.php");
  exit();
}
?>

<?php  include'header.php'; ?>




 <!-- Content wrapper -->
      <div class="content-wrapper">

        <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">

            <h5>Manage Questions</h5>
             <?php

  if("". $_SESSION['failed'] ."")
  {
    $show= "". $_SESSION['failed'] ."";
    ?>

    <div class="alert alert-danger" role="alert">
      <?php echo $show;
      unset($_SESSION['failed']);
       ?>
    </div>
    <?php
  }

 ?>
       <?php

  if("". $_SESSION['success'] ."")
  {
    $show= "". $_SESSION['success'] ."";
    ?>

    <div class="alert alert-success" role="alert">
      <?php echo $show;
      unset($_SESSION['success']);
       ?>
    </div>
    <?php
  }

 ?>

<div class="row">
  <div class="col-lg-12 mb-4 order-0">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-12">

          <div class="card-body">
           		<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Add New Question</button>

				<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-lg">
				    <div class="modal-content">
				      <div class="p-3">
				      	<p>Please Fill the Details to Add New Question</p>
				      	<form class="border border-primary p-2" method="post" action="backend.php">
				      		<div class="row">
				      			<div class="col-sm-12">
				      				<label>Question <span class="text-danger">*</span></label>

				      			<textarea name="Question" class="form-control" required></textarea>
				      			</div>

				      			<div class="col-sm-6">
				      				<label>Option 1</label>
				      				<input type="text" class="form-control" placeholder="Option 1" name="option1" required>
				      			</div>
				      			<div class="col-sm-6">
				      				<label>Option 2</label>
				      				<input type="text" class="form-control" placeholder="Option 1" name="option2" required>
				      			</div>
				      			<div class="col-sm-6">
				      				<label>Option 3</label>
				      				<input type="text" class="form-control" placeholder="Option 1" name="option3" required>
				      			</div>
				      			<div class="col-sm-6">
				      				<label>Option 4</label>
				      				<input type="text" class="form-control" placeholder="Option 1" name="option4" required>
				      			</div>
				      			


				      				<div class="col-sm-12">
				      				<label>Correct Answer will option:</label>
				      				<select class="form-control" name="correct_answer" required>
				      					<option selected disabled> Please Select</option>
				      					<option>1</option>
				      					<option>2</option>
				      					<option>3</option>
				      					<option>4</option>
				      				</select>
				      			</div>
     						   </div>
     						   <br>

				      		<div class="text-center">
				      			<button type="submit" name="new_question" class="btn btn-success">Submit Details</button>
				      		</div>

				      	</form>
				      </div>
				    </div>
				  </div>
				</div>
				<hr>
          	<h5>Manage Questions</h5>
          	  <div class="table-responsive text-nowrap">
          	<table class="table" id="myTable">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Question</th>
				      <th scope="col"> Option 1</th>
				      <th scope="col">Option 2</th>
				      <th scope="col">Option 3</th>
				      <th scope="col">Option 4</th>
				      <th scope="col">Correct Answer</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php
				  	include'../../connect.php';
				  	$query1= "SELECT * FROM `questions` ORDER BY `qid` DESC";
				  	$run1= mysqli_query($conn,$query1);
				  	while($data1= mysqli_fetch_assoc($run1))
				  	{
				  		?>
				  		<tr>
				  			<td><?php echo $q_id= $data1['qid']; ?></td>
				  			<td><?php echo $data1['question']; ?></td>

				  			<?php $query2="SELECT * FROM `answers` WHERE `ans_id`='$q_id'";
				  						$run2= mysqli_query($conn,$query2);
				  						while($data2= mysqli_fetch_assoc($run2))

				  						{
				  							?>
				  							<td><?php echo $data2['answer']; ?></td>
				  							

				  							<?php
				  						}


				  						  ?>

				  						  <td><span class="badge bg-success"><?php $ans_id= $data1['ans_id'];
				  						  					$query3="SELECT * FROM `answers` WHERE `aid`='$ans_id'";
				  												$run3= mysqli_query($conn,$query3);
				  												$data3= mysqli_fetch_assoc($run3);
				  												echo $data3['answer'];

				  						   ?></span></td>

				  						   <td>
				  						   	<form method="post" action="backend.php">

				  						   		<input type="hidden" value="<?php echo $q_id; ?>" name="q_id">
				  						   		<button type="submit" name="delete" class="badge bg-danger">Remove</button>
				  						   	</form>
				  						   </td>
				  		</tr>

				  		<?php
				  	}


				  	?>


				  </tbody>
				</table>
			</div>


          </div>
        </div>

      </div>
    </div>
  </div>


<?php  include'footer.php'; ?>
