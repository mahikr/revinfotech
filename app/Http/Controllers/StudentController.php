<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::paginate(10);
        return view('revinfotech.studentList')->with(['student'=>$student]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('revinfotech.createStudent');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $validated = $request->validated();
        $student = new Student();
        $student->name = $validated['name'];
        $student->father_name = $validated['father_name'];
        $student->phone = $validated['phone'];
        $student->school = $validated['school'];
        $student->class_studying = $validated['class_study'];        
        $path = $request->file('photo')->store('public');
        $student->logo = $path;
        if($student->save())
        {
            return redirect()->back()->with(['Response'=>"Success","Msg"=>"Record inserted"]);
        }
        else
        {
            return redirect()->back()->withErrors(['Response'=>'Error',"Msg"=>"Something went wrong"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return view('revinfotech.editStudent')->with(['student'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        $validated = $request->validated();
        $student = Student::find($id);
        $student->name = $validated['name'];
        $student->father_name = $validated['father_name'];
        $student->phone = $validated['phone'];
        $student->school = $validated['school'];
        $student->class_studying = $validated['class_study'];                
        $path = "";
        if($request->file('photo'))
        {
            $path = $request->file('photo')->store('public');
        }
        $student->photo = $path;
        if($student->save())
        {
            return redirect()->back()->with(['Response'=>"Success","Msg"=>"Record inserted"]);
        }
        else
        {
            return redirect()->back()->withErrors(['Response'=>'Error',"Msg"=>"Something went wrong"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->back()->with(['Response'=>"Success","Msg"=>"Record deleted"]);
    }
}
