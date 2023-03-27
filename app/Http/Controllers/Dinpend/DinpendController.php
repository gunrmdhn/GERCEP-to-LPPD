<?php

namespace App\Http\Controllers\Dinpend;

use App\Models\Berkas;
use App\Models\Dinpend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreDinpendRequest;
use App\Http\Requests\UpdateDinpendRequest;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class DinpendController extends Controller
{
    public $title = 'Dinas Pendidikan';

    public function index()
    {
        return view('dinpend/index', [
            'title' => $this->title,
            'data' => Dinpend::get(),
            'berkas' => Berkas::where('kategori', auth()->user()->peran)->get(),
        ]);
    }

    public function create()
    {
        $kode = IdGenerator::generate([
            'table' => 'tabel_dinpend',
            'field' => 'kode',
            'length' => 11,
            'prefix' => 'DINPEND-',
            'reset_on_prefix_change' => true,
        ]);
        return view('dinpend/index', [
            'title' => $this->title,
            'kode' => $kode,
            'sumber_data' => auth()->user()->peran,
            'dinpend' => new Dinpend(),
        ]);
    }

    public function store(StoreDinpendRequest $request)
    {
        $data = $request->except('berkas', 'bukti');
        foreach ($request->file() as $key => $file) {
            $data[$key] = $file->storeAs('dinpend/' . $data['kode'], $file->hashName());;
        }
        Dinpend::create($data);
        return redirect(route('dinpend.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(Dinpend $dinpend)
    {
        //
    }

    public function edit(Dinpend $dinpend)
    {
        return view('dinpend/index', [
            'title' => $this->title,
            'kode' => $dinpend->kode,
            'sumber_data' => $dinpend->sumber_data,
            'dinpend' => $dinpend,
        ]);
    }

    public function update(UpdateDinpendRequest $request, Dinpend $dinpend)
    {
        $data = $request->except('berkas', 'bukti', '_token', '_method');
        if ($request->file()) {
            foreach ($request->file() as $key => $file) {
                Storage::delete($dinpend->$key);
                $data[$key] = $file->storeAs('dinpend/' . $data['kode'], $file->hashName());
            }
        }
        Dinpend::where('id', $dinpend->id)->update($data);
        return redirect(route('dinpend.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(Dinpend $dinpend)
    {
        foreach ($dinpend->only('berkas', 'bukti') as $path) {
            Storage::delete($path);
        }
        Dinpend::destroy($dinpend->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
