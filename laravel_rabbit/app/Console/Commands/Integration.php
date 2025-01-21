<?php

namespace App\Console\Commands;

use App\Jobs\RabbitMQ;
use App\Models\User;
use Illuminate\Console\Command;

class Integration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'integration';

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
        $users = User::factory(10)->create()->map(function (User $user) {
            return $user->only(['id', 'name', 'email', 'password']);
        })->toArray();
        RabbitMQ::dispatch(
            ['users' => $users]
        );
    }
}
