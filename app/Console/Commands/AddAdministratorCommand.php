<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AddAdministratorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:add {name} {surname} {middlename} {email} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new administrator user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $surname = $this->argument('surname');
        $middlename = $this->argument('middlename');
        $email = $this->argument('email');
        $password = $this->argument('password');
        if (!empty($user)) {
            $this->error('Email is used');
            return Command::FAILURE;
        }
        $user = new User();
        $user->surname = $surname;
        $user->name = $name;
        $user->middlename = $middlename;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->admin = true;
        $user->moderator = true;
        $user->save();
        $this->info('User is created');
        return Command::SUCCESS;
    }
}
