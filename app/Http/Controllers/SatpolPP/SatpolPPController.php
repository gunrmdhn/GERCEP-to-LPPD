<?php

namespace App\Http\Controllers\SatpolPP;

use App\Models\Berkas;
use App\Models\SatpolPP;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreSatpolPPRequest;
use App\Http\Requests\UpdateSatpolPPRequest;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class SatpolPPController extends Controller
{
    public $title = 'Satpol PP';

    public function index()
    {
        return view('satpolpp/index', [
            'title' => $this->title,
            'data' => SatpolPP::get(),
            'berkas' => Berkas::where('kategori', auth()->user()->peran)->get(),
        ]);
    }

    public function create()
    {
        $kode = IdGenerator::generate([
            'table' => 'tabel_satpolpp',
            'field' => 'kode',
            'length' => 12,
            'prefix' => 'SATPOLPP-',
            'reset_on_prefix_change' => true,
        ]);
        return view('satpolpp/index', [
            'title' => $this->title,
            'kode' => $kode,
            'sumber_data' => auth()->user()->peran,
            'satpolpp' => new SatpolPP(),
        ]);
    }

    public function store(StoreSatpolPPRequest $request)
    {
        $data = $request->except('berkas', 'bukti');
        foreach ($request->file() as $key => $file) {
            $data[$key] = $file->storeAs('satpolpp/' . $data['kode'], $file->hashName());;
        }
        SatpolPP::create($data);
        return redirect(route('satpolpp.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(SatpolPP $satpolpp)
    {
        //
    }

    public function edit(SatpolPP $satpolpp)
    {
        return view('satpolpp/index', [
            'title' => $this->title,
            'kode' => $satpolpp->kode,
            'sumber_data' => $satpolpp->sumber_data,
            'satpolpp' => $satpolpp,
        ]);
    }

    public function update(UpdateSatpolPPRequest $request, SatpolPP $satpolpp)
    {
        $data = $request->except('berkas', 'bukti', '_token', '_method');
        if ($request->file()) {
            foreach ($request->file() as $key => $file) {
                Storage::delete($satpolpp->$key);
                $data[$key] = $file->storeAs('satpolpp/' . $data['kode'], $file->hashName());
            }
        }
        SatpolPP::where('id', $satpolpp->id)->update($data);
        return redirect(route('satpolpp.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(SatpolPP $satpolpp)
    {
        foreach ($satpolpp->only('berkas', 'bukti') as $path) {
            Storage::delete($path);
        }
        SatpolPP::destroy($satpolpp->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
