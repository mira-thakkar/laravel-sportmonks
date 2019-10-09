<?php
/**
 * Created by PhpStorm.
 * User: mirathakkar
 * Date: 2019-10-09
 * Time: 18:31
 */

namespace Fanbox\LaravelSportMonks\Services;


class TeamService
{
    public function fetchById($team)
    {
        try{
            return $this->get("teams/${team}",[
                'include' => implode(',',[
                    'country','stats','venue'
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

    public function fetchBySeason($season)
    {
        try{
            return $this->get("teams/season/${season}",[
                'include' => implode(',',[
                    'country','stats','venue'
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
