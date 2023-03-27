<?php

namespace App\Http\Controllers\Dinkes;

use App\Models\Dinkes;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreDinkesRequest;
use App\Http\Requests\UpdateDinkesRequest;
use App\Models\Berkas;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class DinkesController extends Controller
{
    public $title = 'Dinas Kesehatan';

    public function index()
    {
        return view('dinkes/index', [
            'title' => $this->title,
            'data' => Dinkes::get(),
            'berkas' => Berkas::where('kategori', auth()->user()->peran)->get(),
        ]);
    }

    public function create()
    {
        $kode = IdGenerator::generate([
            'table' => 'tabel_dinkes',
            'field' => 'kode',
            'length' => 10,
            'prefix' => 'DINKES-',
            'reset_on_prefix_change' => true,
        ]);
        return view('dinkes/index', [
            'title' => $this->title,
            'kode' => $kode,
            'sumber_data' => auth()->user()->peran,
            'dinkes' => new Dinkes(),
        ]);
    }

    public function store(StoreDinkesRequest $request)
    {
        $data = $request->except('berkas', 'bukti');
        foreach ($request->file() as $key => $file) {
            $data[$key] = $file->storeAs('dinkes/' . $data['kode'], $file->hashName());
        }
        Dinkes::create($data);
        return redirect(route('dinkes.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(Dinkes $dinkes)
    {
        //
    }

    public function edit(Dinkes $dinkes)
    {
        return view('dinkes/index', [
            'title' => $this->title,
            'kode' => $dinkes->kode,
            'sumber_data' => $dinkes->sumber_data,
            'dinkes' => $dinkes,
        ]);
    }

    public function update(UpdateDinkesRequest $request, Dinkes $dinkes)
    {
        $data = $request->except('berkas', 'bukti', '_token', '_method');
        if ($request->file()) {
            foreach ($request->file() as $key => $file) {
                Storage::delete($dinkes->$key);
                $data[$key] = $file->storeAs('dinkes/' . $data['kode'], $file->hashName());
            }
        }
        Dinkes::where('id', $dinkes->id)->update($data);
        return redirect(route('dinkes.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(Dinkes $dinkes)
    {
        foreach ($dinkes->only('berkas', 'bukti') as $path) {
            Storage::delete($path);
        }
        Dinkes::destroy($dinkes->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
