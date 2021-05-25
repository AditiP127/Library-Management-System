<?php
     session_start();
	 if(!isset($_SESSION["librarian"]))
	 {
		 ?>
		 <script type="text/javascript">
			window.location="login.php";
		 </script>
		 <?php
	 }

	 include "header.php";
	 include "connection.php"
?>
<html>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3></h3>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>send message to student</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/from-data">
								<table class="table table-bordered">
								     <tr>
									     <td>
											<select class="form-control" name="dusername">
												<?php 
													$res= mysqli_query($link,"select * from student_registration");
													while($row=mysqli_fetch_array($res))
													{
												?>
														<option value="<?php echo $row["username"] ?> ">
															<?php
																echo $row["username"]."(".$row["enrollment"] .")";
															?>
														</option>
												<?php
													}
												?>
												
											</select>
										 </td> 
									 </tr>
									 <tr>
										<td>
											<input type="text" class="form-control" name="title" placeholder="enter title" >
										</td>
									 </tr>
									 
									  <tr>
										<td>
											Message<br>
											<textarea name="msg" class="form-control" ></textarea>
										</td>
									 </tr>
									 
									 <tr>
										<td>
											<input type="submit" name="submit1" value="send message">
											
										</td>
									 </tr>
									 
									 
									 
								</table>
								</form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
		<?php
		    if(isset($_POST["submit1"]))
			{
				mysqli_query($link,"insert into messages values('','$_SESSION[librarian]','$_POST[dusername]','$_POST[title]','$_POST[msg]','n')") or die(mysqli_error($link));
				?>
				<script type="text/javascript">
				    alert("message send susscessfully");
				</script>
				<?php
			}
		?>
		
</html>
<?php
    include "footer.php";
?>