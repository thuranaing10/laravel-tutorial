<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<form method="post" action="{{ url('cost/'.$cost->id.'/update') }}">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Type Name</label>
    <input type="text" class="form-control" required="" name="name" value="{{ $cost->name }}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Price</label>
    <input type="text" name="price" class="form-control" required="" value="{{ $cost->price }}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Qty</label>
    <input type="number" min="1" name="qty" class="form-control" required="" value="{{ $cost->qty }}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Date</label>
    <input type="date" name="date" class="form-control" required="" value="{{ $cost->date }}">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>