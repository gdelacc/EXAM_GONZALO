<?php
/**
 * Created by PhpStorm.
 * User: hallgató
 * Date: 2018.12.04.
 * Time: 15:22
 */

namespace App\Service;

use App\Entity\Player;
use App\Entity\Team;

interface IContractCrudService
{

    /**
     * @param $player_id
     * @return Player
     */
    public function getPlayerContracted($player_id);

    /**
     * @return Player[]
     */
    public function getPlayersContracted();
}