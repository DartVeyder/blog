<?php

namespace App\Console\Commands;
use App\Services\NewsService;
use Illuminate\Console\Command; 

class GenerateStatisticsCommand extends Command
{
    private $newsService;
    protected $signature = 'generate:statistics';
    protected $description = 'Generate statistics report';

    public function __construct(NewsService $newsService)
    {
        parent::__construct();
        $this->newsService = $newsService;
    }

    public function handle()
    {
        $statistics = $this->newsService->generateStatistics();

        $this->info(json_encode($statistics));
    }
}
