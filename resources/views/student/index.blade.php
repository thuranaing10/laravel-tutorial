<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<a href="{{ url('student/create') }}" class="btn btn-primary pull-right">New</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Roll Number</th>
      <th scope="col">Name</th>
      <th scope="col">Photo</th>
      <th scope="col">Link</th>
      <!-- <th scope="col">Pdf File Download</th> -->
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($students as $student)
        <tr>
          
          <td>{{$student->rollNo}}</td>
          <td>{{$student->name}}</td>
          <td>
            @if ($student->image)
                <img src="{{ asset('app/public/images/' . $student->image) }}" alt="{{ $student->title }} photo" class="img-fluid" width="100" height="100">
            @endif
          </td>
          <td>
              <a href="{{ url('student/'.$student->id.'/download') }}" class="btn btn-primary">Download
              </a>
              <!-- <a href="storage/app/public/file/{{$student->file}}" download="{{$student->file}}">Download</a>
 -->
          </td>
          <td><a href="{{ url('student/'.$student->id.'/edit') }}" class="btn btn-primary">Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
         <a href="{{ url('student/'.$student->id.'/destory') }}" class="btn btn-danger">Delete</a>
       </td>
        </tr>
    @endforeach

  </tbody>
</table>