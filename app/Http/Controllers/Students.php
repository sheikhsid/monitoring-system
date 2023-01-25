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

    //Get Data
    Public function Data(){

        
        $students = Student::all();
        $countstudents = Student::all()->count();

        $roomdata = Room::all()->where('id',"1");
        

        return view('/add', compact('students','countstudents','roomdata'));

    }

    //Check validation and add product
    function addData(Request $req){

        $req->validate([
            'student_name'=>'required | max:225',
            'ip_address'=>'required | max:225'
        ]);

        $student= new Student;
        $student->room_id=1;
        $student->student_name=$req->student_name.'';
        $student->ip_address=$req->ip_address.'';
        $student->save();

        return redirect('/home');

    }

    //Get Data for view
    function viewData($id){

        $data= Student::find($id);

        $students = Student::all();
        $countstudents = Student::all()->count();
        $roomdata = Room::all()->where('id',"1");

        return view('/view',['data'=>$data, 'students'=>$students, 'countstudents'=>$countstudents, 'roomdata'=>$roomdata]);   

    }

    //Delete Data
    function deleteData($id){

        $data= Student::find($id);
        $data->delete();  
        return redirect('/home');      

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
