  @foreach($data as $row)
      <tr>
        <td>{{ $row->pro_id }}</td>
        <td>{{ $row->title }}</td>
            <td>{{ $row->theme }}</td>
      </tr>
      @endforeach
      <tr>
       <td colspan="3" align="center">
        {!! $data->links() !!}
       </td>
      </tr>
