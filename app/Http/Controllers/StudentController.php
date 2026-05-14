<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
   
    return view('student.index', [
        'title' => 'student',
        'students'=> student::latest()-> get(),
       // 'students'=> student::latest()-> get(),
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
       return view('student.create', [
        'title' => 'Tambah Student'
    ]);
}
    
   /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
    'name' => 'required|max:255',
    'nim' => 'required|digits:11|numeric',
], [
    'name.required' => 'nama tidak boleh kosong',
    'name.max' => 'nama tidak boleh lebih dari :max karakter',
    'nim.required' => 'nim tidak boleh kosong',
    'nim.digits' => 'nim wajib :digits digit',
    'nim.numeric' => 'nim wajib angka',
]);
 
    student::create($validated);
    return to_route('student.index')->withsuccess('Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(student $student)
    {
         return view('student.edit', [
        'title' => 'edit student',
        'student'=> $student,
        ]); 
    }

    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, student $student )
    {
       $validated = $request->validate([
    'name' => 'required|max:255',
    'nim' => 'required|digits:11|numeric',
], [
    'name.required' => 'nama tidak boleh kosong',
    'name.max' => 'nama tidak boleh lebih dari :max karakter',
    'nim.required' => 'nim tidak boleh kosong',
    'nim.digits' => 'nim wajib :digits digit',
    'nim.numeric' => 'nim wajib angka',
]);
 
    $student->update($validated);
    return to_route('student.index')->withsuccess('Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(student $student)
    {
        
    $student->delete($student);
    return to_route('student.index')->withsuccess('Data berhasil dihapus');
    }

}