@extends('layout.table_us')
@section('content')

<div class="card">
  <div class="card-header">
    <h3 class="card-title">Админ панель</h3>
    <div class="row">

      <div class="col-sm-6 center-vert">


        <input type="text" name="table_search" class="form-control float-right" placeholder="Search" id="search">


      </div>
      <div class="col-lg-6 center">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal" onclick="add_to_modal(0)">Добавить пользователя</button>
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
                <a href="{{url('/all_pers/desk/position')}}"><i class="fas fa-sort-alpha-down down point"></i></a>
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
         <th>Редактор</th> 
       </tr>
       @foreach($user as $us_al)
       <tr class="{{$us_al->id}} user">
        <td class="{{$us_al->id}} last_name">{{$us_al->last_name}}</td>
        <td class="{{$us_al->id}} first_name">{{$us_al->first_name}}</td>
        <td class="{{$us_al->id}} father_name">{{$us_al->father_name}}</td>
        <td class="{{$us_al->id}} position">{{$us_al->position}}</td>
        <td class="{{$us_al->id}} first_day">{{$us_al->first_day}}</td>
        <td class="{{$us_al->id}} salary">{{$us_al->salary}}</td>
        <td ><i class="far fa-edit point"  data-toggle="modal" data-target="#myModal" onclick="add_to_modal('{{$us_al->id}}')"></i> <i class="far fa-trash-alt delete cursor" onclick="del_user('{{$us_al->id}}')"></i></td>
      </tr>
      @endforeach
      <?php echo $user->render(); ?>
    </table>
    <?php echo $user->render(); ?>
    <div id="myModal" class="modal onfade">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header"><p class="modal-title">Редактор пользователя</p><button class="close text-right" type="button" data-dismiss="modal">×</button>

          </div>
          <div class="modal-body" >

            <div class="col-sm-12 alert alert-success status text-center" role="alert">

            </div>
            <div class="card-user" >
              
              <form method="post" enctype="multipart/form-data" id="form-upload-photo">
                <div id="image" src="#" alt="" ></div>
                <p style="font-size: 19px"><i class="fas fa-download" for="image-upload" id="image-label"></i></p>
                <span class="badge badge-success cursor" id="add-photo">add photo</span> <span class="badge badge-danger cursor" id="delete-photo">delete photo</span>
                <input type="file" name="pic[]" id="image-upload">
              </form>
              <form>
                <div class="row form-wrapp">
                  <div class="col-sm-6 bor">


                    <div class="form-group last_name">
                      <label for="last_name">Фамилия</label>
                      <input type="text" class="form-control" id="last_name" value="">
                      <span class="invalid-feedback error" role="alert">
                        <strong class="last_name-status msg"></strong>
                      </span>

                    </div>

                    <div class="form-group first_name">
                      <label for="first_name">Имя</label>
                      <input type="text" class="form-control" id="first_name" value="">
                      <span class="invalid-feedback error" role="alert">
                        <strong class="first_name-status msg"></strong>
                      </span>
                    </div>
                    <div class="form-group father_name">
                      <label for="father_name">Отчество</label>
                      <input type="text" class="form-control" id="father_name" value="">
                      <span class="invalid-feedback error" role="alert">
                        <strong class="father_name-status msg"></strong>
                      </span>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group position">
                      <label for="position">Должность</label>
                      <input type="text" class="form-control" id="position" value="">
                      <span class="invalid-feedback error" role="alert">
                        <strong class="position-status msg"></strong>
                      </span>
                    </div>
                    <div class="form-group first_day">
                      <label for="first_day">Дата приема</label>
                      <input type="text" class="form-control" id="first_day" value="">
                      <span class="invalid-feedback error" role="alert">
                        <strong class="first_day-status msg"></strong>
                      </span>
                    </div>
                    <div class="form-group salary">
                      <label for="salary">Зар. плата</label>
                      <input type="text" class="form-control" id="salary" value="">
                      <span class="invalid-feedback error" role="alert">
                        <strong class="salary-status msg"></strong>
                      </span>
                    </div>

                  </div> 
                </div>
              </div>
            </form>
          </div>
          <div class="modal-footer"><button class="btn btn-default" type="button"  id="save_edit_user">Сохранить</button><br>

          </div>

        </div>
      </div>
    </div>
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
<script>
 var id_user;
 function add_to_modal(id){
   $('#last_name').val($("."+id+'.last_name').text());
   $('#first_name').val($("."+id+'.first_name').text());
   $('#father_name').val($("."+id+'.father_name').text());
   $('#position').val($("."+id+'.position').text());
   $('#first_day').val($("."+id+'.first_day').text());
   $('#salary').val($("."+id+'.salary').text());
   id_user = id;
 }


 $('#save_edit_user').on('click', function(){
   $.ajax({
    url: '/validate/'+id_user,
    method:'get',
      // dataType: 'json',
      data:{
        "_token": "{{ csrf_token() }}",
        'id': id_user,
        "last_name":$('#last_name').val(),
        "first_name":$('#first_name').val(),
        "father_name":$('#father_name').val(),
        "position":$('#position').val().toLowerCase(),
        "first_day":$('#first_day').val(),
        "salary":$('#salary').val()
      },
      success: function (data){
        $(".form-group").each(function(key){
        $('.invalid-feedback').css('display','none');
        $("input").css('border', '');
        $('.msg').html(' ');
        });

        $('.status').html(data);
        $('.status').css('display', 'block');

      },
      error: function (data){
       var errors = $.parseJSON(data.responseText);
       $.each(errors, function (key, value) {
        pick_error(value.last_name, '.last_name', '.last_name-status', '#last_name');
        pick_error(value.first_name, '.first_name', '.first_name-status', '#first_name');
        pick_error(value.father_name, '.father_name', '.father_name-status', '#father_name');
        pick_error(value.position, '.position', '.position-status', '#position');
        pick_error(value.first_day, '.first_day', '.first_day-status', '#first_day');
        pick_error(value.salary, '.salary', '.salary-status', '#salary');
      });
     }

   });
   function pick_error(value_elem,class_elem, status_elem, id_elem){
    if(value_elem!=null){
      if($(class_elem+' >.invalid-feedback ').css('display')=='none'){
        $(class_elem+' >.invalid-feedback ').css('display', 'block');
        $(status_elem).append(value_elem);
        $(id_elem).css('border', '1px solid red');
      }

    }

  }
});


</script>
<script>
  $('.modal-header').on('click', function (){
    $('.status').css('display','none');
  });
</script>
<script>
  function del_user(id){
    $('.'+id+".user").html(' ');
    $.ajax({
      url: '/crud-del/'+id,
      method:'post',
      data:{
        "_token": "{{ csrf_token() }}",
      },
      success: function (data){

      }
    });
  }

</script>
<script>
  $('.fa-download').on('click', function(){
    $('input[type=file]').click();
});
  function readURL(input) {
    console.log(input.files[0]);
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        console.log(reader.onload);
        reader.onload = function (e) {
          console.log(e);
            $('#image').attr('src', e.target.result );
        }

        console.log(reader.readAsDataURL(input.files[0]));
    }
}

$("#image-upload").change(function(){
    readURL(this);
    // console.log(this)
});
</script>
@endsection

