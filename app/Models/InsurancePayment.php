<?php

namespace App\Models;

use App\Models\Account;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InsurancePayment extends Model
{
    use HasFactory;

    protected $primaryKey = 'payment_id';
    protected $fillable = [
        'account_id',
        'insurance_id',
        'policy_number',
        'amount',
        'due_date',
        'payment_date',
        'status'
    ];

    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id');
    }

    public function insurance()
    {
        return $this->belongsTo(Insurance::class, 'insurance_id');
    }
}
