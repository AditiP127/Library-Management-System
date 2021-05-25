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

     include "connection.php";
	 include "header.php";
?>
<html>
        <!-- page content area main -->
        <div class="right_col" role="main">
            <div class="">
                <div class="page-title">
                    <div class="title_left">
                        <h3></h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                       
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
                <div class="row" style="min-height:500px">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Add Books Info</h2>

                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                               <form name="form1" action="" method="post" class="col-lg-6" enctype="multipart/from-data">
								<table class="table table-bordered">
								     <tr>
									     <td><input type="text" class="form-control" placeholder="books name" name="booksname" required=""></td> 
									 </tr>
									 
									 <tr>
									     <td><input type="file" name="myfile" id="fileToUpload"></td> 
									 </tr>
									 
									 <tr>
									     <td><input type="text" class="form-control" placeholder="books Author Name" name="bauthorname" required=""></td> 
									 </tr>
									 
									 <tr>
									     <td><input type="text" class="form-control" placeholder="publication name" name="pname" required=""></td> 
									 </tr>
									 
									 <tr>
									     <td><input type="text" class="form-control" placeholder="books purchase date" name="bpurchasedt" required=""></td> 
									 </tr>
									 
									 <tr>
									     <td><input type="text" class="form-control" placeholder="books price" name="bprice" required=""></td> 
									 </tr>
									 
									 <tr>
									     <td><input type="text" class="form-control" placeholder="books quantity" name="bqty" required=""></td> 
									 </tr>
									 
									 <tr>
									     <td><input type="text" class="form-control" placeholder="available quantity" name="aqty" required=""></td> 
									 </tr>
									 
									 <tr>
									     <td><input type="submit" name="submit1" class="btn btn-default submit" value="insert book details" style="background-color: blue; color:white"></td> 
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
			$myfile=$_POST['myfile'];
			$currentDir = getcwd();
			$uploadDirectory = "books_image/".$myfile."";
			
	$errors = []; // Store all foreseen and unforseen errors here

    $fileExtensions = ['jpeg','jpg','png']; // Get all the file extensions

    $fileName = $_FILES[$myfile]['name'];
	//echo "<script>alert('".$fileName."');</script>";
	
    $fileSize = $_FILES[$myfile]['size'];
    $fileTmpName  = $_FILES[$myfile]['tmp_name'];
    $fileType = $_FILES[$myfile]['type'];
    $fileExtension = strtolower(end(explode('.',$fileName)));

    $uploadPath = $uploadDirectory . basename($fileName);
		    if (isset($_POST['submit1'])) {

        if (! in_array($fileExtension,$fileExtensions)) {
            $errors[] = "This file extension is not allowed. Please upload a JPEG or PNG file";
        }

        if ($fileSize > 2000000) {
            $errors[] = "This file is more than 2MB. Sorry, it has to be less than or equal to 2MB";
        }

        if (empty($errors)) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($didUpload) {
                echo "The file " . basename($fileName) . " has been uploaded";
            } else {
                echo "An error occurred somewhere. Try again or contact the admin";
            }
        } else {
            foreach ($errors as $error) {
                echo $error . "These are the errors" . "\n";
            }
        }
    }
mysqli_query($link,"insert into add_books values('','$_POST[booksname]','$uploadPath','$_POST[bauthorname]','$_POST[pname]','$_POST[bpurchasedt]','$_POST[bprice]','$_POST[bqty]','$_POST[aqty]','$_SESSION[librarian]')");
			
			    ?>
				
				
				
			
</html>
<?php
    include "footer.php";
?>