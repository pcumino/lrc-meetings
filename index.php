<!DOCTYPE html>
<html>
<head>
	<title>Meetings</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">


	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<style type="text/css">
	body{
		margin: 50px;
	}
	table{
		/* border-top: solid 1px lightgray; */
		/* border: solid 2px red; */
		border-radius: 20px;
	}
	/* td{
		width: 100%;
	} */
	table td span{
		font-size: 22px;
	}
	table thead tr{
		font-size: 15pt;
	}
	</style>
</head>
<body>





	<pre style="font-size: 8pt;"><?php
	include "functions.php";

	$db_arr = get_db();

	// print_r($db_arr);
	?>
	</pre>






	<h1>Semester Meetings</h1>
	<div class="row">
		<div class="col-6 text-left">
			<a class="btn btn-info" href="uploadfile.php">Upload file</a>
		</div>
	</div>
	<br>
<?php
for ($i=0; $i < sizeof($db_arr); $i++) {
	?>
	<div class="panel panel-default">
		<table class="table table-striped">
			<thead>
				<tr>
					<th class="text-center" colspan="3" style="background-color:lightgray;"> <?php echo $db_arr[$i]["date"]; ?> </th>
				</tr>
				<tr>
					<th>Student</th>
					<th colspan="2">Title</th>
				</tr>
			</thead>
			<tbody>

				<?php for ($j=0; $j < sizeof($db_arr[$i]["presentations"]); $j++) { ?>
					<tr>
						<td> <?php echo $db_arr[$i]["presentations"][$j]["student_name"]; ?> </td>
						<td> <?php echo $db_arr[$i]["presentations"][$j]["title"]; ?> </td>
						<td class="text-right">
							<a id="file-link" class="text-right" href=" <?php
							echo $db_arr[$i]["presentations"][$j]["file_path"];
							?> ">
								<span class="glyphicon glyphicon-download-alt"></span>
							</a>
						</td>
					</tr>
				<?php } ?>

			</tbody>
		</table>
	</div>
	<?php
}
?>
</body>
<script type="text/javascript">
	$(document).ready(function(evt) {
		// console.log($("select").val());
		// var dirid = $("select").val();
		// $("thead."+dirid).show();
		// $("tbody."+dirid).show();
		// $('select').change(function(event){
		// 	// console.log($(this).val());
		// 	var date = $(this).val();
		// 	$("thead").hide();
		// 	$("tbody").hide();
		// 	$("thead."+date).show();
		// 	$("tbody."+date).show();
		// });
	});
</script>
</html>
