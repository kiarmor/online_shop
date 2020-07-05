<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'alias',
        'parent_id',
        'keywords',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /** for search category children in edit category*/
    public function children()
    {
       return $this->hasMany('App\Models\Admin\Category', 'parent_id');

    }

}
