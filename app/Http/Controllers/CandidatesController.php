<?php

namespace App\Http\Controllers;

use App\Models\Candidates;
use Illuminate\Http\Request;

class CandidatesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Menampilkan data
        $candidates = Candidates::all();
        return view('candidates.index', compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('candidates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
         $validated = $request->validate([
            'job_id' => 'required',
            'name' => 'required',
            'email' => 'required|unique:candidates|max:255',
            'phone' => 'required|unique:candidates|max:255',
            'year' => 'required',
        ]);

        $candidates = new Candidates();
        $candidates->job_id = $request->job_id;
        $candidates->name = $request->name;
        $candidates->email = $request->email;
        $candidates->phone = $request->phone;
        $candidates->year = $request->year;
        $candidates->save();
        return redirect()->route('candidates.index')
            ->with('success', 'Data berhasil dibuat!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $candidates = Candidates::findOrFail($id);
        return view('candidates.show', compact('candidates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidates = Candidates::findOrFail($id);
        return view('candidates.edit', compact('candidates'));
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
        // Validasi
        $validated = $request->validate([
            'job_id' => 'required',
            'name' => 'required',
            'email' => 'required|unique:candidates|max:255',
            'phone' => 'required|unique:candidates|max:255',
            'year' => 'required',
        ]);

        $candidates = new Candidates();
        $candidates->job_id = $request->job_id;
        $candidates->name = $request->name;
        $candidates->email = $request->email;
        $candidates->phone = $request->phone;
        $candidates->year = $request->year;
        $candidates->save();
        return redirect()->route('candidates.index')
            ->with('success', 'Data berhasil diperbaharui!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidates = Candidates::findOrFail($id);
        $candidates->delete();
        return redirect()->route('candidates.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
