@extends('layout.table_us')
@section('content')


<div class="card">
  <div class="card-header">
    <h3 class="card-title">Все сорудники</h3>

    <div class="card-tools">
      <div class="input-group input-group-sm" style="width: 362px;">
        <input type="text" name="table_search" class="form-control float-right" placeholder="Search" id="search">

        <div class="input-group-append">
          <!--         <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button> -->
        </div>
      </div>
      
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-0">
   <table class="table table-hover">
    <tr>
      <th>Фамилия<br>
        <div class="row menu-tabl">
          <div class="col-sm-2">
            <a href="{{url('/all_pers/desk/last_name')}}"><i class="fas fa-sort-alpha-up up point"></i></a>
          </div>
          <div class="col-sm-2">
            <a href="{{url('/all_pers/ask/last_name')}}"><i class="fas fa-sort-alpha-down down point"></i></a>
          </div>
        </div>
      </th>
      <th>Имя<br>
        <div class="row menu-tabl">
          <div class="col-sm-2">
            <a href="{{url('/all_pers/desk/first_name')}}"><i class="fas fa-sort-alpha-up up point"></i></a>
          </div>
          <div class="col-sm-2 ">
            <a href="{{url('/all_pers/ask/first_name')}}"><i class="fas fa-sort-alpha-down down point"></i>
            </div>
          </div>
        </th>
        <th>Отчество<br>
          <div class="row menu-tabl">
            <div class="col-sm-2">
              <a href="{{url('/all_pers/desk/father_name')}}"><i class="fas fa-sort-alpha-up up point"></i></a>
            </div>
            <div class="col-sm-2 ">
              <a href="{{url('/all_pers/ask/father_name')}}"><i class="fas fa-sort-alpha-down down point"></i></a>
            </div>
          </div>
        </th>
        <th>Должность<br>
          <div class="row menu-tabl">
            <div class="col-sm-2">
              <a href="{{url('/all_pers/desk/position')}}"><i class="fas fa-sort-alpha-up up point"></i></a>
            </div>
            <div class="col-sm-2">
              <a href="{{url('/all_pers/ask/position')}}"><i class="fas fa-sort-alpha-down down point"></i></a>
            </div>
          </div>
        </th>
        <th>Дата приема<br>
          <div class="row menu-tabl">
            <div class="col-sm-2">
              <a href="{{url('/all_pers/desk/first_day')}}"><i class="fas fa-sort-alpha-up up point"></i></a>
              </div>
              <div class="col-sm-2">
                <a href="{{url('/all_pers/ask/first_day')}}"><i class="fas fa-sort-alpha-down down point"></i></a>
              </div>
            </div>
          </th>
          <th>Зароботная плата<br>
            <div class="row menu-tabl">
              <div class="col-sm-2">
                <a href="{{url('/all_pers/desk/salary')}}"><i class="fas fa-sort-numeric-up up point"></i></a>
              </div>
              <div class="col-sm-2">
                <a href="{{url('/all_pers/ask/salary')}}"><i class="fas fa-sort-numeric-down down point"></i></a>
              </div>
            </div>
          </th>
        </tr>
        @foreach($user as $us_al)
        <tr>
          <td>{{$us_al->last_name}}</td>
          <td>{{$us_al->first_name}}</td>
          <td>{{$us_al->father_name}}</td>
          <td>{{$us_al->position}}</td>
          <td>{{$us_al->first_day}}</td>
          <td>{{$us_al->salary}}</td>
          @endforeach
        </tr>
        
        <?php echo $user->render(); ?>
        
      </table>
      
      <?php echo $user->render(); ?>
      
    </div>
  </div>
  @endsection
  @section('script')
  <script type="text/javascript">
    $('#search').keyup(function(){
     $.ajax({
      url: '/search',
      method:'get',
      data:{
        "_token": "{{ csrf_token() }}",
        "input_search":$('#search').val()
      },
      success: function (data){
        $('.table-responsive').html(data);
        
      }
    });
   });
 </script>
 @endsection
