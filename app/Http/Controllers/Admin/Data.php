<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\User;
use App\Models\Room;
use App\Models\Student;

class Data extends Controller
{
    // Get list from School from database
    function Dashboard(){
        
        $settings= Setting::all()->where('user_id', (Auth::user()->id))->first();
        if($settings == ''){
            $settings['name'] = 'Plateform Name';
            $settings['school'] = 'Sector';
            $settings['room'] = 'Groups';
            $settings['student'] = 'Participants';
            $settings['copyrights'] = 'Company';
        }else{}

        $usercount= User::all()->where('role_as',"0")->count();
        $users= User::all()->where('role_as',"0");

        $roomcount= Room::all()->count();
        $rooms= Room::orderBy('id', 'desc')->get()->take(6);

        $studentcount= Student::all()->count();

        return view('admin/home',['settings'=>$settings, 'usercount'=>$usercount, 'users'=>$users, 'roomcount'=>$roomcount, 'rooms'=>$rooms, 'studentcount'=>$studentcount]);
    }

    // Get list from School from database
    function getSchool(){
        
        $settings= Setting::all()->where('user_id', (Auth::user()->id))->first();
        if($settings == ''){
            $settings['name'] = 'Plateform Name';
            $settings['school'] = 'Sector';
            $settings['room'] = 'Groups';
            $settings['copyrights'] = 'Company';
        }else{}
        $users= User::orderBy('id', 'desc')->get()->where('role_as',"0");

        return view('admin/schools',['settings'=>$settings, 'users'=>$users]);
    }

    //Delete Data
    function deleteSchool($id){

        $data= User::find($id);
        $data->delete();  

        return redirect('/admin/schools');      

    }

    public function viewSchool($id)
    {
        $settings= Setting::all()->where('user_id', (Auth::user()->id))->first();
        if($settings == ''){
            $settings['id'] = '0';
            $settings['user_id'] = '0';
            $settings['name'] = 'Plateform Name';
            $settings['school'] = 'Sector';
            $settings['room'] = 'Groups';
            $settings['student'] = 'Participants';
            $settings['list_name'] = 'List of all Participants';
            $settings['copyrights'] = 'Company';
        }else{}
        $school = User::all('id','name')->find($id);
        $rooms = Room::all()->where('school' , $school->id);
        
        return view('admin/school-rooms',['settings'=>$settings, 'school'=>$school, 'rooms'=>$rooms]);
    } 

    // Get list from Room from database
    function getRooms(){
        
        $settings= Setting::all()->where('user_id', (Auth::user()->id))->first();
        if($settings == ''){
            $settings['name'] = 'Plateform Name';
            $settings['school'] = 'Sector';
            $settings['room'] = 'Groups';
            $settings['student'] = 'Participants';
            $settings['copyrights'] = 'Company';
        }else{}
        $rooms= Room::orderBy('id', 'desc')->get();
        $users= User::all()->where('role_as',"0");
        $students= Student::all();

        return view('admin/rooms',['settings'=>$settings, 'rooms'=>$rooms, 'users'=>$users, 'students'=>$students]);
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
