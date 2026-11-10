<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ObatController extends Controller
{
    public function index(Request $request)
    {
        $query = Obat::query();

        if ($request->has('search') && $request->input('search') != '') {
            $searchTerm = $request->input('search');

            $query->where('nama_obat', 'like', '%' . $searchTerm . '%')
                  ->orWhere('produsen', 'like', '%' . $searchTerm . '%')
                  ->orWhere('deskripsi', 'like', '%' . $searchTerm . '%');
        }

        $obats = $query->latest()->paginate(10);

        $i = ($obats->currentPage() - 1) * $obats->perPage();

        return view('obats.index', compact('obats', 'i'));
    }

    public function indexAdmin(Request $request)
    {
        $query = Obat::query();

        if ($request->has('search') && $request->input('search') != '') {
            $searchTerm = $request->input('search');

            $query->where('nama_obat', 'like', '%' . $searchTerm . '%')
                  ->orWhere('produsen', 'like', '%' . $searchTerm . '%')
                  ->orWhere('deskripsi', 'like', '%' . $searchTerm . '%');
        }

        $obats = $query->latest()->paginate(10);

        $i = ($obats->currentPage() - 1) * $obats->perPage();

        return view('admin.admin', compact('obats', 'i'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'produsen' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'tanggal_kadaluarsa' => 'nullable|date',
        ]);

        $input = $request->all();

        if ($request->hasFile('foto')) {
            $imageName = time().'.'.$request->foto->extension();
            $request->foto->storeAs('public/obats', $imageName);
            $input['foto'] = $imageName;
        }

        Obat::create($input);

        return redirect()->route('admin')
                         ->with('success', 'Obat berhasil ditambahkan.');
    }

    public function showAdmin(Obat $obat)
    {
        return view('admin.show', compact('obat'));
    }

    public function show(Obat $obat)
    {
        return view('obats.show', compact('obat'));
    }

    public function edit(Obat $obat)
    {
        return view('admin.edit', compact('obat'));
    }

    public function update(Request $request, Obat $obat)
    {
        $request->validate([
            'nama_obat' => 'required|string|max:255',
            'produsen' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'stok' => 'required|integer|min:0',
            'harga' => 'required|numeric|min:0',
            'tanggal_kadaluarsa' => 'nullable|date',
        ]);

        $input = $request->all();

        if ($request->hasFile('foto')) {
            if ($obat->foto && Storage::exists('public/obats/' . $obat->foto)) {
                Storage::delete('public/obats/' . $obat->foto);
            }

            $imageName = time().'.'.$request->foto->extension();
            $request->foto->storeAs('public/obats', $imageName);
            $input['foto'] = $imageName;
        } else {
            if ($request->filled('hapus_foto')) {
                if ($obat->foto && Storage::exists('public/obats/' . $obat->foto)) {
                    Storage::delete('public/obats/' . $obat->foto);
                }
                $input['foto'] = null;
            } else {
                $input['foto'] = $obat->foto;
            }
        }

        $obat->update($input);

        return redirect()->route('admin')
                         ->with('success', 'Obat berhasil diperbarui.');
    }

    public function destroy(Obat $obat)
    {
        if ($obat->foto && Storage::exists('public/obats/' . $obat->foto)) {
            Storage::delete('public/obats/' . $obat->foto);
        }

        $obat->delete();

        return redirect()->route('admin')
                         ->with('success', 'Obat berhasil dihapus.');
    }
}