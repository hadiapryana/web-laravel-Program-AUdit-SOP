<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sop extends Model
{
        protected $table = 'sop';
        protected $primaryKey = 'id';
        protected $fillable = ['dinas_id','bidang_id','seksi_id','aktivitas_id','nama_sop','file','versi','status','tgl_penetapan','tgl_pemberhentian','keterangan'];
    
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
            return $this->hasMany(arsip_sop::class);
    
        }
        public function user()
        {
            return $this->hasMany(user::class);
    
        }
    }