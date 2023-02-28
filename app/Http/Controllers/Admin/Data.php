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
        $rooms= Room::orderBy('id', 'desc')->get()->take(6);

        $studentcount= Student::all()->count();

        return view('admin/home',['usercount'=>$usercount, 'users'=>$users, 'roomcount'=>$roomcount, 'rooms'=>$rooms, 'studentcount'=>$studentcount]);
    }

    // Get list from School from database
    function getSchool(){
        
        $users= User::orderBy('id', 'desc')->get()->where('role_as',"0");

        return view('admin/schools',['users'=>$users]);
    }

    //Delete Data
    function deleteSchool($id){

        $data= User::find($id);
        $data->delete();  

        return redirect('/admin/schools');      

    }

    public function viewSchool($id)
    {
        $school = User::all('id','name')->find($id);
        $rooms = Room::all()->where('school' , $school->id);
        
        return view('admin/school-rooms',['school'=>$school, 'rooms'=>$rooms]);
    } 

    // Get list from Room from database
    function getRooms(){
        
        $rooms= Room::orderBy('id', 'desc')->get();
        $users= User::all()->where('role_as',"0");
        $students= Student::all();

        return view('admin/rooms',['rooms'=>$rooms, 'users'=>$users, 'students'=>$students]);
    }

    //Check validation and add License
    function addRoom(Request $req){
         
        $room= new Room;
        $room->room=$req->room;
        $room->school=$req->school;
        $room->nos=$req->nos.'';
       echo  $room->save();
        
        return redirect('/admin/rooms');

    }

     //Delete Data
     function deleteRoom($id){

        $data= Room::find($id);
        $data->delete();  

        return redirect('/admin/rooms');      

    }
}
