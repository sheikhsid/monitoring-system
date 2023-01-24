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
        

        return view('/welcome', compact('students','countstudents','roomdata'));

    }

    //Get Data for view
    function viewData($id){

        $data= Student::find($id);

        $students = Student::all();
        $countstudents = Student::all()->count();
        $roomdata = Room::all()->where('id',"1");

        return view('/view',['data'=>$data, 'students'=>$students, 'countstudents'=>$countstudents, 'roomdata'=>$roomdata]);   

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all(); 

        return [
            "status" => 'ALL DATA',
            "data" => $students,
        ];
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        $students = Student::find($id);
        
        return [
            "status" => 'SINGLE DATA',
            "data" => $students
        ];
    }    


    public function update(Request $request, $id)
    {
       
        $request->validate([
            'room_id'=>'nullable | max:225',
            'student_name'=>'nullable | max:225',
            'ip_address'=>'nullable | max:225'
        ]);

        $data = $request->all();
        $student = Student::where('id', $id)->firstOrFail();
        $student->fill($data);
        $student->save();
    
        $jsonData = [
            'status' => 'SUCCESS',
            'data' => [
                'room_id' => $student->room_id,
                'student_name' => $student->student_name,
                'ip_address' => $student->ip_address,
            ]
        ];
    
        return response()->json($jsonData);
    }

}
