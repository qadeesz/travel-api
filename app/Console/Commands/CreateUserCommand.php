<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;

class CreateUserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $user['name'] = $this->ask('Name of the new user');
        $user['email'] = $this->ask('Email of the new user');
        $user['password'] = $this->secret('Password of the new user');

        $roleUser = $this->choise('Role of the user', ['admin', 'editor'], 1);

        $role = Role::where('name', $roleUser)->first();

        if (!$role) {
            $this->error('Role not found');
            return -1;
        }

        User::create($user);

        $this->info('User ' . $user['email'] . 'created successfully');
        return 0;
    }
}
