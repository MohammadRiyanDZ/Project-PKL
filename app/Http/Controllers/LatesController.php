<?php

namespace App\Http\Controllers;

use \PDF;
use \Excel;
use App\Models\Lates;
use App\Models\Students;
use App\Exports\LateExport;
use Illuminate\Http\Request;

class LatesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lates = Lates::with('name')->get();
        return view('late.index', compact('lates'));
    }

    public function data()
    {
        $lates = Lates::with('name')->get();
        return view('late.data', compact('lates'));
    }

    public function cetakLate($id, $count)
    {

        $late = Lates::with('student.rombelid', 'student.rayonid')->find($id);

        $pdf = PDF::loadView('late.pdf', ['student' => $late->student, 'count' => $count]);

        return $pdf->download('surat_pernyataan.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new LateExport, 'exported_data.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Students::all();
        return view('late.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'date_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('bukti_keterlambatan', $filename, 'public');
            $validatedData['bukti'] = $filename;
        }

        Lates::create($validatedData);

        return redirect()->back()->with('success', 'Berhasil menambahkan data Keterlambatan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($name)
    {
        $lates = Lates::with('student')->where('name', $name)->get();
        return view('late.rekap', compact('lates'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $late = Lates::find($id);
        $students = Students::all();

        return view('late.edit', compact('late', 'students'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $late = Lates::find($id);

        $validatedData = $request->validate([
            'name' => 'required',
            'date_time_late' => 'required',
            'information' => 'required',
            'bukti' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('bukti')) {
            $file = $request->file('bukti');
            $filename = time() . '_' . $file->getClientOriginalName();
            $filename = pathinfo($filename, PATHINFO_FILENAME) . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('bukti_keterlambatan', $filename, 'public');
            $validatedData['bukti'] = $filename;
        } else {
            $validatedData['bukti'] = $late->bukti;
        }

        Lates::where('id', $id)->update($validatedData);

        return redirect()->route('late.home')->with('success', 'Rekaman berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Lates::where('id', $id)->delete();
        return redirect()->back()->with('deleted', 'Data berhasil dihapus');
    }
}