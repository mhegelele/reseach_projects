<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class LiveSearch extends Controller
{
    function index()
    {
     return view('live_search')->with('i', (request()->input('page', 1) - 1) * 5);
    }

    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = DB::table('project')
         ->where('title', 'like', '%'.$query.'%')
         ->orWhere('theme', 'like', '%'.$query.'%')
         ->orWhere('background', 'like', '%'.$query.'%')
         ->orWhere('summary', 'like', '%'.$query.'%')
          ->orWhere('centre', 'like', '%'.$query.'%')
         ->orderBy('pro_id', 'asc')
         ->paginate(10);
         
      }
      else
      {
       $data = DB::table('project')
         ->orderBy('pro_id', 'asc')
         ->paginate(10);
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->theme.'</td>
        
               </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }
}

