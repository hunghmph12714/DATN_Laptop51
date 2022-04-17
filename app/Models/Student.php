<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected  $table = "students";
    public $fillable = ['ma_sv', 'ho_ten', 'ngay_sinh', 'que_quan', 'dien_thoai', 'email', 'ma_lop', 'anh'];
    /**
     * Get the class that owns the Student
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function class()
    {
        return $this->belongsTo(Clases::class, 'ma_lop', 'id');
    }
}