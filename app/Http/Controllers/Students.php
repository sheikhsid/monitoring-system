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

        $roomdata = Room::all()->where('id',"1");
        

        return view('/home', compact('students','countstudents','roomdata'));

    }

    //Get Data for view
    function viewData($id){

        $data= Student::find($id);

        $students = Student::all();
        $countstudents = Student::all()->count();
        $roomdata = Room::all()->where('id',"1");

        return view('/view',['data'=>$data, 'students'=>$students, 'countstudents'=>$countstudents, 'roomdata'=>$roomdata]);   

    }


    //
    // API Controllers
    //

    public function index()
    {
        $students = Student::all('id', 'student_name', 'ip_address');

        return [
            "status" => "All Data",
            "data" => $students
        ];
    }

    public function show($id)
    {
        $student = Student::find($id);
        
        return [
            "status" => "Single Data",
            "data" => $student
        ];
    }    

    public function store(Request $request)
    {
        $student = new Student;
        $student->room_id = "1";
        $student->student_name = $request->student_name;
        $student->ip_address = $request->ip_address;
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
