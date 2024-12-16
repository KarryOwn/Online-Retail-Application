<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style type="text/css">
      table{
        border: 2px solid white;
        text-align: center;
      }
      th{
        color: white;
        background-color: skyblue;
        padding: 15px;
        font-size: 20px;
        font-weight: bold;
        padding: 15px;
      }
      .table_center{
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 50px;
      }
      td{
        border: 1px solid white;
        text-align: center;
        color: white;
      }

    </style>

  </head>
  <body>
    @include('admin.header')
    
    @include('admin.sidebar')

      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <div class="table_center">
          <table>
            <tr>
                <th>User Name</th>
                <th>Total Price</th>
                <th>Status</th>
                <th>Shipping Addreess</th>
                <th>Change Status</th>
            </tr>

            @foreach($data as $data)
            
            <tr>
              <td>{{$data->user->name}}</td>
              <td>{{$data->total_price}}</td>
              <td>{{$data->status}}</td>
              <td>{{$data->shipping_address}}</td>
              <td>
                <a class="btn btn-primary" href="{{url('on_pending',$data->id)}}">On progcessing</a>
                <a class="btn btn-success" href="{{url('completed',$data->id)}}">Completed</a>
              </td>
            </tr>
            @endforeach
            </table>
            </div>
          </div>   
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>
