<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\UserRole;
use App\User;
use Illuminate\Console\Command;

class GenerateRoleForUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:role';

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
        foreach ($users as $user){
            if(!count($user->roles)){
                $this->warn('User '. $user->name.' doesn\'t have a role');
                $this->warn('creating....');
                $user_role = new UserRole();
                $user_role->user_id = $user->id;
                $user_role->role_id = 6;
                $user_role->save();
                $this->info('Role '.Role::find(6)->name.' set for '. $user->name.' !');
            }else{
                $this->info($user->name.' already have a role');
            }
        }
    }
}
