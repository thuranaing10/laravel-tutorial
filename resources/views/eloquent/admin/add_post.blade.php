<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<form method="post" action="{{ url('eloquent/admin/post') }}">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" required="" name="name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <input type="text" class="form-control" required="" name="description">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Category Name</label>
    
	    <select name="category_id">
        @foreach($categorys as $category)
	    <option value="{{$category->id}}">{{$category->name}}</option>
      @endforeach
		</select>
    
	
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>