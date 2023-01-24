<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Room;

class Students extends Controller
{
    //Get Student Data
    Public function getData(){

        
        $students = Student::all();
        $countstudents = Student::all()->count();

        $roomdata = Room::all();
        

        return view('/welcome', compact('students','countstudents'));

    }
}
