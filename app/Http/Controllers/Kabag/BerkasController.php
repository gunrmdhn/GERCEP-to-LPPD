<?php

namespace App\Http\Controllers\Kabag;

use App\Models\Berkas;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreBerkasRequest;
use App\Http\Requests\UpdateBerkasRequest;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class BerkasController extends Controller
{
    public $title = 'Berkas';

    public function index()
    {
        return view('berkas/index', [
            'title' => $this->title,
            'data' => Berkas::get(),
        ]);
    }

    public function create()
    {
        $kode = IdGenerator::generate([
            'table' => 'tabel_berkas',
            'field' => 'kode',
            'length' => 7,
            'prefix' => 'BERKAS-',
            'reset_on_prefix_change' => true,
        ]);
        return view('berkas/index', [
            'title' => $this->title,
            'kode' => $kode,
            'berkas' => new Berkas(),
            'kategori' => [
                'DINKES',
                'PU & PR',
                'DINPEND',
                'SATPOL PP',
                'DINSOS',
            ]
        ]);
    }

    public function store(StoreBerkasRequest $request)
    {
        $data = $request->except('berkas');
        foreach ($request->file() as $key => $file) {
            $data[$key] = $file->storeAs('berkas/' . $data['kode'], $file->hashName());
        }
        Berkas::create($data);
        return redirect(route('berkas.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(Berkas $berkas)
    {
        //
    }

    public function edit(Berkas $berkas)
    {
        return view('berkas/index', [
            'title' => $this->title,
            'kode' => $berkas->kode,
            'berkas' => $berkas,
            'kategori' => [
                'DINKES',
                'PU & PR',
                'DINPEND',
                'SATPOL PP',
                'DINSOS',
            ]
        ]);
    }

    public function update(UpdateBerkasRequest $request, Berkas $berkas)
    {
        $data = $request->except('berkas', '_token', '_method');
        if ($request->file()) {
            foreach ($request->file() as $key => $file) {
                Storage::delete($berkas->$key);
                $data[$key] = $file->storeAs('berkas/' . $data['kode'], $file->hashName());
            }
        }
        Berkas::where('id', $berkas->id)->update($data);
        return redirect(route('berkas.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(Berkas $berkas)
    {
        foreach ($berkas->only('berkas') as $path) {
            Storage::delete($path);
        }
        Berkas::destroy($berkas->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
