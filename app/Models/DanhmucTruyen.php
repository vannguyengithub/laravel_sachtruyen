<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhmucTruyen extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'tendanhmuc',
        'mota',
        'kichhoat',
        'slug_danhmuc'
    ];

    protected $primaryKey = 'id';
    protected $table = 'danhmuc';

    // một danh mục truyện có thể thuộc nhiều truyện
    public function truyen() {
        return $this->hasMany('App\Models\Truyen');
    }
}
