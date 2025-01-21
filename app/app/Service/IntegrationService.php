<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Log;

class IntegrationService
{
    public function integrationAllUsers(array $users): void
    {
        Log::info('Iniciando a integração dos usuários');
        foreach ($users as $u) {
            User::query()->create($u);
        }
        Log::info('Integração finalizada');
    }
}
