<?php

namespace App\Console\Commands;

use App\Modules\Admins\Models\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $firstname = $this->checkAdminFirstname();
        $lastname = $this->checkAdminLastname();
        $email = $this->checkAdminEmail();
        $password = $this->checkAdminPassword();

        Admin::create([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info("New admin has been added");
    }

    private function checkAdminFirstname() : string
    {
        $fname = $this->ask('Admin Firstname ');

        if(strlen($fname) < 3){

            $this->error('Firstname must have at least 3 characters');
            return $this->checkAdminFirstname();
        }
        
        return $fname;
    }

    private function checkAdminLastname() : string
    {
        $lname = $this->ask('Admin Lastname ');

        if(strlen($lname) < 3){

            $this->error('Lastname must have at least 3 characters');
            return $this->checkAdminLastname();
        }
        
        return $lname;
    }

    private function checkAdminEmail() : string
    {
        $email = $this->ask('Admin Email ');
        
        if(!checkIfEmailIsValid($email)){

            $this->error('Email is not valid');
            
            return $this->checkAdminEmail();
        }

        return $email;
    }

    private function checkAdminPassword() : string
    {
        $password = $this->secret('Admin Password ');

        if(strlen($password) < 6){

            $this->error('Password must have at least 6 characters');
            return $this->checkAdminPassword();
        }

        $password_confirmation = $this->secret('Confirm Password ');

        if($password !== $password_confirmation){

            $this->error("Password doesn't match");
            return $this->checkAdminPassword();
        }

        return $password;
    }
}
