<?php

namespace Modules\Graph\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Graph\Entities\Node;
use Modules\Graph\Entities\Graph;
use Modules\Graph\Entities\Relation;

class RelationController extends Controller
{
   
     // Store a newly created relations.
    
     // endpoint number 6 add relation to a specific graph
     //route:localhost:8000/api/relations 
     //method:Post
     //params:graph_id,parent_id,child_id

    public function store(Request $request)
    {
        //test if the two nodes exist in nodes table for this graph

        $test1=Node::where('graph_id','=',$request->graph_id)->where('node_id','=',$request->parent_id)->first();
        $test2=Node::where('graph_id','=',$request->graph_id)->where('node_id','=',$request->child_id)->first();
       

        if(($test1)&&($test2)){

            $creation=Relation::create($request->all());

            if($creation!=null){
                $results['message']='created';
            }else{
                $results['message']='error!';
            }

        }else{

            $results['message']='error! inexistant nodes';

        }
     
        return response()->json($results);
    }

    
   
}
