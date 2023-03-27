<?php

namespace App\Http\Controllers\Sekda;

use App\Models\PUPR;
use App\Models\Dinkes;
use App\Models\Dinsos;
use App\Models\Dinpend;
use App\Models\SatpolPP;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SekdaController extends Controller
{
    public $title = 'Kepala Bagian';

    public function __invoke(Request $request)
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
        return view('sekda/index', [
            'title' => $this->title,
            'menu' => $menu,
        ]);
    }
}
