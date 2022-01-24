<?php

namespace App\Controllers;

use App\Models\ModelAdmin;
use App\Models\ModelBanner;
use App\Models\ModelTa;

class Home extends BaseController
{
    public function __construct()
    {
        $this->ModelTa = new ModelTa();
        $this->ModelBanner = new ModelBanner();
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index()
    {
        $data = [
            'title' => 'Home',
            'ta' => $this->ModelTa->tampilByStatus(),
            'banner' => $this->ModelBanner->getAllData(),
            'beranda' => $this->ModelAdmin->detailPengaturan(),
            'jmlPendaftar' => $this->ModelBanner->jumlahPendaftar(),
            'jmlPr' => $this->ModelBanner->jumlahPr(),
            'jmlLk' => $this->ModelBanner->jumlahLk(),
        ];

        return view('v_home', $data);
    }
}
