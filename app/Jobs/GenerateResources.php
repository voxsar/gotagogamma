<?php

namespace App\Jobs;

use Log;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\User;
use App\Models\Resource;

class GenerateResources implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $users = User::all();
        // $resources = Resource::all();
        foreach ($users as $user) {
            foreach ($user->buildings as $building) {
                foreach ($building->productions as $production) {
                    foreach ($user->resources as $resource) {
                        if($production->id == $resource->id){
                            $myresource = $resource->pivot;
                            $myresource->amount += (($production->pivot->produce * $building->pivot->level) * $building->multiplier) / 60;
                            $myresource->save();
                        }
                    }
                }
            }
        }
    }
}
