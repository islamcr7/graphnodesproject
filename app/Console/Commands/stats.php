<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
class stats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'graph:stats {--graph_id=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $arguments = $this->option('graph_id');
      
        $data=DB::select('
        select G.graph_id,
        G.name,
        G.description,
        count(distinct N.node_id)as nb_nodes,
        (count(*)/count(distinct N.node_id)) as nb_relations

        From 
        graphs G
        left join nodes N on (G.graph_id=N.graph_id)
        left join relations R on (G.graph_id=R.graph_id)

        where 
        G.graph_id='.$arguments.

        ' group by 1,2,3');
        print_r($data);
    }
}
