<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<form method="post" action="{{ url('eloquent/admin/'.$post->id.'/p_update') }}" enctype="multipart/form-data">
  {{ csrf_field() }}
 
  <div class="form-group">
    <label for="exampleInputPassword1">Name</label>
    <input type="name" name="name" class="form-control" required="" value="{{ $post->name }}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <input type="name" name="name" class="form-control" required="" value="{{ $post->description }}">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Category Name</label>
	    <select name="category_id">
        @foreach($category as $cat)
        <option value="{{ $cat->id }}" @if($cat->id == $post->category_id) selected @endif>
          {{ $cat->name }}
        </option>
        @endforeach
		</select>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>