<?php

namespace jotapepinheiro\LaravelRoles\Models;

use Illuminate\Database\Eloquent\Model;
use jotapepinheiro\LaravelRoles\Contracts\RoleHasRelations as RoleHasRelationsContract;
use jotapepinheiro\LaravelRoles\Traits\RoleHasRelations;
use jotapepinheiro\LaravelRoles\Traits\Slugable;

class Role extends Model implements RoleHasRelationsContract
{
    use Slugable, RoleHasRelations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', 'description', 'level'];

    /**
     * Create a new model instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if ($connection = config('roles.connection')) {
            $this->connection = $connection;
        }
    }
}
