<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
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
        'surname',
        'email',
        'phone',
        'birthday',
        'salary',
        'status',
        'company_id'
    ];

    /**
     * Get the company that owns the employee.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Get the employee's full name.
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->name} {$this->surname}";
    }
}
