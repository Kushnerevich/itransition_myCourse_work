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
use AppBundle\Entity\QuizQuestion;


class QuizAdminController extends Controller
{
    /**
     * @Route("/admin/quizedit",name="admin/quizedit")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function adminAction(UserDBManager $manager)
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository(User::class)->findAll();
        return $this->render('Admin/quizAdmin.html.twig',array(
            'users' => $users
        ));
    }
}