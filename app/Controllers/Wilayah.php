<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelSiswa;
use App\Models\ModelWilayah;

class Wilayah extends BaseController
{
    public function __construct()
    {
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelSiswa = new ModelSiswa();
    }

    public function dataKabupaten($id_provinsi)
    {
        $data = $this->ModelWilayah->getKabupaten($id_provinsi);


        foreach ($data as $d) {
            echo '<option value="' . $d['id_kabupaten'] . '"> ' . $d['nama_kabupaten'] . ' </option>';
        }
    }

    public function dataKecamatan($id_kabupaten)
    {
        $data = $this->ModelWilayah->getKecamatan($id_kabupaten);

        foreach ($data as $d) {
            echo '<option value="' . $d['id_kecamatan'] . '"> ' . $d['nama_kecamatan'] . ' </option>';
        }
    }
}
