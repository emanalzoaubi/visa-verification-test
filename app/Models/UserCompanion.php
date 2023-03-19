<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCompanion extends Model
{
    use HasFactory;
    protected $table = 'user_companions';
    protected $primaryKey = null;
    public $incrementing = false;
    protected $fillable = ['user_id', 'companion_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function companion()
    {
        return $this->belongsTo(User::class, 'companion_id');
    }
}