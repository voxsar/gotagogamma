<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use DB;
use App\Models\BuildingUser;
use App\Models\Building;
use App\Models\User;

class UpgradeBuilding implements ShouldQueue, ShouldBeUnique
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $buildinguser;
    private $building;
    private $level;

    /**
     * The number of seconds after which the job's unique lock will be released.
     *
     * @var int
     */
    public $uniqueFor = 3600;

    /**
     * The unique ID of the job.
     *
     * @return string
     */
    public function uniqueId()
    {
        return $this->buildinguser->id;
    }

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(BuildingUser $buildinguser, Building $building, $level)
    {
        //
        $this->buildinguser = $buildinguser;
        $this->building = $building;
        $this->level = $level;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $alreadyExists = BuildingUser::where('user_id', $this->buildinguser->user_id)->where('building_id', $this->building->id)->count();
        $user = User::find($this->buildinguser->user_id);
        if($alreadyExists == 0){
            $this->buildinguser->building_id = $this->building->id;
            $this->buildinguser->level = $this->level;
            $this->buildinguser->is_building = 0;
            $this->buildinguser->save();
        }

        $user->is_upgrading = 0;
        $user->upgrade_completetime = null;
        $user->save();
    }
}
