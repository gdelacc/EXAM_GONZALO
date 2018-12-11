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

interface IContractCrudService
{

    /**
     * @return Contract[]
     */
    public function getContracts();

    /**
     * @return Bool
     * @var Contract
     */
    public function newContract($contract);

    /**
     * @return Bool
     * @var Contract
     */
    public function updateContract($contract);

    /**
     * @return Bool
     * @var Contract
    */
    public function deleteContract($contract);


}