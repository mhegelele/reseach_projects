<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PaginationController extends Controller
{
    function index()
    {
     $data = DB::table('project')->orderBy('pro_id', 'asc')->paginate(10);
     return view('pagination', compact('data'));
    }

    function fetch_data(Request $request)
    {
     if($request->ajax())
     {
      $sort_by = $request->get('sortby');
      $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
      $data = DB::table('project')
                    ->where('title', 'like', '%'.$query.'%')
                    ->orWhere('theme', 'like', '%'.$query.'%')
                    ->orWhere('centre', 'like', '%'.$query.'%')
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(10);
      return view('pagination_data', compact('data'))->render();
     }
    }
}
?>