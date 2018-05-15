
<table class="table table-striped text-center">
    <thead class="bg-secondary text-white">
        <tr>
            <th> User</th>
            <th> Actions </th>
        </tr>
    </thead>
    <tbody>
    	@foreach($users as $key => $value)
          <tr>
              <td>{{ $value['login'] }}</td>
              <td> <a class = "btn btn-warning" href="{{ route('user.follower.listing', $value['login']) }}" id = "view-followers">View Followers</a> </td>
          </tr>
      @endforeach
   </tbody>
</table>