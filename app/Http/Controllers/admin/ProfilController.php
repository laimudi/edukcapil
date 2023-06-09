<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profil = Profil::first();
        return view('admin.profil.profil', compact('profil'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'struktur' => 'required|mimes:pdf'
        ]);

        if ($validasi->fails()) {
            return redirect()->back();
        }

        $document = $request->struktur;
        $struktur = time() . '.' . $document->getClientOriginalExtension();
        $request->struktur->move(public_path('storage/profil-pdf/'), $struktur);

        $profil = Profil::create([
            'tentang' => $request->tentang,
            'visi' => $request->visi,
            'misi' => $request->misi,
            'struktur' => $request->struktur
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $profil = Profil::findOrFail($id);
        if ($request->file('struktur') == null) {
            $profil->update([
                'tentang' => $request->tentang,
                'visi' => $request->visi,
                'misi' => $request->misi
            ]);
        } elseif ($request->file('struktur') != null) {
            $filename = public_path('storage/profil-pdf') . $profil->struktur;
            if (file_exists($filename)) {
                @unlink($filename);
            }
            Storage::delete($filename);

            $document = $request->struktur;
            $struktur = time() . '.' . $document->getClientOriginalExtension();
            $request->struktur->move(public_path('storage/profil-pdf/'), $struktur);

            $profil = Profil::create([
                'tentang' => $request->tentang,
                'visi' => $request->visi,
                'misi' => $request->misi,
                'struktur' => $request->struktur
            ]);

            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
