<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Cache\Repository as CacheRepository;
use Illuminate\Contracts\Config\Repository as ConfigRepository;

class ShowStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'roullette:statistic';

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
    public function __construct(CacheRepository $cacheRepository, ConfigRepository $configRepository)
    {
        parent::__construct();
        $this->cacheRepository = $cacheRepository;
        
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $win = $this->cacheRepository->get('WinStatistic', []);
        $lose = $this->cacheRepository->get('loseStatistic', []);
        $table = [];


        foreach ($win as $key => $count ) {
            $table[] = [$key, $count ];
        }

        $this->table(['user', 'win' ], $table);
        $table = [];
        foreach ($lose as $key => $count ) {
            $table[] = [$key, $count ];
        }
    
        $this->table(['user', 'lose' ], $table);
        $this->cacheRepository->set('WinStatistic', $win);
        $this->cacheRepository->set('loseStatistic', $lose);
               
    }
}
