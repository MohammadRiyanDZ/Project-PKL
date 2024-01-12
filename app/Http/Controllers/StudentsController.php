<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rayons;
use App\Models\Rombels;
use App\Models\Students;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rombels = Rombels::all();
        $student = Students::all();
        $rayons = Rayons::all();  
        return view('student.index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    $rombels = Rombels::all(); 
    $rayons = Rayons::all(); 

    return view('student.create', compact('rombels', 'rayons'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'nis' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required',
        ]);

        Students::create([
            'name' => $request->name,
            'nis' => $request->nis,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
            // 'password' => bcrypt(substr('name', 0, 3) . substr('email', 0, 3)),

        ]);

        // atau jika seluruh data input akan dimasukkan langsung ke db bisa dengan perintah Students::create($request->all());

        return redirect()->back()->with('success', 'Berhasil menambahkan data Students!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Students $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Students::find($id);
        $rombels = Rombels::all(); 
        $rayons = Rayons::all();  

        //atau $student = Students::where('id', $id)->first()

        return view('student.edit', compact('student','rombels','rayons'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {

        $request->validate([
            'name' => 'required',
            'nis' => 'required',
            'rombel_id' => 'required',
            'rayon_id' => 'required',
        ]);
    
        // Update the student record
        Students::where('id', $id)->update([
            'name' => $request->name,
            'nis' => $request->nis,
            'rombel_id' => $request->rombel_id,
            'rayon_id' => $request->rayon_id,
        ]);

        return redirect()->route('student.home')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Students::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }
}
