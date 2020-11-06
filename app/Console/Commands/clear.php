<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Graph\Entities\Graph;
use Illuminate\Support\Facades\DB;

class clear extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'graph:clear';

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
     $db=db::delete('delete from graphs 
        where graph_id not in (select distinct graph_id from nodes)');
    }
}
