<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table = 'artikel';

    protected $fillable = [
        'judul','slug','kategori_id','user_id','gambar_artikel','status','views','body'
    ];

    protected $hidden =[];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'kategori_id','id');
    }

    public function users()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}
