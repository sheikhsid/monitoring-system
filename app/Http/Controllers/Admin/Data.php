<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;
use App\Models\Student;

class Data extends Controller
{
    // Get list from School from database
    function Dashboard(){
        
        $usercount= User::all()->where('role_as',"0")->count();
        $users= User::all()->where('role_as',"0");

        $roomcount= Room::all()->count();
        $rooms= Room::all();

        $studentcount= Student::all()->count();

        return view('admin/home',['usercount'=>$usercount, 'users'=>$users, 'roomcount'=>$roomcount, 'rooms'=>$rooms, 'studentcount'=>$studentcount]);
    }

    // Get list from School from database
    function getSchool(){
        
        $users= User::all()->where('role_as',"0");

        return view('admin/schools',['users'=>$users]);
    }

    // Get list from Room from database
    function getRooms(){
        
        $rooms= Room::all();
        $users= User::all()->where('role_as',"0");

        return view('admin/rooms',['rooms'=>$rooms, 'users'=>$users]);
    }

    //Check validation and add License
    function addRoom(Request $req){
         
        $room= new Room;
        $room->room=$req->room;
        $room->school=$req->school;
        $room->nos=$req->nos;
       echo  $room->save();
        
        return redirect('/admin/rooms');

    }
}
