<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Contentful\Delivery\Client as DeliveryClient;

class EventController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
    }
    private $client;

    public function __construct(DeliveryClient $client)
    {
        $this->client = $client;
    }
    public function index()
    {
        $query = new \Contentful\Delivery\Query();
        $query->setContentType('events');

        $events = $this->client->getEntries($query);
        /* dd($events); */
        return view('events', [
            'events' => $events
        ]);
    }
}
