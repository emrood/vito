<?php

namespace App\Console\Commands;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class InvalidateAgents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invalid:agents';

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

        $events = Event::whereDate('event_date', Carbon::today())->get();

        if(count($events)){
            foreach ($events as $event){
                foreach ($event->agents as $agent){
                    $agent->status = 'disable';
                    $agent->save();
                    Log::warning('Desactivating '. $agent->user->name.' for '.$event->name);
                    $this->warn('Desactivating '. $agent->user->name.' for '.$event->name);
                }
            }
        }else{
            $this->error('No events in the list');
        }

    }
}
