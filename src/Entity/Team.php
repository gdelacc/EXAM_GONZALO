<?php
/**
 * Created by PhpStorm.
 * User: hallgató
 * Date: 2018.12.04.
 * Time: 13:24
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="teams")
 * @ORM\HasLifecycleCallbacks
 */
class Team
{
    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $team_id;

    /**
     * @var string
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $team_name;

    /**
     * @var string
     * @ORM\Column(type="string", length=3, nullable=true)
     */
    private $team_nationality;

    /**
     * @var string
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $team_address;

    /**
     * @return int
     */
    public function getTeamId(): int
    {
        return $this->team_id;
    }



    /**
     * @return string
     */
    public function getTeamName(): string
    {
        return $this->team_name;
    }

    /**
     * @param string $team_name
     */
    public function setTeamName(string $team_name): void
    {
        $this->team_name = $team_name;
    }

    /**
     * @return string
     */
    public function getTeamNationality(): string
    {
        return $this->team_nationality;
    }

    /**
     * @param string $team_nationality
     */
    public function setTeamNationality(string $team_nationality): void
    {
        $this->team_nationality = $team_nationality;
    }

    /**
     * @return string
     */
    public function getTeamAddress(): string
    {
        return $this->team_address;
    }

    /**
     * @param string $team_address
     */
    public function setTeamAddress(string $team_address): void
    {
        $this->team_address = $team_address;
    }


}