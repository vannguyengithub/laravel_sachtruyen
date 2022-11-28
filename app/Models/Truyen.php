<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model
{
    use HasFactory;

    protected $dates = [
        'created_at',
        'updated_at'
    ];

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
        'theloai_id',
        'created_at',
        'updated_at',
        'truyen_noibac'
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

    // public function thuocnhieudanhmuctruyen() {
    //     return $this belongsToMany(DanhmucTruyen::class, 'thuocdanh', 'truyen_id', 'danhmuc_id');
    // }
    // public function thuocnhieutheloaitruyen() {
    //     return $this belongsToMany(Theloai::class, 'thuocdanh', 'truyen_id', 'danhmuc_id');
    // }
}
