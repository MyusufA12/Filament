<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Dosen;
use App\Models\Matkul;

class Laporan extends Page
{
   
    // Nama tampilan halaman custom
    protected static string $view = 'filament.pages.Laporan';

    // Data yang akan di-passing ke tampilan
    public $dosenMatkulData;

    public function mount()
    {
        // Mengambil data dosen dan mata kuliah terkait
        $this->dosenMatkulData = Dosen::with('mataKuliah')->get();
    }
}
