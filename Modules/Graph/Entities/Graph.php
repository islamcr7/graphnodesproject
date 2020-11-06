<?php

namespace Modules\Graph\Entities;

use Illuminate\Database\Eloquent\Model;

class Graph extends Model
{
    protected $table = 'graphs';
    protected $primaryKey = 'graph_id';
    protected $fillable = ['graph_id','name','description'];

   
    public function nodes()
    {
        return $this->hasMany('Modules\Graph\Entities\Node', 'graph_id');
    }

    public function relations()
    {
        return $this->hasMany('Modules\Graph\Entities\Relation', 'graph_id');
    }
}
