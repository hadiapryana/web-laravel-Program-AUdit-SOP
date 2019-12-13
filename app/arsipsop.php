<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class arsipsop extends Model
{
    protected $table = 'arsip_sop';
    protected $primaryKey = 'id';
    protected $fillable = ['id_sop','nama_dinas','nama_bidang','nama_seksi','nama_aktivitas','nama_sop','file','versi','status','tgl_penetapan','tgl_pemberhentian','keterangan'];

public function dinas()
    {
        return $this->belongsTo(dinas::class);

    }
public function bidang()
    {
        return $this->belongsTo(bidang::class);

    }
public function seksi()
    {
        return $this->belongsTo(seksi::class);

    }
public function aktivitas()
     {
        return $this->belongsTo(aktivitas::class);

    }
    public function jawaban()
     {
    return $this->hasMany(jawaban::class);

    }
    public function surat_kerja()
    {
        return $this->hasMany(surat_kerja::class);

    }
    public function arsipsop()
     {
        return $this->belongsTo(arsip_sop::class);
     }
}
