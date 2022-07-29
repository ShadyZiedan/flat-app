<?php

namespace App\Console\Commands;

use App\Jobs\UpdateAdvertStatuses;
use App\Services\AvitoService;
use App\Services\CianService;
use App\Services\DomclickService;
use Illuminate\Console\Command;

class UpdateAdvertStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get-ads {platform}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Getting ads statuses';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $platform = $this->argument('platform');

        try {
            $service = match (strtolower($platform)) {
                "avito" => new AvitoService(),
                "cian" => new CianService(),
                "domclick" => new DomclickService(),
            };
        } catch (\UnhandledMatchError $e) {
            $this->error("Service {$platform} not found!");
            return 1;
        } catch (\Throwable $e) {
            $this->error("Error loading ads statuses: {$e->getMessage()}");
            return 1;
        }

        dispatch(new UpdateAdvertStatuses($service));

        return 0;
    }
}
