<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>

  @if(count($errors) > 0)
  	<div class="alert alert-danger">
  		<button type="button" class="close" data-dismiss="alert">x</button>
  		<ul>
  			@foreach($errors->all() as $error)
  				<li>{{$error}}</li>
  			@endforeach
  		</ul>
  	</div>
  @endif

  @if($message = Session::get('success'))
  	<div class="alert alert-success alert-block">
  		<button type="button" class="close" data-dismiss="alert">x</button>
  		<strong>{{$message}}</strong>
  	</div>
  @endif



<form method="post" action="{{url('sendemail/send')}}">
	{{ csrf_field() }}
	<form>
		<div class="form-group">
			<label for="exampleInputEmail1">Enter your name</label>
			<input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter your name">
		</div>
		<div class="form-group">
		    <label for="exampleInputEmail1">Email address</label>
		    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
		</div>
		<div class="form-group">
			<label for="exampleInputEmail1">Enter your message</label>
			<textarea name="message">	
			</textarea>
		</div>
  		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</form>