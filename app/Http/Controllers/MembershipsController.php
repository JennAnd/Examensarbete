<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Contentful\Delivery\Client as DeliveryClient;

class MembershipsController extends Controller
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
        $query->setContentType('membershiptypes');

        $memberships = $this->client->getEntries($query);

        return view('memberships', [
            'memberships' => $memberships
        ]);
    }
}
