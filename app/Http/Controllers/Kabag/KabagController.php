<?php

namespace App\Http\Controllers\Kabag;

use App\Http\Controllers\Controller;
use App\Models\Dinkes;
use App\Models\Dinpend;
use App\Models\Dinsos;
use App\Models\PUPR;
use App\Models\SatpolPP;
use Illuminate\Http\Request;

class KabagController extends Controller
{
    public $title = 'Kepala Bagian';

    public function index()
    {
        $menu = [
            [
                'title' => 'Dinas Kesehatan',
                'link' => 'dinkes',
                'data' => Dinkes::get(),
            ],
            [
                'title' => 'PU & PR',
                'link' => 'pupr',
                'data' => PUPR::get(),
            ],
            [
                'title' => 'Dinas Pendidikan',
                'link' => 'dinpend',
                'data' => Dinpend::get(),
            ],
            [
                'title' => 'Satpol PP',
                'link' => 'satpolpp',
                'data' => SatpolPP::get(),
            ],
            [
                'title' => 'Dinas Sosial',
                'link' => 'dinsos',
                'data' => Dinsos::get(),
            ],
        ];
        return view('kabag/index', [
            'title' => $this->title,
            'menu' => $menu,
            'cek' => [
                false => 'Tidak Sesuai',
                true => 'Sesuai',
            ],
        ]);
    }

    public function updateDinkes(Request $request, Dinkes $dinkes)
    {
        $data = $request->except('berkas', 'bukti', '_token', '_method');
        Dinkes::where('id', $dinkes->id)->update($data);
        return redirect(route('kabag.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function updatePupr(Request $request, PUPR $pupr)
    {
        $data = $request->except('berkas', 'bukti', '_token', '_method');
        PUPR::where('id', $pupr->id)->update($data);
        return redirect(route('kabag.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function updateDinpend(Request $request, Dinpend $dinpend)
    {
        $data = $request->except('berkas', 'bukti', '_token', '_method');
        Dinpend::where('id', $dinpend->id)->update($data);
        return redirect(route('kabag.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function updateSatpolPP(Request $request, SatpolPP $satpolpp)
    {
        $data = $request->except('berkas', 'bukti', '_token', '_method');
        SatpolPP::where('id', $satpolpp->id)->update($data);
        return redirect(route('kabag.index'))->with('berhasil', 'Data berhasil diubah!');
    }

    public function updateDinsos(Request $request, Dinsos $dinsos)
    {
        $data = $request->except('berkas', 'bukti', '_token', '_method');
        Dinsos::where('id', $dinsos->id)->update($data);
        return redirect(route('kabag.index'))->with('berhasil', 'Data berhasil diubah!');
    }
}
