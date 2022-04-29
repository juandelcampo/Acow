<?php

namespace App\Http\Controllers;
use App\Models\Date;

use Illuminate\Http\Request;

class DateController extends Controller
{
    public function getDates(){
        return response()->json(['data' => Date::all(),200]);

    }

}
