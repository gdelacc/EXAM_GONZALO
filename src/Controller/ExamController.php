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
 * @Route("/")
 */
class ExamController extends Controller
{
    /**
     * @Route(path="/exam", name="HomeExam" )
     */
    public function HomeExam (Request $request) {

        $contracts = $this->get('app.contract');
        $players = $contracts->getPlayers();

        $twigParams = ["errors"=>"","players"=>$players,"contracts"=>$contracts->getPlayers()];

        Debug::dump($players);

        return $this->render('exam.html.twig', $twigParams);

    }
}