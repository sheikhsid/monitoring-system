<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Room;

class Data extends Controller
{
    // Get list from School from database
    function getRooms(){
        
        $rooms= Room::all();
        $users= User::all()->where('role_as',"0");

        return view('admin/rooms',['rooms'=>$rooms, 'users'=>$users]);
    }

    //Check validation and add License
    function addRoom(Request $req){
         
        $room= new Room;
        $room->room=$req->room;
        $room->institute=$req->institute;
        $room->nos=$req->nos;
       echo  $room->save();
        
        return redirect('/admin/rooms');

    }
}
