<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class surat_kerja extends Model
{
    protected $table = 'surat_kerja';
    protected $primaryKey = 'id';
    protected $fillable = ['no_surat','tgl_penugasan','nama_pengawas','sop_id','aktivitas_id'];

    public function sop()
    {
        return $this->belongsTo(sop::class);

    }
    public function aktivitas()
    {
        return $this->belongsTo(aktivitas::class);

    }
}
