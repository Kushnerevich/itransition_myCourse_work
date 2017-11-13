<?php
/**
 * Created by PhpStorm.
 * User: yuriy
 * Date: 31.10.17
 * Time: 0.10
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Question;
use AppBundle\Entity\Quiz;

class QuizController extends Controller
{
    /**
     * @Route("/quiz", name="quiz")
     * @Method("GET")
     * @Security("has_role('ROLE_USER')")
     */
    public function quizAction(){
        $em = $this->getDoctrine()->getManager();
        $quiz = $em->getRepository(Quiz::class)->findAll();
        return $this->render('quiz/quiz.html.twig',array(
            "quiz"=>$quiz
        ));
    }

    /**
     * @Route("/quiz", name="quiz")
     * @Method("GET")
     * @Security("has_role('ROLE_USER')")
     */
    public function goAction(){
        $em = $this->getDoctrine()->getManager();
        $quiz = $em->getRepository(Quiz::class)->findAll();
        return $this->render('quiz/gamePage.html.twig',array(
            "quiz"=>$quiz
        ));
    }
}