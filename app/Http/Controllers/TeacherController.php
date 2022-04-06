<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;
use App\Models\Teacher;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teacher = Teacher::paginate(10);
        return view('revinfotech.teacherList')->with(['teacher'=>$teacher]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('revinfotech.createTeacher');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request)
    {
        $validated = $request->validated();
        $teacher = new Teacher();
        $teacher->name = $validated['name'];
        $teacher->subject = $validated['subject'];
        $teacher->phone = $validated['phone'];
        $teacher->school = $validated['school'];
        $teacher->class_teaching = $validated['class_teaching'];        
        $path = $request->file('photo')->store('public');
        $teacher->logo = $path;
        if($teacher->save())
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
        $data = Teacher::join('student','student.class_study','=','teacher.class_teaching')
                ->where('teacher_id',$id)
                ->get(['student.name as StudentName','student.class_study as StudentClass','student.phone'])
                ->sortByDesc('student_id');
        
        $teacher = Teacher::findOrFail($id);
        return view('revinfotech.detailTeacher')->with(['data'=>$data,'teacher'=>$teacher]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);

        return view('revinfotech.editTeacher')->with(['teacher'=>$teacher]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validated();
        $teacher = Teacher::find($id);
        $teacher->name = $validated['name'];
        $teacher->subject = $validated['subject'];
        $teacher->phone = $validated['phone'];
        $teacher->school = $validated['school'];
        $teacher->class_teaching = $validated['class_teaching'];                
        $path = "";
        if($request->file('photo'))
        {
            $path = $request->file('photo')->store('public');
        }
        $teacher->photo = $path;
        if($teacher->save())
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
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->back()->with(['Response'=>"Success","Msg"=>"Record deleted"]);
    }
}
