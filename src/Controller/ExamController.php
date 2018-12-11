<?php
/**
 * Created by PhpStorm.
 * User: hallgató
 * Date: 2018.12.04.
 * Time: 13:23
 */

namespace App\Controller;

use Doctrine\Common\Util\Debug;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/exam")
 */
class ExamController extends Controller
{
    /**
     * @Route(path="/", name="HomeExam" )
     */
    public function HomeExam (Request $request) {

        $contracts = $this->get('app.contract');

        $twigParams = ["errors"=>"","contracts"=>$contracts->getPlayersContracted()];

        //Debug::dump($players);

        return $this->render('exam.html.twig', $twigParams);

    }
    /**
     * @Route(path="/edit/{contract_id}", name="contractEdit" )
     */
    public function contractEdit (Request $request, $contract_id=null) {

        $twigParams = ["errors"=>"","contract_id"=>$contract_id];

        return $this->render('exam_edit.html.twig', $twigParams);
    }

    /**
     * @Route(path="/delete/{contract_id}", name="contractRemove" )
     */
    public function contractRemove (Request $request, $contract_id=null) {

        //TODO: Remove the contract and... retrieve the final list of contracts

        $contracts = $this->get('app.contract');

        $twigParams = ["errors"=>"CONTRACT DELETED!!!","contracts"=>$contracts->getPlayersContracted()];

        return $this->render('exam.html.twig', $twigParams);
    }

    /**
     * @Route(path="/add/", name="contractNew" )
     */
    public function contractNew (Request $request) {

        return null;
    }

}