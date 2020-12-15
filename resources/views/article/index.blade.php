<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


<a href="{{ url('article/create') }}" class="btn btn-primary pull-right">New</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Description</th>
      <th scope="col">Image</th>
      <!-- <th scope="col">Pdf File Download</th> -->
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($articles as $article)
        <tr>
          
          
          <td>{{$article->name}}</td>
          <td>{{$article->description}}</td>
          <td>
            @foreach (json_decode($article->image,true) as $image)
                        
                            <img src="{{ asset('/storage/images/' . $image) }}" class="img-fluid" width="100" height="100">
            @endforeach

          <!--   {{--@foreach($image->image as $image)
                <img src="{{ asset('storage/images/' . $image) }}" photo" class="img-fluid" width="100" height="100">
           @endforeach--}} -->
          </td>
          
          <td><a href="{{ url('article/'.$article->id.'/edit') }}" class="btn btn-primary">Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
         <a href="{{ url('article/'.$article->id.'/destory') }}" class="btn btn-danger">Delete</a>
       </td>
        </tr>
    @endforeach

  </tbody>
</table>