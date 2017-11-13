<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 9.11.17
 * Time: 17.32
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Entity\Quiz;
use AppBundle\DBManager\UserDBManager;
use AppBundle\Entity\QuizQuestion;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Question;
use Symfony\Component\HttpFoundation\Response;



class QuizAdminController extends Controller
{
    /**
     * @Route("/admin/quizedit",name="admin/quizedit")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function adminAction(UserDBManager $manager)
    {
        $em = $this->getDoctrine()->getManager();
        $quiz = $em->getRepository(Quiz::class)->findAll();
        $quizquestion= $em->getRepository(QuizQuestion::class)->findAll();
        $question= $em->getRepository(Question::class)->findAll();
        return $this->render('Admin/quizAdmin.html.twig',array(
            'quiz' => $quiz,
            'quizquetion' =>$quizquestion,
            'question'=>$question
        ));
    }

    /**
     * @Route("/admin/quizedit/del",name="admin/quizedit/del")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function deleteAction(UserDBManager $manager)
    {
        $em = $this->getDoctrine()->getManager();
        $quiz = $em->getRepository(Quiz::class)->findOneBy(
            array('id'=>$_GET['id'])
        );
        $em->remove($quiz);
        $em->flush();
        return new Response("HEllo");
    }

    /**
     * @Route("/admin/quizedit/add",name="admin/quizedit/add")
     * @Security("has_role('ROLE_ADMIN')")
     * @Method("GET")
     */
    public function addAction(UserDBManager $manager)
    {
        $em = $this->getDoctrine()->getManager();
        $quiz = new Quiz();
        $quiz->setname_of_quiz($_GET['quiz']);
        $em->persist($quiz);
        $question1 = $em->getRepository(Question::class)->findOneBy(
            array('name_of_question'=>$_GET['question1'])
        );
        $questionQuiz= new QuizQuestion();
        $questionQuiz->setIdQuiz($quiz);
        $questionQuiz->setIdQuestion($question1);
        $em->persist($questionQuiz);

        $question2 = $em->getRepository(Question::class)->findOneBy(
            array('name_of_question'=>$_GET['question2'])
        );
        $questionQuiz1= new QuizQuestion();
        $questionQuiz1->setIdQuiz($quiz);
        $questionQuiz1->setIdQuestion($question2);
        $em->persist($questionQuiz1);

        $question3 = $em->getRepository(Question::class)->findOneBy(
            array('name_of_question'=>$_GET['question3'])
        );
        $questionQuiz2= new QuizQuestion();
        $questionQuiz2->setIdQuiz($quiz);
        $questionQuiz2->setIdQuestion($question3);
        $em->persist($questionQuiz2);

        $question4 = $em->getRepository(Question::class)->findOneBy(
            array('name_of_question'=>$_GET['question4'])
        );
        $questionQuiz3= new QuizQuestion();
        $questionQuiz3->setIdQuiz($quiz);
        $questionQuiz3->setIdQuestion($question4);
        $em->persist($questionQuiz3);

        $question5 = $em->getRepository(Question::class)->findOneBy(
            array('name_of_question'=>$_GET['question5'])
        );
        $questionQuiz4= new QuizQuestion();
        $questionQuiz4->setIdQuiz($quiz);
        $questionQuiz4->setIdQuestion($question5);
        $em->persist($questionQuiz4);

        $question6 = $em->getRepository(Question::class)->findOneBy(
            array('name_of_question'=>$_GET['question6'])
        );
        $questionQuiz5= new QuizQuestion();
        $questionQuiz5->setIdQuiz($quiz);
        $questionQuiz5->setIdQuestion($question6);
        $em->persist($questionQuiz5);

        $question7 = $em->getRepository(Question::class)->findOneBy(
            array('name_of_question'=>$_GET['question7'])
        );
        $questionQuiz6= new QuizQuestion();
        $questionQuiz6->setIdQuiz($quiz);
        $questionQuiz6->setIdQuestion($question7);
        $em->persist($questionQuiz6);

        $question8 = $em->getRepository(Question::class)->findOneBy(
            array('name_of_question'=>$_GET['question8'])
        );
        $questionQuiz7= new QuizQuestion();
        $questionQuiz7->setIdQuiz($quiz);
        $questionQuiz7->setIdQuestion($question8);
        $em->persist($questionQuiz7);

        $question9 = $em->getRepository(Question::class)->findOneBy(
            array('name_of_question'=>$_GET['question9'])
        );
        $questionQuiz8= new QuizQuestion();
        $questionQuiz8->setIdQuiz($quiz);
        $questionQuiz8->setIdQuestion($question9);
        $em->persist($questionQuiz8);

        $question10 = $em->getRepository(Question::class)->findOneBy(
            array('name_of_question'=>$_GET['question10'])
        );
        $questionQuiz9= new QuizQuestion();
        $questionQuiz9->setIdQuiz($quiz);
        $questionQuiz9->setIdQuestion($question10);
        $em->persist($questionQuiz9);

        $em->flush();
        return new Response("Hello");
    }


}