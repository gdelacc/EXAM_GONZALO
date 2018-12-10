<?php
/**
 * Created by PhpStorm.
 * User: hallgató
 * Date: 2018.12.04.
 * Time: 14:54
 */

namespace App\Service;


use App\Entity\Player;

interface IPlayerCrudService
{
    /**
     * @param $player_id
     * @return Player
     */
    public function getPlayer($player_id);

    public function getContractsofPlayer($player_id);

    public function savePlayer($player, $team = null);

    public function contractPlayer($player,$team);

    public function firePlayer($player);






}