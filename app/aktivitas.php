<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class aktivitas extends Model
{
        protected $table = 'aktivitas';
        protected $primaryKey = 'id';
        protected $fillable = ['dinas_id','bidang_id','seksi_id','nama_aktivitas','kepala_aktivitas'];
    
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
    public function sop()
        {
            return $this->hasMany(sop::class);
    
        }
        public function jawaban()
        {
        return $this->hasMany(jawaban::class);

        }
        public function surat_kerja()
        {
            return $this->hasMany(surat_kerja::class);
    
        }
   
    }