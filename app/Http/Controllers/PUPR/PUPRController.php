<?php

namespace App\Http\Controllers\PUPR;

use App\Models\PUPR;
use App\Models\Berkas;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePUPRRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdatePUPRRequest;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PUPRController extends Controller
{
    public $title = 'PU & PR';

    public function index()
    {
        return view('pupr/index', [
            'title' => $this->title,
            'data' => PUPR::get(),
            'berkas' => Berkas::where('kategori', auth()->user()->peran)->get(),
        ]);
    }

    public function create()
    {
        $kode = IdGenerator::generate([
            'table' => 'tabel_pupr',
            'field' => 'kode',
            'length' => 8,
            'prefix' => 'PUPR-',
            'reset_on_prefix_change' => true,
        ]);
        return view('pupr/index', [
            'title' => $this->title,
            'kode' => $kode,
            'sumber_data' => auth()->user()->peran,
            'pupr' => new PUPR(),
        ]);
    }

    public function store(StorePUPRRequest $request)
    {
        $data = $request->except('berkas', 'bukti');
        foreach ($request->file() as $key => $file) {
            $data[$key] = $file->storeAs('pupr/' . $data['kode'], $file->hashName());;
        }
        PUPR::create($data);
        return redirect(route('pupr.index'))->with('berhasil', 'Data berhasil ditambahkan!');
    }

    public function show(PUPR $pupr)
    {
        //
    }

    public function edit(PUPR $pupr)
    {
        return view('pupr/index', [
            'title' => $this->title,
            'kode' => $pupr->kode,
            'sumber_data' => $pupr->sumber_data,
            'pupr' => $pupr,
        ]);
    }

    public function update(UpdatePUPRRequest $request, PUPR $pupr)
    {
        $data = $request->except('berkas', 'bukti', '_token', '_method');
        if ($request->file()) {
            foreach ($request->file() as $key => $file) {
                Storage::delete($pupr->$key);
                $data[$key] = $file->storeAs('pupr/' . $data['kode'], $file->hashName());
            }
        }
        PUPR::where('id', $pupr->id)->update($data);
        return redirect(route('pupr.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function destroy(PUPR $pupr)
    {
        foreach ($pupr->only('berkas', 'bukti') as $path) {
            Storage::delete($path);
        }
        PUPR::destroy($pupr->id);
        return back()->with('berhasil', 'Data berhasil dihapus!');
    }
}
