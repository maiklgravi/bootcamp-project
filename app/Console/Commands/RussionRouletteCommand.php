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
    protected $signature = 'game:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'RussionRoulette game were youser win or lose.';

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
        
        $user = $this->ask("What you user id?");
        $win = $this->cacheRepository->get('WinStatistic', []);
        $lose = $this->cacheRepository->get('loseStatistic', []);
        $win[$user] = $win[$user] ?? 0;
        $lose[$user] = $lose[$user] ?? 0;
        $random = random_int(0,5);
        if ($random == 0) {
        $this->info("you win");
        $win[$user]++;  
        }else {    
            $this->info("you lose");
        $lose[$user]++;   
        };
        
        $this->cacheRepository->set('WinStatistic', $win);
        $this->cacheRepository->set('loseStatistic', $lose);
               
        
    }
}
