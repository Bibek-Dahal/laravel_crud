<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;

use App\Models\rc;
use Illuminate\Http\Request;
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
        $students = Student::all();
        // dd($students);
        
        return view('home',['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {   
       
        $validated = $req->validate([
            'email' => 'required|unique:students|max:255|email',
            'first_name' => 'required|max:50',
            'middle_name'=>'max:3',
            'last_name'=>'required|max:50',
            'city'=>'required|max:50',
            'roll'=>'required|integer|unique:students'
        ]);
        $student = Student::create([
            'email'=>$validated['email'],
            'first_name'=>$validated['first_name'],
            'middle_name'=>$validated['middle_name'],
            'last_name'=>$validated['last_name'],
            'roll'=>$validated['roll'],
            'city'=>$validated['city']
        ]);
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\rc  $rc
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req,$id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\rc  $rc
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req,$id)
    {
        
        $student = Student::find($id);
        // dd($student);
        return view('edit',['student'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\rc  $rc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $student = Student::find($id);
        $validated = $req->validate([
            'email' => [
                'required',
                'max:255',
                Rule::unique('students')->ignore($student->id),
            ],
            'first_name' => 'required|max:50',
            'middle_name'=>'max:3',
            'last_name'=>'required|max:50',
            'city'=>'required|max:50',
            'roll'=>[
                'required',
                'integer',
                Rule::unique('students')->ignore($student->id)
                ]
        ]);
        $student->update($req->all());
        return redirect('/')->with('status','student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\rc  $rc
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req,$id)
    {
        Student::find($id)->delete();
        return redirect('/')->with('status','student deleted successfully');
    }
}
