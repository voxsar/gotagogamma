<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Market;
use App\Models\Resource;
use App\Models\MarketResource;

class MarketController extends Controller
{
    //
    public function index()
    {
        # code...
        $data = array(
            //
            'marketplace' => Market::where('status', 'Pending')->whereNull('buyer_user_id')->whereNot('seller_user_id', auth()->user()->id)->get(),
            'mylistings' => Market::where('status', 'Pending')->whereNull('buyer_user_id')->where('seller_user_id', auth()->user()->id)->get(),
        );
        return view("markets.index", $data);
    }

    public function create()
    {
        # code...
        $data = array(
            'buyers' => auth()->user()->buyers,
            'sellers' => auth()->user()->sellers,
            'resources' => auth()->user()->resources
        );
        return view("markets.create", $data);
    }

    public function store(Request $request)
    {
        # code...
        $resources = auth()->user()->resources;
        $market = new Market();
        $market->expiry_date = now()->addDays(3);
        $market->seller_user_id = auth()->user()->id;
        $market->save();
        foreach ($resources as $resource) {
            # code...
            $sell = $request->get("name".$resource->id);
            $balance = $resource->pivot->amount - $sell;
            $resource->pivot->amount = $balance;
            $resource->pivot->save();
            $marketresource = new MarketResource();
            $marketresource->user_id = auth()->user()->id;
            $marketresource->resource_id = $resource->id;
            $marketresource->market_id = $market->id;
            $marketresource->amount = $sell;
            $marketresource->save();

        }
        return back()->with(["message" => "Listed successfully"]);
    }

    public function buy(Market $market)
    {
        # code...
        $data = array(
            'buyers' => auth()->user()->buyers,
            'sellers' => auth()->user()->sellers,
            'resources' => auth()->user()->resources,
            'market' => $market
        );
        return view("markets.buy", $data);
    }

    public function update(Market $market, Request $request)
    {
        # code...
        $myresources = auth()->user()->resources;
        $byresources = $market->seller->resources;

        $market->status = 'Sold';
        $market->expiry_date = now();
        $market->buyer_user_id = auth()->user()->id;
        $market->save();
        foreach ($myresources as $resource) {
            # code...
            $sell = $request->get("name".$resource->id);
            $balance = $resource->pivot->amount - $sell;
            $resource->pivot->amount = $balance;
            $resource->pivot->save();
            $marketresource = new MarketResource();
            $marketresource->user_id = auth()->user()->id;
            $marketresource->resource_id = $resource->id;
            $marketresource->market_id = $market->id;
            $marketresource->amount = $sell;
            $marketresource->save();

        }
        return back();
    }
}
