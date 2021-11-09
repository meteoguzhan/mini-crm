<?php

namespace App\Models;

use App\Observers\CompanyObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['name', 'email', 'logo', 'website'];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public static function boot()
    {
        parent::boot();
        self::observe(CompanyObserver::class);
    }
}
