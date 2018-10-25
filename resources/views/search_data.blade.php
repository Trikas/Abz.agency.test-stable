    <table class="table table-hover">
      <tr>
        <th>Фамилия</th>
        <th>Имя</th>
        <th>Отчество</th>
        <th>Должность</th>
        <th>Дата приема</th>
        <th>Заработная плата</th>
      </tr>
      @foreach($user as $us_al)
      <tr>
        <td id="last_name">{{$us_al->last_name}}</td>
        <td id="first_name">{{$us_al->first_name}}</td>
        <td id="father_name">{{$us_al->father_name}}</td>
        <td id="position">{{$us_al->position}}</td>
        <td id="first_day">{{$us_al->first_day}}</td>
        <td id="salary">{{$us_al->salary}}</td>
      </tr>
      @endforeach
    </table>
    