<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Str;
use Modules\Graph\Entities\Graph;
use Modules\Graph\Entities\Node;
class gen extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'graph:gen {--nbNodes=}';

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
        $arguments = $this->option('nbNodes');
        $name= Str::random(10);
        $data['name']=$name;
        $graph=Graph::create($data);
        while($arguments>0){
            $node=new Node();
            $node->graph_id=$graph->graph_id;
            $node->save();
            $arguments=$arguments - 1;
        }
        
    }
}
