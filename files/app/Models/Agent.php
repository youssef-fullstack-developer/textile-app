<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country_id',
        'primary_contact_no',
        'secondary_contact_no',
        'address',
        'pin_code',
        'agent_percent',
        'agent_type_id',
        'account_group_id',
        'status'
    ];

    public function country()
    {
        return $this->hasOne(Countries::class, 'id', 'country_id');
    }
    public function agent_type()
    {
        return $this->hasOne(AgentType::class, 'id', 'agent_type_id');
    }
    public function account_group()
    {
        return $this->hasOne(AccountGroup::class, 'id', 'account_group_id');
    }


}
