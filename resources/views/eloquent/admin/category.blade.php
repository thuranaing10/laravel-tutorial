<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<a href="{{ url('eloquent/admin/category') }}" class="btn btn-primary">Category</a>
<a href="{{ url('eloquent/admin/post') }}" class="btn btn-primary">Post</a>
<br>
<a href="{{ url('eloquent/admin/add_category') }}" class="btn btn-primary pull-right">Add Category</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <!-- <th scope="col">Pdf File Download</th> -->
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($cats as $cat)
        <tr>
          <td>{{$cat->name}}</td>
          <td><a href="{{ url('eloquent/admin/'.$cat->id.'/edit') }}" class="btn btn-primary">Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
         <a href="{{ url('eloquent/admin/'.$cat->id.'/destory') }}" class="btn btn-danger">Delete</a>
       </td>
        </tr>
    @endforeach
    

  </tbody>
</table>