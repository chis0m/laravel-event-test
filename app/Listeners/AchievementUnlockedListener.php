<?php

namespace App\Listeners;

use App\Events\AchievementUnlocked;
use App\Services\Strategy\AchievementStrategy;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AchievementUnlockedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AchievementUnlocked  $event
     * @return void
     */
    public function handle(AchievementUnlocked $event): void
    {
        $event->user->achievements()->syncWithoutDetaching([$event->achievement->id]);
        AchievementStrategy::unlockBadge($event->user);
    }
}
