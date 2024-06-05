<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;
    protected $table = 'form';
    protected $fillable = ['email', 'first_name', 'last_name'];

    //Mutetors
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    // public function setFirstNameAttribute($value)
    // {
    //     $this->attributes['first_name'] = strtolower($value);
    // }

    //Another Method
    protected function LastName(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => strtolower($value),
        );
    }

    //Accessors
    // public function getFirstNameAttribute($value)
    // {
    //     return ucfirst($value);
    // }

    protected function FirstName(): Attribute
    {
        return Attribute::make(
            set: fn(string $value) => strtolower($value),
            get: fn(string $value) => ucfirst($value),
        );
    }
}
