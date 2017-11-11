<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 9.11.17
 * Time: 17.07
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Question;
use AppBundle\Entity\Answer;

class QuestionAdminController extends Controller
{
    /**
     * @Route("/admin/questionedit",name="admin/questionedit")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function adminAction()
    {
        $em = $this->getDoctrine()->getManager();
        $questions = $em->getRepository(Question::class)->findAll();
        $answers = $em->getRepository(Answer::class)->findAll();
        return $this->render('Admin/questionAdmin.html.twig',array(
            'questions' => $questions,
            'answers'=>$answers
        ));

    }
}