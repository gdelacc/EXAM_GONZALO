<?php
/**
 * Created by PhpStorm.
 * User: hallgató
 * Date: 2018.12.04.
 * Time: 14:55
 */

namespace App\Service;

use App\Entity\Team;

interface ITeamCrudService
{
    /**
     * @return Team[];
     */
    public function getAllTeams();

    /**
     * @param $team_id
     * @return Team
     */
    public function getTeam($team_id);

    /**
     * @param $nationality string
     * @return Team
     */
    public function getTeambyNationality($nationality);

    /**
     * @param $team
     */
    public function saveTeam($team);

    /**
     * @param $team_id
     */
    public function deleteTeam($team_id);


}