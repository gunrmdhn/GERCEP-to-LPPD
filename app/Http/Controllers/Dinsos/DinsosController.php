<?php

namespace App\Http\Controllers\Dinsos;

use App\Models\Berkas;
use App\Models\Dinsos;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreDinsosRequest;
use App\Http\Requests\UpdateDinsosRequest;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class DinsosController extends Controller
{
    public $title = 'Dinas Sosial';

    public function index()
    {
        return view('dinsos/index', [
            'title' => $this->title,
            'data' => Dinsos::get(),
            'berkas' => Berkas::where('kategori', auth()->user()->peran)->get(),
        ]);
    }

    public function create()
    {
        $kode = IdGenerator::generate([
            'table' => 'tabel_dinsos',
            'field' => 'kode',
            'length' => 10,
            'prefix' => 'DINSOS-',
            'reset_on_prefix_change' => true,
        ]);
        return view('dinsos/index', [
            'title' => $this->title,
            'kode' => $kode,
            'sumber_data' => auth()->user()->peran,
            'dinsos' => new Dinsos(),
        ]);
    }

    public function store(StoreDinsosRequest $request)
    {
        $data = $request->except('berkas', 'bukti');
        foreach ($request->file() as $key => $file) {
            $data[$key] = $file->storeAs('dinsos/' . $data['kode'], $file->hashName());;
        }
        Dinsos::create($data);
        return redirect(route('dinsos.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(Dinsos $dinsos)
    {
        //
    }

    public function edit(Dinsos $dinsos)
    {
        return view('dinsos/index', [
            'title' => $this->title,
            'kode' => $dinsos->kode,
            'sumber_data' => $dinsos->sumber_data,
            'dinsos' => $dinsos,
        ]);
    }

    public function update(UpdateDinsosRequest $request, Dinsos $dinsos)
    {
        $data = $request->except('berkas', 'bukti', '_token', '_method');
        if ($request->file()) {
            foreach ($request->file() as $key => $file) {
                Storage::delete($dinsos->$key);
                $data[$key] = $file->storeAs('dinsos/' . $data['kode'], $file->hashName());
            }
        }
        Dinsos::where('id', $dinsos->id)->update($data);
        return redirect(route('dinsos.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(Dinsos $dinsos)
    {
        foreach ($dinsos->only('berkas', 'bukti') as $path) {
            Storage::delete($path);
        }
        Dinsos::destroy($dinsos->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
