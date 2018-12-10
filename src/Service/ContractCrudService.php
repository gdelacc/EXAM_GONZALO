<?php
/**
 * Created by PhpStorm.
 * User: hallgató
 * Date: 2018.12.04.
 * Time: 15:22
 */

namespace App\Service;


use App\Entity\Contract;
use App\Entity\Player;
use App\Entity\Team;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class ContractCrudService extends CrudService implements IContractCrudService
{
    /**
     * CarCrudService constructor.
     * @param $em EntityManager
     * @param $form FormFactory
     * @param $request Request
     */
    public function __construct($em, $form, $request)
    {
        parent::__construct($em, $form, $request);
    }

    /**
     * @inheritDoc
     */
    public function getRepo()
    {
        return $this->em->getRepository(Contract::class);
    }


    public function getPlayerContracted($player_id)
    {
        $onePlayer = $this->getRepo()->find($player_id);
        if (!$onePlayer){
            throw new NotFoundHttpException("PLAYER NOT FOUND");
            // controller: throw $this->createNotFoundException()
        }
        return $onePlayer;
    }

    public function getPlayersContracted()
    {
        return $this->getRepo()->findAll();
    }




}