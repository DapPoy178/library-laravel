<div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">User_Id</th>
            <th scope="col">Book_Id</th>
            <th scope="col">Rent_Date</th>
            <th scope="col">Return_Date</th>
            <th scope="col">Actual_Return_Date</th>
            <th scope="col">Status</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($rentlog as $item)
            <tr>
              <th scope="row">{{$loop->iteration}}</th>
              <td>{{$item->user->username}}</td>
              <td>{{$item->book->title}}</td>
              <td>{{$item->rent_date}}</td>
              <td>{{$item->return_date}}</td>
              <td>{{$item->actual_return_date}}</td>
              <td><span class="badge rounded-pill {{$item->actual_return_date == null ? 'bg-dark' : ($item->return_date < $item->actual_return_date ? 'bg-danger' : 'bg-success')}}">{{$item->actual_return_date == null ? 'In Use' : ($item->return_date < $item->actual_return_date ? 'Late' : 'Returned')}}</span></td>
            </tr>
            @endforeach
        </tbody>
      </table>
</div>