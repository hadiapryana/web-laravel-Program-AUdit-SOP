<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class seksi extends Model
{
    protected $table = 'seksi';
    protected $primaryKey = 'id';
    protected $fillable = ['dinas_id','bidang_id','nama_seksi','kepala_seksi'];

public function dinas()
    {
        return $this->belongsTo(dinas::class);

    }
public function bidang()
    {
        return $this->belongsTo(bidang::class);

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
