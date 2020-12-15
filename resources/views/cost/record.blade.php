<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="jquery.printPage.js">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 <script>  
  $(document).ready(function() {
    $(".btnPrint").printPage();
  });
  </script>
<h1><i><a href="{{ url('cost') }}" class="pull-left" style="text-decoration: none;">Costs of Living</a></i></h1>
<br><br><br>
<form method="post" action="{{ url('cost/record/search') }}">
  {{ csrf_field() }}
    From : <input type="date" name="fdate">&nbsp;&nbsp;&nbsp;
    To : <input type="date" name="tdate">&nbsp;&nbsp;&nbsp;
    <button type="submit" name="submit" class="btn btn-primary">Search</button>
</form>

<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Date</th>
      <th scope="col">Cost</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @php
      $i = 1;
      $total_all = 0;
    @endphp
    @foreach($costs as $cost)
      @if($cost->date >= $fdate && $cost->date <= $tdate)
        <tr>
          <td>{{$i++}}</td>
          <td>{{$cost->date}}</td> 
          <td>{{$cost->total}}</td>
          @php
            $total_all += $cost->total;
          @endphp
          <td><a href="{{ url('cost/'.$cost->date.'/detail') }}" class="btn btn-primary">View Details</a>&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="{{ url('cost/'.$cost->date.'/print') }}" class="btn btn-success btnPrint">Print</a>
          </td>
        </tr>
      @endif
    @endforeach
    <tr>
          <td></td>
          <td>Total Cost</td>
          <td>{{$total_all}}</td>
        </tr>

  </tbody>
  </tbody>
</table>