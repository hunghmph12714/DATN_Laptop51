<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clases extends Model
{
    use HasFactory;
    protected $table = 'clases';
    public $fillable = ['ma_lop', 'ten_lop', 'id'];
    /**
     * Get all of the students for the Clases
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function students()
    {
        return $this->hasMany(Student::class, 'ma_sv', 'id');
    }
}