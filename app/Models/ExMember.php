<?php

namespace App\Models;

use App\Traits\MultiTenantModelTrait;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ExMember extends Model
{
    use SoftDeletes, MultiTenantModelTrait, HasFactory;

    public $table = 'ex_members';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'index',
        'name',
        'address',
        'place',
        'district',
        'user_id',
        'distance_oneside',
        'ta_calculated',
        'ta_eligible',
        'honorarium',
        'amount_payable',
        'amount_paid',
        'actual_amount_paid',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    protected $appends = ['distance_total'];

    public function getDistanceTotalAttribute()
    {
        return $this->distance_oneside *2;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }
}
