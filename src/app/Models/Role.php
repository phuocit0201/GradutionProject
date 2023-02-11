<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    const ROLE = [
        'admin' => 1,
        'staff' => 2,
        'user'  => 3,
    ];

    const ROLE_ADMIN = 'admin';
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['name'];

    public function users()
    {
        return $this->hasOne(User::class, 'role_id', 'id')->setEagerLoads([]);
    }
}
