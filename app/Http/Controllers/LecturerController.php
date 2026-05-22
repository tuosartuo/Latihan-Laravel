<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Lecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return view('Lecturer.index', [
        'title' => 'Lecturer',
        'lecturers'=> Lecturer::latest()-> get(),
        
        ]); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('Lecturer.create', [
        'title' => 'create Lecturer',
        'departments'=> Department::latest()-> get(),
        
        ]); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
    'name' => 'required|max:255',
    'department_id' => 'required|exists:departments,id',
], [
    'name.required' => 'nama tidak boleh kosong',
    'name.max' => 'nama tidak boleh lebih dari :max karakter',
    'department_id.required' => 'program studi tidak boleh kosong',
    'department_id.exists' => 'program studi yang dipilih tidak ditemukan',
]);
 
    lecturer::create($validated);
    return to_route('lecturer.index')->withsuccess('Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(lecturer $lecturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(lecturer $lecturer)
    {
       return view('Lecturer.edit', [
        'title' => 'edit Lecturer',
        'departments'=> Department::latest()-> get(),
        'lecturer' => $lecturer,
        
        ]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, lecturer $lecturer)
    {
           $validated = $request->validate([
    'name' => 'required|max:255',
    'department_id' => 'required|exists:departments,id',
], [
    'name.required' => 'nama tidak boleh kosong',
    'name.max' => 'nama tidak boleh lebih dari :max karakter',
    'department_id.required' => 'program studi tidak boleh kosong',
    'department_id.exists' => 'program studi yang dipilih tidak ditemukan',
]);
 
    $lecturer->update($validated);
    return to_route('lecturer.index')->withsuccess('Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(lecturer $lecturer)
    {
        $lecturer->delete($lecturer);
    return to_route('lecturer.index')->withsuccess('Data berhasil dihapus');
    }
}
