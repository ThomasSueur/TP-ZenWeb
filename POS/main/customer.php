<html>
<head>
<title>
POS
</title>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
</head>
<body>
<div id="maintable"><div style="margin-top: -19px; margin-bottom: 21px;">
<a id="addd" href="index.php" style="float: none;">Retour</a>
</div>
<input type="text" name="filter" value="" id="filter" placeholder="Search Customer..." autocomplete="off" /><a rel="facebox" id="addd" href="addcustomer.php">Ajouter un utilisateur</a><br><br>
<table id="resultTable" data-responsive="table">
	<thead>
		<tr>
			<th width="5%"> Nom </th>
			<th width="21%"> Adresse </th>
			<th width="11%"> Contacte </th>
			<th width="11%"> Numero de membre </th>
			<th width="12%"> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				include('../connect.php');
				$result = $db->prepare("SELECT * FROM customer ORDER BY customer_id DESC");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['customer_name']; ?></td>
			<td><?php echo $row['address']; ?></td>
			<td><?php echo $row['contact']; ?></td>
			<td><?php echo $row['membership_number']; ?></td>
			<td><a rel="facebox" href="editcustomer.php?id=<?php echo $row['customer_id']; ?>"> Editer </a> | <a href="#" id="<?php echo $row['customer_id']; ?>" class="delbutton" title="Click To Delete">Supprimer</a></td>
			</tr>
			<?php
				}
			?>
		
	</tbody>
</table>
<div class="clearfix"></div>
</div>
<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deletecustomer.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</body>
</html>
