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
     * @param Team
     * @return Player[]
     */
    public function getPlayersbyTeam($team);

    /**
     * @param Team
     * @return Player[]
     */
    public function getContractedPlayers($team);

    /**
     * @param Player
     * @return boolean
     */
    public function canBeContrated($player);

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