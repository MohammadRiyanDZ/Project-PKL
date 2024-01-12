<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Rayons;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class RayonsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rayon = Rayons::all();
        $psUser = User::where('role', 'ps')->get(); 
        return view('rayon.index', compact('rayon','psUser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $psUser = User::where('role', 'ps')->get();
        return view('rayon.create', compact('psUser'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rayon' => 'required',
            'user_id' => 'required',
        ]);

        Rayons::create([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data Rayons!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Rayons $rayon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rayon = Rayons::find($id);
        $psUser = User::where('role', 'ps')->get();

        return view('rayon.edit', compact('rayon', 'psUser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'rayon' => 'required',
            'user_id' => 'required',
        ]);

        Rayons::where('id', $id)->update([
            'rayon' => $request->rayon,
            'user_id' => $request->user_id,
        ]);

        return redirect()->route('rayon.home')->with('success', 'Berhasil mengubah data!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Rayons::where('id', $id)->delete();

        return redirect()->back()->with('deleted', 'Berhasil menghapus data!');
    }

}
