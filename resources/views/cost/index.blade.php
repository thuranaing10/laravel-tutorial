<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<h1><i><a href="{{ url('cost') }}" class="pull-left" style="text-decoration: none;">Costs of Living</a></i></h1>
<a href="{{ url('cost/record') }}" class="btn btn-primary pull-right">Records</a>
<a href="{{ url('cost/create') }}" class="btn btn-primary pull-right">New</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Type Name</th>
      <th scope="col">Price</th>
      <th scope="col">Qty</th>
      <th scope="col">SubTotoal</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @php
      $i = 1;
      $total = 0;
    @endphp
    @foreach($costs as $cost)
        <tr>
          <td>{{$i++}}</td>
          <td>{{$cost->name}}</td>
          <td>{{$cost->price}}</td>
          <td>{{$cost->qty}}</td>
          @php
            $sub_total = $cost->price * $cost->qty;
            $total =$total + $sub_total;
          @endphp
          <td>{{$sub_total}}</td>
          <td><a href="{{ url('cost/'.$cost->id.'/edit') }}" class="btn btn-primary">Edit</a>&nbsp;&nbsp;&nbsp;&nbsp;
         <a href="{{ url('cost/'.$cost->id.'/destory') }}" class="btn btn-danger">Delete</a>
       </td>
        </tr>

    @endforeach
    <tr>
          <td></td>
          <td></td>
          <td></td>
          <td>Total Cost</td>
          
          <td>{{$total}}</td>
        </tr>

  </tbody>
</table>