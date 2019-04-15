<?php

namespace App\Http\Controllers;

use App\University;
use Illuminate\Http\Request;

class AutocompleteController extends Controller
{
    function index()
    {
     return view('autocomplete');
    }

    function fetchUniversity(Request $request)
    {
     if($request->get('query'))
     {
      $query = $request->get('query');
      $data = University::where('uni_name', 'LIKE', "%{$query}%")->get();
      $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
      foreach($data as $row)
      {
       $output .= '
       <li><a href="#">'.$row->uni_name.'</a></li>
       ';
      }
      $output .= '</ul>';
      echo $output;
     }
    }
}
