<?php
namespace App\DataFixtures;

use App\Entity\Brand;
use App\Entity\Car;
use App\Entity\Player;
use App\Entity\Team;
use App\Entity\Contract;


use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\DBAL\Logging\DebugStack;
use Doctrine\DBAL\Logging\EchoSQLLogger;
use Doctrine\ORM\EntityManager;
use Egulias\EmailValidator\Exception\DotAtEnd;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class DataLoader extends Fixture implements  FixtureInterface, ContainerAwareInterface
{
    /** @var ContainerInterface */
    private $container;
    /** @var EntityManager */
    private $em;
    /** @var string */
    private $environment;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
        $kernel = $this->container->get('kernel');
        if ($kernel) $this->environment=$kernel->getEnvironment();
    }

    public function load(ObjectManager $manager)
    {


        $this->em = $manager;

        $this->em->getConnection()->getConfiguration()->setSQLLogger(null);
        $stackLogger = new DebugStack();
        $echoLogger = new EchoSQLLogger();
        $this->em->getConnection()->getConfiguration()->setSQLLogger($stackLogger);

        $team1 = new Team();
        $team1->setTeamName('Real Madrid');
        $team1->setTeamNationality('ESP');
        $team1->setTeamAddress('Madrid, Spain');

        $team2 = new Team();
        $team2->setTeamName('Lakers');
        $team2->setTeamNationality('USA');
        $team2->setTeamAddress('Los Angeles, USA');

        $team3 = new Team();
        $team3->setTeamName('German National Team');
        $team3->setTeamNationality('GER');
        $team3->setTeamAddress('Berlin, Germanay');

        $player1 = new Player();
        $player1->setPlayerName('Pau Gasol');
        $player1->setPlayerPosition('LeftWing');
        $player1->setPlayerSalary('200000');

        $player2 = new Player();
        $player2->setPlayerName('Ricky Rubio');
        $player2->setPlayerPosition('CentreBack');
        $player2->setPlayerSalary('80000');

        $player3 = new Player();
        $player3->setPlayerName('Kobe Bryant');
        $player3->setPlayerPosition('LeftWing');
        $player3->setPlayerSalary('100000');

        $contract1 = new Contract();
        $contract1->setPlayer($player1);
        $contract1->setTeam($team1);
        $contract1->setStartDate(new \DateTime('2015-12-21'));
        $contract1->setEndDate(new \DateTime('2018-03-21'));

        $contract2 = new Contract();
        $contract2->setPlayer($player1);
        $contract2->setTeam($team1);
        $contract2->setStartDate(new \DateTime('2018-03-22'));

        $contract3 = new Contract();
        $contract3->setPlayer($player2);
        $contract3->setTeam($team3);
        $contract3->setStartDate(new \DateTime('2013-12-21'));
        $contract3->setEndDate(new \DateTime('2017-04-21'));

        $contract4 = new Contract();
        $contract4->setPlayer($player3);
        $contract4->setTeam($team2);
        $contract4->setStartDate(new \DateTime('2011-01-01'));

        $this->em->persist($team1);
        $this->em->persist($team2);
        $this->em->persist($team3);

        $this->em->persist($player1);
        $this->em->persist($player2);
        $this->em->persist($player3);

        $this->em->persist($contract1);
        $this->em->persist($contract2);
        $this->em->persist($contract3);
        $this->em->persist($contract4);

        $this->em->flush();

        echo "\nBRANDS OK. QUERIES: ".count($stackLogger->queries);



        $bmw = new Brand();
        $bmw->setBrandName("BMW");
        $this->em->persist($bmw);

        $audi = new Brand();
        $audi->setBrandName("AUDI");
        $this->em->persist($audi);

        $citroen = new Brand();
        $citroen->setBrandName("CITROEN");
        $this->em->persist($citroen);
        $this->em->flush();
        echo "\nBRANDS OK. QUERIES: ".count($stackLogger->queries);

        $car = new Car();
        $car->setCarBrand($bmw);
        $car->setCarModel("116i");
        $car->setCarVisible(true);
        $car->setCarPrice(12345);
        $this->em->persist($car);
        $this->em->flush();
        echo "\nCAR OK. QUERIES: ".count($stackLogger->queries);
        echo "\n\n";

        $oneCar = $this->em->getRepository(Car::class)->findOneBy(['car_model'=>"116i"]);
        $oneCarId = $oneCar->getCarId();
        $oneCar->setCarPrice(22222); // PROXY CLASS!!!!
        $this->em->persist($oneCar);
        $this->em->flush();
        echo "\nMOD OK. QUERIES: ".count($stackLogger->queries);
        echo "\nPRICE IS: ".$this->em->getRepository(Car::class)->find($oneCarId)->getCarPrice();
        echo "\n\n";

        echo "NUMBER OF CARS FOR BMW\n";
        $bmwId = $bmw->getBrandId();
        echo $bmw->getBrandCars()->count()."\n";
        echo $this->em->getRepository(Brand::class)->find($bmwId)->getBrandCars()->count()."\n";
        $this->em->clear();
        echo $this->em->getRepository(Brand::class)->find($bmwId)->getBrandCars()->count()."\n";
        $audi = $this->em->getRepository(Brand::class)->find($bmwId+1);
        $this->em->remove($audi);
        $this->em->flush();
        echo "\nDEL OK. QUERIES: ".count($stackLogger->queries);




// CRUD = Create, Read, Update, Delete
// TODO: CRUD SERVICE
// Fat services, Skinny controllers
        /*
\xampp\php\php bin/console doctrine:schema:drop --force --full-database
\xampp\php\php bin/console doctrine:database:create
\xampp\php\php bin/console doctrine:schema:update --force
\xampp\php\php bin/console doctrine:fixtures:load --no-interaction -vvv
         */
    }

}