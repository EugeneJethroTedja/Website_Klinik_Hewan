<?php

namespace App\Http\Controllers;

use App\Models\Pesan; 
use Illuminate\Http\Request;

class PesanController extends Controller
{
    /**
     * Handle the incoming contact form submission.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subjek' => 'required|string|max:255',
            'pesan' => 'required|string',
        ]);

        Pesan::create([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'subjek' => $request->subjek,
            'pesan' => $request->pesan,
        ]);

        return redirect()->route('kontak')->with('success', 'Pesan Anda berhasil dikirim!');
    }


    public function index()
    {
        $pesans = Pesan::latest()->paginate(10); 
        return view('admin.pesans.index', compact('pesans')); 
    }

    public function show(Pesan $pesan)
    {
        return view('admin.pesans.show', compact('pesan'));
    }


    public function destroy(Pesan $pesan)
    {
        $pesan->delete();
        return redirect()->route('admin.pesans.index')->with('success', 'Pesan berhasil dihapus.');
    }
}

