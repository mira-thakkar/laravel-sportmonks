<?php
/**
 * Created by PhpStorm.
 * User: mirathakkar
 * Date: 2019-10-09
 * Time: 18:35
 */

namespace Fanbox\LaravelSportMonks\Services;


class PlayerService
{
    public function fetchById($player)
    {
        try{
            return $this->get("players/${player}",[
                'include' => implode(',',[
                    'position','stats','team','trophies.seasons'
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
