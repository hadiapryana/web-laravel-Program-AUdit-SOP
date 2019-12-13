<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jawaban extends Model
{
    protected $table = 'jawaban';
    protected $primaryKey = 'id';
    protected $fillable = ['aktivitas_id','sop_id','tanggal','jwb1','catatan1','jwb2','catatan2','jwb3','catatan3','jwb4','catatan4','jwb5','catatan5','jwb6','catatan6','jwb7','catatan7'
    ,'jwb8','catatan8','jwb9','catatan9','jwb10','catatan10','total','hasil'];

    public function aktivitas()
    {
        return $this->belongsTo(aktivitas::class);

    }
    public function sop()
    {
        return $this->belongsTo(sop::class);

    }
}
