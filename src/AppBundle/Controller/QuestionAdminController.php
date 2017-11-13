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
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Answer;
use Symfony\Component\HttpFoundation\Response;

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

    /**
     * @Route("/admin/questionedit/del", name="/admin/questionedit/del")
     * @Method("GET")
     */
    public function deleteAction()
    {
        $em = $this->getDoctrine()->getManager();
        $question = $em->getRepository(Question::class)->findOneBy(
            array('Id' =>$_GET['id'])
        );
        $em->remove($question);
        $em->flush();
        return new Response("HEllo");
    }

    /**
     * @Route("/admin/questionedit/add", name="/admin/questionedit/add")
     * @Method("GET")
     */
    public function AddAction()
    {
        $em = $this->getDoctrine()->getManager();
        $question= new Question();
        $question->setNameOfQuestions($_GET['questions']);
        $em->persist($question);

        $em->flush();
        $true=true;
        $false=false;
        $answer1 = new Answer();
        $answer1->setnameOfAnsw($_GET['answer1']);
        if ($_GET['trueAnswer']=="1")
        {
            $answer1->setRight('true');
        }else
        {
            $answer1->setRight('false');
        }

        $answer1->setIdQuestion($question);
        $em->persist($answer1);



        $answer2 = new Answer();
        $answer2->setnameOfAnsw($_GET['answer2']);
        if ($_GET['trueAnswer']=="2")
        {
            $answer2->setRight("$true");
        }else
        {
            $answer2->setRight("$false");
        }
        $answer2->setIdQuestion($question);
        $em->persist($answer2);

        $answer3 = new Answer();
        $answer3->setnameOfAnsw($_GET['answer3']);
        if ($_GET['trueAnswer']=="3")
        {
            $answer3->setRight("true");
        }else
        {
            $answer3->setRight("$false");
        }
        $answer3->setIdQuestion($question);
        $em->persist($answer3);


        $answer4 = new Answer();
        $answer4->setnameOfAnsw($_GET['answer4']);
        if ($_GET['trueAnswer']=="4")
        {
            $answer4->setRight("$true");
        }else
        {
            $answer4->setRight("$false");
        }
        $answer4->setIdQuestion($question);
        $em->persist($answer4);

        $em->flush();

        return new Response("Hello");
    }
}