<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use DB;
use App\Models\Building;
use App\Models\User;

class UpgradeBuilding implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $building;
    private $user;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Building $building, User $user)
    {
        //
        $this->building = $building;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        DB::table('building_users')->insert([
            [
                'building_id' => $this->building->id,
                'user_id' => $this->user->id,
                'level' => 1,
            ]
        ]);

        $this->user->is_upgrading = 0;
        $this->user->upgrade_completetime = null;
        $this->user->save();
    }
}
