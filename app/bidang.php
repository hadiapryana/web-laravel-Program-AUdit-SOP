<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bidang extends Model
{
    protected $table = 'bidang';
    protected $primaryKey = 'id';
    protected $fillable = ['dinas_id','nama_bidang','kepala_bidang'];

    public function dinas()
    {
        return $this->belongsTo(Dinas::class);

    }
    public function seksi()
    {
        return $this->hasMany(seksi::class);

    }
    public function aktivitas()
    {
        return $this->hasMany(aktivitas::class);

    }
    public function sop()
    {
        return $this->hasMany(sop::class);

    }
}
