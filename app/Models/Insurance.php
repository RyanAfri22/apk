<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    use HasFactory;

    protected $table = 'insurance';
    protected $primaryKey = 'insurance_id';
    protected $fillable = [
        'name',
        'cost',
    ];

    public function insurancePayments()
    {
        return $this->hasMany(InsurancePayment::class, 'insurance_id');
    }
}
