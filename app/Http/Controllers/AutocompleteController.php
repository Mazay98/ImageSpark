<?php

namespace App\Http\Controllers;

use App\Filters\UserFilter;
use App\User;
use Illuminate\Http\Request;

class AutocompleteController extends Controller
{
    public function fetch(Request $request)
    {
        $query = $request->get('city');
        if (empty($query)) return false;

        $users_query = User::query();
        $data = (new UserFilter($users_query, $request))->apply()->get();

        if(!count($data)) return  false;
        $output = "<ul id='list_cities' class='dropdown-menu' style='display: block; position: relative'>";

        foreach($data as $row){
            $output.="<li><a href='#'>$row->current_city</a></li>";
        }
        $output.= "</ul>";
        return $output;
    }
}
