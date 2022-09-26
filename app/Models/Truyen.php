<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'tentruyen',
        'tomtat',
        'kichhoat',
        'slug_truyen',
        'hinhanh',
        'danhmuc_id',
        'kichhoat',
    ];

    protected $primaryKey = 'id';
    protected $table = 'truyen';
}
