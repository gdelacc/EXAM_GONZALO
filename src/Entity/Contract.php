<?php
/**
 * Created by PhpStorm.
 * User: hallgató
 * Date: 2018.12.04.
 * Time: 13:31
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection,
    Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="contracts")
 * @ORM\HasLifecycleCallbacks
 */
class Contract
{
    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $tp_id;

    //@ORM\OneToOne(targetEntity="Team", mappedBy="team_id")
    //@ORM\OneToOne(targetEntity="Player", mappedBy="player_id")
    //@var Brand
    //     * @ORM\ManyToOne(targetEntity="Brand", inversedBy="brand_cars")
    //     * @ORM\JoinColumn(name="car_brand", referencedColumnName="brand_id")

    /**
     * @var Team
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumn(name="team", referencedColumnName="team_id")
     */
    private $team;

    /**
     * @var Player
     * @ORM\ManyToOne(targetEntity="Player")
     * @ORM\JoinColumn(name="player", referencedColumnName="player_id")
     */
    private $player;

    /**
     * @var \DateTime
     * @ORM\Column(type="date", nullable=false)
     */
    private $start_date;

    /**
     * @var \DateTime
     * @ORM\Column(type="date", nullable=true)
     */
    private $end_date;

    /**
     * Contract constructor.
     */

    /*
    public function __construct()
    {
        $this->start_date=(new \DateTime())->format("Y-m-d");
    }*/

    /**
     * @return int
     */
    public function getTpId(): int
    {
        return $this->tp_id;
    }


    /**
     * @return \DateTime
     */
    public function getStartDate(): \DateTime
    {
        return $this->start_date;
    }

    /**
     * @param \DateTime $start_date
     */
    public function setStartDate(\DateTime $start_date): void
    {
        $this->start_date = $start_date;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate(): \DateTime
    {
        return $this->end_date;
    }

    /**
     * @param \DateTime $end_date
     */
    public function setEndDate(\DateTime $end_date): void
    {
        $this->end_date = $end_date;
    }

    /**
     * @return Team
     */
    public function getTeam(): Team
    {
        return $this->team;
    }

    /**
     * @param Team $team
     */
    public function setTeam(Team $team): void
    {
        $this->team = $team;
    }

    /**
     * @return Player
     */
    public function getPlayer(): Player
    {
        return $this->player;
    }

    /**
     * @param Player $player
     */
    public function setPlayer(Player $player): void
    {
        $this->player = $player;
    }





}