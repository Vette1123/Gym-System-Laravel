<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class AdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin {--email=admin20@admin.com} {--password=123456}';
    // php artisan create:admin --email=admin2@admin.com --password=123456

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin through the command line';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $adminName = explode("@", $this->option('email'));
        $user = User::create([
            'name' => $adminName[0],
            'email' =>  $this->option('email'),
            'role' => 'admin',
            'password' => bcrypt($this->option('password'))
        ])->assignRole('admin');
        $this->info("$adminName[0] has been created successfully");
    }
}
