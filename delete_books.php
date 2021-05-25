 <?php
 
 include "connection.php";
 
	  $id=$_GET["id"];
      mysqli_query($link,"delete from add_books where id=$id");

 
 
 ?>
 
   <script type="text/javascript">
 
    window.location="display_books.php"
 
   </script>