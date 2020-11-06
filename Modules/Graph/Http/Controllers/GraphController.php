<?php

namespace Modules\Graph\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Graph\Entities\Graph;

class GraphController extends Controller
{

       // Store a newly created relations.
    
     // endpoint number 1 Create an empty graph
     //route:localhost:8000/api/graphs 
     //method:Post
     //params:name,description
     public function store(Request $request)
     {
      
         $creation=Graph::create($request->all());
 
         if($creation!=null){
             $results['message']='Graph created ';
         }else{
             $results['message']='error';
         }
         return response()->json($results);
     }
     
     // endpoint number 4 Get all graphs (only meta data);
     //route:localhost:8000/api/graphs 
     //method:get
     //params:
    public function index()
    {
        $data=Graph::select('name','description')->get();
        if($data!=null){
            $results['data']=$data;
        }else{
            $results['message']='error';
        }
        return response()->json($results);
    }
    
  
     
     // endpoint number 1 Edit graph meta data (name(unique), description);
     //route:localhost:8000/api/graphs/{graph_id}
     //method:put
     //params:name,description
   // 
    public function update(Request $request, $id)
    {

        $validated = $request->except('graph_id','created_at','updated_at');

        $update=graph::where('graph_id','=',$id)->update($validated );
        
        if($update){
            $results['message']='Updated';
        }else{
            $results['message']='error';
        }
        return response()->json($results);
    }

      
     // endpoint number 3    Delete graph;
     //route:localhost:8000/api/graphs/{graph_id}
     //method:delete
     //params:
   // 

    public function destroy($id)
    {
        $deleted = Graph::where('graph_id','=',$id)->delete();
        if($deleted){
            $results['message']='graph deleted';
        }else{
            $results['message']='error! check parameters';
        }
        return response()->json($results);
    }

      // endpoint number 8 Get single graph with its nodes and relations;
     //route:localhost:8000/api/graphs/getGraphs/{id}
     //method:Post
     //params:graph_id,parent_id,child_id


     public function getGraphs($id)
     {   
         
         $data=Graph::with('nodes')->with('relations')
         ->where('graph_id','=',$id)
         ->get();
         if($data!=null){
             $results['data']=$data;
         }else{
             $results['message']='error';
         }
         return response()->json($results);
     }
}
