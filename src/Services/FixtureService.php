<?php
/**
 * Created by PhpStorm.
 * User: mirathakkar
 * Date: 13/06/18
 * Time: 10:53 AM
 */

namespace Fanbox\LaravelSportmonks\Services;


use GuzzleHttp\Client;

class FixtureService extends Service
{

    public function __construct()
    {
        parent::__construct();
    }

    public function fetchById($fixture)
    {
        try{
            return $this->get("fixtures/${fixture}",[
                'include' => implode(',',[
                    'goals','cards','venue','lineup','localTeam','VisitorTeam','stats','events'
                ])
            ]);
        }
        catch (\Exception $e){
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }
}
