<!DOCTYPE html>
<html>
<head>
	<title>Create Form</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<h1><i><a href="{{ url('cost') }}" class="pull-left" style="text-decoration: none;">Costs of Living</a></i></h1>
	<p class="pull-right">
	<?php
		echo date('Y-m-d');
	?>
	</p>
	<br>
<form id="create-user-form" action="{{url('cost')}}" method="post" border="0">
	{{ csrf_field() }}
	<table class="table table-hover table-bordered">
		<tr>
			<td>Type Name</td>
			<td><input type="text" name="name" class="form-control" required /></td>
		</tr>
		<tr>
			<td>Price </td>
			<td><input type="text" name="price" class="form-control" required /></td>
		</tr>
		<tr>
			<td>Qty</td>
			<td><input type="number" min="1" name="qty" class="form-control" required /></td>
		</tr>
		<tr>
			<td>Date</td>
			<td><input type="date" name="date" value="<?php echo date('Y-m-d');?>" class="form-control" required /></td>
		</tr>
		<tr>
		<td></td>
		<td>
		<button type="submit" class="btn btn-primary float-right">
		<span class="glyphicon glyphicon-plus"></span> Save
		</button>
		</td>
		</tr>
	</table>
</form>
</body>
</html>