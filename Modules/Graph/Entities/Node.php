<?php

namespace Modules\Graph\Entities;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    protected $table = 'nodes';
    protected $fillable = ['node_id','graph_id'];
    public $timestamps = false;

 
}
