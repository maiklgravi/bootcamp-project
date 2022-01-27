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
    protected $description = 'Show status for win,lose and all Bullet position';

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
        $statisticWin = $this->cacheRepository->get('WinStatistic', []);
        $statisticLose = $this->cacheRepository->get('LoseStatistic', []);
        $statisticBulletPosition = $this->cacheRepository->get('BulletStatistic', []);
        $table = [];
        foreach ($statisticWin as $key => $count ) {
            $table[] = [$key, $count ];
        }
        $this->table(['user', 'statisticWin' ], $table);
        $table = [];
        foreach ($statisticLose as $key => $count ) {
            $table[] = [$key, $count ];
        }
        $this->table(['user', 'statisticLose' ], $table);
        $table = [];
        foreach ($statisticBulletPosition as $key => $count ) {
            $table[] = [$key, $count ];
        }
        $this->table(['randombullet', 'statisticBulletPosition'],$table);
        $this->cacheRepository->set('WinStatistic', $statisticWin);
        $this->cacheRepository->set('LoseStatistic', $statisticLose);
        $this->cacheRepository->set('BulletStatistic', $statisticBulletPosition);
               
    }
}
