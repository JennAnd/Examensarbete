<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Contentful\Delivery\Client as DeliveryClient;

class ClassesController extends Controller
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
        $query->setContentType('classtype');

        $classes = $this->client->getEntries($query);
        dd($classes);

        /*  dd($this->client->getEntries()); */
    }
    public function show($id)
    {
        $entry = $this->client->getEntry($id);

        if (!$entry) {
            abort(404);
        }

        return view('ourclasses', [
            'entry' => $entry
        ]);
    }
}
