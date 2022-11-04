<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Contentful\Delivery\Client as DeliveryClient;

class AboutUsController extends Controller
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
        $query->setContentType('aboutUs');

        $profiles = $this->client->getEntries($query);

        // dd($this->client->getEntries($query));

        // $newclient = new DeliveryClient('<space_id>', '<content_delivery_api_key>');

        // $asset = $newclient->getAsset('<asset_id>');

        // $resultUrl = $asset->getFile()->getUrl();

        return view('aboutus', [
            'profiles' => $profiles
        ]);
    }
}
