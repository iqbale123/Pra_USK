<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesan extends Model
{
    use HasFactory;

    protected $fillbable =[
        'penerima_id',
        'pengirim_id',
        'judul',
        'isi',
        'status',
        'tgl_kirim',
    ];

    public function penerima(){
        return $this->belongsTo(User::class, 'penerima_id');
    }

    public function pengirim(){
        return $this->belongsTo(User::class, 'pengirim_id');
    }
}
