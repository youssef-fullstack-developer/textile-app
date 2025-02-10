<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class PermissionsFam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'libelle',
        'ordre'
    ];


    public function permissions()
    {
        return $this->hasMany(Permission::class, 'perm_fam_id', 'id');
    }


}
