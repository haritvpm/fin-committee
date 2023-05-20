<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Allocation extends Model
{
    use SoftDeletes, HasFactory;

    public $table = 'allocations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'user_id',
        'allotted_amount',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $appends = ['expenditure', 'mla_count', 'balance', 'payable'];

    public function getPayableAttribute()
    {
        $sum = ExMember::where( 'user_id', $this->user_id )->sum('amount_payable');
        return $sum ;
    }
    public function getExpenditureAttribute()
    {
        $sum = ExMember::where( 'user_id', $this->user_id )->where( 'amount_paid', '<>', 0 )->sum('amount_payable');
        return $sum ;
    }
    public function getMlaCountAttribute()
    {
        $mlas = ExMember::where( 'user_id', $this->user_id )->where( 'amount_paid', '<>', 0 )->count();

        return $mlas;
    }
    public function getBalanceAttribute()
    {
        
        return $this->allotted_amount - $this->expenditure;
    }
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
