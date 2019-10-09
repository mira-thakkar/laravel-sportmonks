<?php
/**
 * Created by PhpStorm.
 * User: mirathakkar
 * Date: 2019-10-09
 * Time: 17:28
 */

namespace Fanbox\LaravelSportMonks\Services;


class SeasonService extends Service
{
    public function all()
    {
        try{
            return [
                'status' => 'success',
                'data' => $this->get('/seasons')
            ];
        }
        catch (\Exception $e){
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }

    public function fetchByLeague($league)
    {
        try{
            $res =  $this->get("/leagues/${league}");
            return [
                'status' => 'success',
                'data' => $res['seasons']
            ];
        }
        catch (\Exception $e){
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }

    public function fetchById($season)
    {
        try{
            $res =  $this->get("/seasons/${season}",[
                'include' => implode(',',['league','fixtures'])
            ]);
            return [
                'status' => 'success',
                'data' => $res
            ];
        }
        catch (\Exception $e){
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }

    public function fetchStandings($season)
    {
        try{
            $res =  $this->get("/standings/season/${season}",[
                'include' => implode(',',['league','season','team'])
            ]);
            return [
                'status' => 'success',
                'data' => $res
            ];
        }
        catch (\Exception $e){
            return [
                'status' => 'error',
                'message' => $e->getMessage()
            ];
        }
    }
}
