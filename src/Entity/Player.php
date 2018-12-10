<?php
/**
 * Created by PhpStorm.
 * User: hallgató
 * Date: 2018.12.04.
 * Time: 13:23
 */

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection,
    Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="players")
 * @ORM\HasLifecycleCallbacks
 */
class Player
{

    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $player_id;

    /**
     * @var string
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $player_name;

    /**
     * @var int
     * @ORM\Column(type="integer", length=100)
     */
    private $player_salary;

    /**
     * @var string
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $player_position;

    /**
     * @return int
     */
    public function getPlayerId(): int
    {
        return $this->player_id;
    }

    /**
     * @return string
     */
    public function getPlayerName(): string
    {
        return $this->player_name;
    }

    /**
     * @param string $player_name
     */
    public function setPlayerName(string $player_name): void
    {
        $this->player_name = $player_name;
    }

    /**
     * @return int
     */
    public function getPlayerSalary(): int
    {
        return $this->player_salary;
    }

    /**
     * @param int $player_salary
     */
    public function setPlayerSalary(int $player_salary): void
    {
        $this->player_salary = $player_salary;
    }

    /**
     * @return string
     */
    public function getPlayerPosition(): string
    {
        return $this->player_position;
    }

    /**
     * @param string $player_position
     */
    public function setPlayerPosition(string $player_position): void
    {
        $this->player_position = $player_position;
    }





}