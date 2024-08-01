<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BinhLuan extends Model
{
    use HasFactory;

    public function getById ($id) {
        $binhLuan = DB::table('binh_luans')
                        ->join('users', 'binh_luans.tai_khoan_id', '=', 'users.id')
                        ->join('san_phams', 'binh_luans.san_pham_id', '=', 'san_phams.id')
                        ->where('binh_luans.san_pham_id', $id)
                        ->select('binh_luans.*', 'users.*')
                        ->get();

        return $binhLuan;
    }

    protected $fillable = [
        'id',
        'tai_khoan_id',
        'san_pham_id',
        'noi_dung',
        'thoi_gian',
        'trang_thai'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function sanPham(){
        return $this->belongsTo(SanPham::class);
    }
}
