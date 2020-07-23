<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DynamicCreate extends Command
{
    private array $data = [];
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'gea:dynamic_create {model}';

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
        $this->data = $this->arguments();
        
        return 0;
    }
}
