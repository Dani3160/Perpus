<?php

namespace App\Exports;

use App\Model\DataMaster\Biblio;
use Maatwebsite\Excel\Concerns\FromCollection;

class BiblioExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Biblio::All(); 
    }
}
