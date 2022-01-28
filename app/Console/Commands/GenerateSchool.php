<?php

namespace App\Console\Commands;

use App\Events\GenerateschoolEvent;
use App\Models\School;
use Illuminate\Console\Command;

class GenerateSchool extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:school {number}';

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
        $number = $this->argument('number');
        School::factory($number)->create();
        event(new GenerateschoolEvent($number));
        $this->info('School has been created '.$number.' times successfully!');
    }
}
