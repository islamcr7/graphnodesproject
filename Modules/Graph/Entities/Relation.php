<?php

namespace Modules\Graph\Entities;

use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    protected $fillable = ['graph_id','parent_id','child_id'];
    public $timestamps = false;
}
