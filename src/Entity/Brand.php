<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="brands")
 */
class Brand
{
    /**
     * @var int
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $brand_id;

    /**
     * @var string
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $brand_name;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="Car", mappedBy="car_brand")
     */
    private $brand_cars;

    public function __construct()
    {
        $this->brand_cars=new ArrayCollection();
    }

    public function __toString()
    {
        return $this->brand_name;
    }

    // CODE FIRST APPROACH
    // XAMPP control panel, start apache+mysql
    // AUTO GENERATED, BUT REMOVE SETTER FOR ID
    // MANUALLY add addBrandCar / delBrandCar ...
    //
    // \xampp\php\php bin/console doctrine:database:create
    // doctrine:database:create
    // doctrine:schema:drop --force --full-database
    // doctrine:schema:update --force

    /**
     * @return int
     */
    public function getBrandId(): int
    {
        return $this->brand_id;
    }

    /**
     * @return string
     */
    public function getBrandName(): string
    {
        return $this->brand_name;
    }

    /**
     * @param string $brand_name
     */
    public function setBrandName(string $brand_name): void
    {
        $this->brand_name = $brand_name;
    }

    /**
     * @return Collection
     */
    public function getBrandCars(): Collection
    {
        return $this->brand_cars;
    }

    /**
     * @param Collection $brand_cars
     */
    public function setBrandCars(Collection $brand_cars): void
    {
        $this->brand_cars = $brand_cars;
    }



}
