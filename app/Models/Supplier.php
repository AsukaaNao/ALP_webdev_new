<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    public $timestamps = true;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email'
    ];

    public function menus() {
        return $this->hasMany(Menu::class);
    }
}
