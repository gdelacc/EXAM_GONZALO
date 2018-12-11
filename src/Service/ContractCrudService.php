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

    public function getContracts()
    {
        return $this->getRepo()->findAll();
    }

    public function newContract($contract)
    {
        // TODO: Implement newContract() method.
    }

    public function updateContract($contract)
    {
        // TODO: Implement updateContract() method.
    }

    public function deleteContract($contract)
    {
        // TODO: Implement deleteContract() method.
    }


}