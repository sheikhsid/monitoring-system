<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Student;
use App\Models\Room;
use App\Models\Setting;

class Students extends Controller
{
    
    // Get list from database
    function viewRooms(){

        $settings= Setting::all()->where('user_id', (Auth::user()->id))->first();
        if($settings == ''){
            $settings['dateortime'] = '0';
        }else{}
        $rooms = Room::all()->where('school', (Auth::user()->id));
        $students= Student::all();

        return view('/home',['settings'=>$settings, 'rooms'=>$rooms, 'students'=>$students]);

    }

    //Get Student Data
    Public function viewRoom($id){

        $room= Room::find($id);

        $settings= Setting::all()->where('user_id', (Auth::user()->id))->first();
        if($settings == ''){
            $settings['list_name'] = 'Elenco degli studenti';
        }else{}
        $students = Student::all()->where('room_id', $id);
        $countstudents = Student::all()->where('room_id', $id)->count();
        $users = User::all('id','name', 'role_as')->where('role_as',"0");   

        return view('/room', compact('settings','room','students','countstudents','users'));

    }

    //Get Data for view
    function viewData($id){

        $data= Student::find($id);
        $settings= Setting::all()->where('user_id', (Auth::user()->id))->first();
        if($settings == ''){
            $settings['name'] = 'Plateform Name';
            $settings['school'] = 'Sector';
            $settings['room'] = 'Groups';
            $settings['student'] = 'Participants';
            $settings['copyrights'] = 'Company';
        }else{}
        $students = Student::all();
        $countstudents = Student::all()->count();
        $roomdata = Room::all()->where('id',"1");

        return view('/view',['settings'=>$settings, 'data'=>$data, 'students'=>$students, 'countstudents'=>$countstudents, 'roomdata'=>$roomdata]);   

    }


    //
    // API Controllers
    //

    public function getSchoolapi()
    {
        $schools = User::all('id','name', 'role_as')->where('role_as',"0")->toArray();

        return [
            "status" => "All School",
            "schools" => array_values($schools)
        ];
    }  

    public function show($id)
    {
        $school = User::all('id','name')->find($id);
        $rooms = Room::all('id','room','school')->where('school' , ($school->id))->toArray();
        
        return [
            "status" => "School Data",
            "school" => $school,
            "rooms" =>  array_values($rooms)
        ];
    } 

    public function index()
    {
        $students = Student::all('id', 'student_name', 'ip_address', 'room_id');

        return [
            "status" => "All Data",
            "data" => $students
        ];
    }  

    public function store(Request $request)
    {
        $student = new Student;
        $student->room_id = "1";
        $student->student_name = $request->student_name;
        $student->ip_address = $request->ip_address;
        $student->room_id = $request->room_id;
        $student->save();

        return response()->json(['message'=>'Success'], 200);
    }

    //Delete Data via API

    public function destroy($id)
    {
        return Student::destroy($id);
        return response()->json(['message'=>'Delete'], 200);
    }

}
