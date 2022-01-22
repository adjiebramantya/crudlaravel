<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = "pegawai";
    protected $primaryKey = "id";
    protected $fillable = [
      'id', 'nama', 'jabatan_id','alamat', 'tanggal_lahir'];

    public function jabatan()
    {
      return $this->belongsTo(Jabatan::class);
    }
}
