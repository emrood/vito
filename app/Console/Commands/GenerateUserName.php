<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class GenerateUserName extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:username';

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

        $users = User::all();
        foreach ($users as $user) {
            if (empty($user->username)) {
                $this->warn($user->name . ' doesnt have a username');
                $this->warn('creating...');
                $factory = \Faker\Factory::create();
                $user->username = $factory->userName;
                $user->save();
                $this->info('Random username set for '. $user->name);
            } else {
                $this->info($user->name . ' already has a username');
            }
        }
    }
}
