<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atenciones extends Model
{
    use HasFactory;

    protected $table = 'cre_atend';

    protected $fillable = [ 'Nom_mac', 'ide_ser', 'ide_ate','Num_doc_cli', 'Hra_llg', 'Hra_lla', 'Tpo_esp', 'Fin_ate', 'Tpo_tot', 'Num_tik', 'Est_Ate', 'Fec_ate', 'Ide_mod', 'Tip_Cnl', 'des_pri'];

    public $timestamps = false;
}
