<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Upload file</title>

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
	pre,
	input{
		background-color: #ededed;
	}
	label{
		font-sizehttp://www.lrc.ic.unicamp.br/~pcumino/meetings/uploadfile.php: 15pt;
	}
	</style>
</head>
<body>



<pre style="font-size: 8pt;">Upload file page
<?php
    include "functions.php";

    // print_r($_FILES);
		// print_r($_POST);

    if ($_FILES) {
			$uploadOk = 1;
			$target_dir = "slides/".$_POST["date"]."/";
      $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
      // $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

			// $res = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
			// print_r($res);

			// print_r($target_file);

      // Check if file already exists
      if (file_exists($target_file)) {
          echo "<br>";
          echo "Sorry, file already exists.<br>";
          $uploadOk = 0;
      }


      if ($uploadOk == 0) {
				echo "<br>";
				echo "Your file was not uploaded.<br>";
				// if everything is ok, try to upload file
			}
			else {
				addToDbArr($_FILES, $_POST);
				$res = move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
			}
		}
?>
</pre>



<hr>
<form id="fileform" action="uploadfile.php" method="post" enctype="multipart/form-data">
		<div class="form-group row">
			<label for="formStudentName" class="col-sm-2 col-form-label">Student name:</label>
			<div class="col-sm-10">
				<!-- <input type="text" readonly class="form-control-plaintext" id="formStudentName" value="email@example.com"> -->
				<input
				id="formStudentName"
				form="fileform"
				name="student_name"
				type="text"
				class="form-control"
				value="temp name"
				placeholder="Minimum of 5 characters">
			</div>
		</div>
		<div class="form-group row">
			<label for="formStudentName" class="col-sm-2 col-form-label">Slide title:</label>
			<div class="col-sm-10">
				<!-- <input type="text" readonly class="form-control-plaintext" id="formStudentName" value="email@example.com"> -->
				<input
				id="slide_title"
				form="fileform"
				name="title"
				type="text"
				class="form-control"
				value="This is a simple title"
				placeholder="Minimum of 10 characters">
			</div>
		</div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="exampleFormControlSelect2">Select date:</label>
		<div class="col-sm-10">
			<select
			id="mt-date"
			name="date"
			form="fileform"
			multiple class="form-control">
				<option value="2018-08-10" > 2018-08-10 </option>
				<option value="2018-08-17" > 2018-08-17 </option>
				<option value="2018-08-24" > 2018-08-24 </option>
				<option value="2018-08-31" > 2018-08-31 </option>
				<option value="2018-09-14" > 2018-09-14 </option>
				<option value="2018-09-21" > 2018-09-21 </option>
				<option value="2018-09-28" > 2018-09-28 </option>
				<option value="2018-10-05" > 2018-10-05 </option>
				<option value="2018-10-19" > 2018-10-19 </option>
				<option value="2018-10-26" > 2018-10-26 </option>
				<option value="2018-11-09" > 2018-11-09 </option>
				<option value="2018-11-16" > 2018-11-16 </option>
				<option value="2018-11-23" > 2018-11-23 </option>
				<option value="2018-11-30" > 2018-11-30 </option>
				<option value="2018-12-07" > 2018-12-07 </option>
				<option value="2018-12-14" > 2018-12-14 </option>
				<option value="2018-12-21" > 2018-12-21 </option>
	    </select>
		</div>
  </div>
	<div class="form-group row">
    <label class="col-sm-2 col-form-label" for="fileToUpload">File input:</label>
		<div class="col-sm-10">
			<input
			id="fileToUpload"
			name="fileToUpload"
			type="file"
			class="btn btn-defaultform-control-file">
		</div>
  </div>
	<div class="form-group row">
		<input disabled style="width: 100%;" class="btn btn-default" type="submit" value="Upload file now" name="submit">
	</div>
</form>

<script type="text/javascript">
	$(document).ready(function(e){
		var hasDate = false;
		var hasFile = false;
		var hasTitle = false;inputFile = $('input#fileToUpload');

		var nameIsMinimum = false;

		inputSlideTitle = $('input#slide_title');
		inputStdName = $('input#formStudentName');
		inputFile = $('input#fileToUpload');

		inputSlideTitle.keyup(function(e){
			console.log(hasTitle);
			if($(this).val().length >= 10){
				hasTitle = true;
			}
			else{
				hasTitle = false;
			}
			activateSubmit(hasDate, hasFile, nameIsMinimum, hasTitle);
		});

		inputStdName.keyup(function(e){
			if($(this).val().length >= 5){
				nameIsMinimum = true;
			}
			else{
				nameIsMinimum = false;
			}
			activateSubmit(hasDate, hasFile, nameIsMinimum, hasTitle);
		});

		inputFile.change(function(e){
			if(inputFile.val()){
				hasFile = true;
			}else {
				hasFile = false;
			}
			activateSubmit(hasDate, hasFile, nameIsMinimum, hasTitle);
		});

		$('select').change(function(e){
			if($("select#mt-date").val().length > 0){
				hasDate = true;
			}else {
				hasDate = false;
			}
			activateSubmit(hasDate, hasFile, nameIsMinimum, hasTitle);
		});

	});

	function activateSubmit(condA, condB, condC, condD){
		if(condA && condB && condC && condD){
			$('input[type=submit]').addClass("btn-success");
			$('input[type=submit]').removeClass("btn-default");
			$('input[type=submit]').prop( "disabled", false );
		}else{
			$('input[type=submit]').addClass("btn-default");
			$('input[type=submit]').removeClass("btn-success");
			$('input[type=submit]').prop( "disabled", true );
		}
	}
	</script>

</body>
</html>
