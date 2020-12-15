<!DOCTYPE html>
<html>
  <head>
    <title>Datatables AJAX pagination with Search and Sort - Laravel</title>

    <!-- Meta -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
   
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('DataTables/datatables.min.css')}}">

    <!-- Script -->
    <script src="{{asset('jquery-1.12.4.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('DataTables/datatables.min.js')}}" type="text/javascript"></script>
    
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.dataTables.min.js"></script> -->

    <!-- Datatables CSS CDN -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"> -->

    <!-- jQuery CDN -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 -->
    <!-- Datatables JS CDN -->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script> -->

  </head>
  <body>

    <table id='empTable' width='100%' border="1" style='border-collapse: collapse;'>
      <thead>
        <tr>
          <td>S.no</td>
          <td>Username</td>
          <td>Name</td>
          <td>Email</td>
        </tr>
      </thead>
    </table>

    <!-- Script -->
    <script type="text/javascript">
    $(document).ready(function(){

      // DataTable
      $('#empTable').DataTable({
         processing: true,
         serverSide: true,
         ajax: "{{route('employees.getEmployees')}}",
         columns: [
            { data: 'id' },
            { data: 'username' },
            { data: 'name' },
            { data: 'email' },
         ]
      });
    });
    </script>
  </body>
</html>