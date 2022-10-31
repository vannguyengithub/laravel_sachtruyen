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
        'tacgia',
        'slug_truyen',
        'hinhanh',
        'tukhoa',
        'danhmuc_id',
        'kichhoat',
        'theloai_id'
    ];

    protected $primaryKey = 'id';
    protected $table = 'truyen';

    // truyện chỉ có thể thuộc một danh danh mục truyện
    public function danhmuctruyen() {
        return $this->belongsTo('App\Models\DanhmucTruyen', 'danhmuc_id', 'id');
    }

    // một truyện có thể có nhiều chapter
    public function chapter() {
        return $this->hasMany('App\Models\Chapter', 'truyen_id', 'id');
    }
    
    // truyện chỉ có thể thuột một loại
    public function theloai() {
        return $this->belongsTo('App\Models\Theloai', 'theloai_id', 'id');
    }
}
