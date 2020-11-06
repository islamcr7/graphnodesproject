<?php

namespace Modules\Graph\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Graph\Entities\Node;

class NodeController extends Controller
{
  //end point 5 Add node to a specific graph;
  //route:localhost:8000/api/nodes 
     //method:post
     //params:graph_id
    public function store(Request $request)
    {
        $creation=Node::create($request->all());

            if($creation!=null){
                $results['message']='created';
            }else{
                $results['message']='error';
            }

        return response()->json($results);
    }

    //end point 9 delete node to a specific node;
  //route:localhost:8000/api/nodes/{node_id}
     //method:delete
     //params:

 
    public function destroy($id)
    {
        $deleted = Node::where('node_id','=',$id)->delete();
        if($deleted==1){
            $results['message']='Row deleted';
        }else{
            $results['message']='error';
        }
        return response()->json($results);
    }

}
