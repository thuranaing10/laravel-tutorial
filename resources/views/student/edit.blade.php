<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<form method="post" action="{{ url('student/'.$student->id.'/update') }}" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="exampleInputEmail1">Roll Number</label>
    <input type="text" class="form-control" required="" name="rollNo" value="{{ $student->rollNo }}">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Name</label>
    <input type="name" name="name" class="form-control" required="" value="{{ $student->name }}">
  </div>
  <div class="form-group">
      <label for="image">Post Image</label>
      @if ($student->image)
          <ul>
              <li>{{ $student->image }}</li>
          </ul>
      @endif
      <input type="file" class="form-control-file" name="image">
  </div>
  <div class="form-group">
      <label for="image">File</label>
      @if ($student->file)
          <ul>
              <li>{{ $student->file }}</li>
          </ul>
      @endif
      <input type="file" class="form-control-file" name="file">
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>