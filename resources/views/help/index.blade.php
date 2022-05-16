@extends("layouts.index")
@section("page")
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <h3>{{ config('app.name', 'Laravel') }}: How to play</h3>
            <h4>How to start</h4>
            <p>This is a stratergy game similar to farmville, clash of clans and age of empires. You build structures on the map such as protest banners, food stations, tents or rally points</p>
            <p>Each building consumes time and different types of resources. For e.g. a protest banner will consume 377 food and 283 donation, it will gain you 4 positive points and 2 negative points and it will build 23 loyalty points</p>
            <p>Some buildings will produce resources over time adding to your total for e.g. a Food station will add to your food count allowing you to build more buildings or upgrade existing buildings to higher levels</p>
            <h4>Further play</h4>
            <p>After you get the village up and running, you can stablize the population and loyalty of your protestors by looking at what buildings are affecting your negative and positive points, and also the loyalty points. These numbers affect the sustainability of your protest</p>
            <h4>Objectives</h4>
            <p>The primary objective is to learn how a peaceful protest is managed and organized, the logistics, the social atmosphere, the resources and the loyalty for the cause</p>
            <p>When you have progressed further in the game the SLPP (System AI) will attack your village, depending on the type of loyalty, negative and positive points the damage and destruction of the village will be determined</p>
            <p>You can choose how the story progresses and how your respond to these challanges, and their outcomes will determine how the game will end</p>
        </div>
        <div class="col-md-7">
            <img class="img-fluid" src="">
        </div>
    </div>
</div>
@endsection
