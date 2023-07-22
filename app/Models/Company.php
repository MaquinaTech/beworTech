<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'address',
        'status'
    ];

    /**
     * Get the employees for the company.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    /**
     * Get the active employees for the company.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employeesActive()
    {
        return $this->hasMany(Employee::class)->where('status', 'active');
    }

    /**
     * Get the deactive employees for the company.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function employeesInactive()
    {
        return $this->hasMany(Employee::class)->where('status', 'inactive');
    }
}
