<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Cache\Repository as CacheRepository;
use Illuminate\Contracts\Config\Repository as ConfigRepository;

class RussionRouletteCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'roullette:game';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'RussionRoulette game where user win or lose.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CacheRepository $cacheRepository)
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
        $randombullet = random_int(1,6);
        $user = $this->ask("What is you name?");
        $statisticWin = $this->cacheRepository->get('WinStatistic', []);
        $statisticLose = $this->cacheRepository->get('LoseStatistic', []);
        $statisticBulletPosition = $this->cacheRepository->get('BulletStatistic', []);
        $statisticWin[$user] = $statisticWin[$user] ?? 0;
        $statisticLose[$user] = $statisticLose[$user] ?? 0;
        $statisticBulletPosition[$randombullet] = $statisticBulletPosition[$randombullet] ?? 0;
        $drumstop = random_int(1,6);
        if ($randombullet == $drumstop) {
            $statisticLose[$user]++;
            $this->info("You lose");  
        }else {    
            $statisticWin[$user]++; 
            $this->info("You win");
        };
        $statisticBulletPosition[$randombullet]++;
        $this->cacheRepository->set('WinStatistic', $statisticWin, 60*60*24);
        $this->cacheRepository->set('LoseStatistic', $statisticLose, 60*60*24);
        $this->cacheRepository->set('BulletStatistic', $statisticBulletPosition, 60*60*24);
               
        
    }
}
