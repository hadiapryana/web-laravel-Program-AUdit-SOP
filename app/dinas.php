<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dinas extends Model
{
    protected $table = 'dinas';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_dinas','kepala_dinas','alamat','email','no_telepon'];

    public function bidang()
    {
        return $this->hasMany(bidang::class);

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
    public function user()
    {
        return $this->hasMany(user::class);

    }
    
}
