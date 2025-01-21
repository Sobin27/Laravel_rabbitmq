<?php

namespace App\Jobs;

use App\Service\IntegrationService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class RabbitMQ implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public array $data
    ){ }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::info("Vai ser integrado " . count($this->data['users']) . " usuários no sistema");
        $integration = new IntegrationService();
        $integration->integrationAllUsers($this->data['users']);
    }
}
