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


class QuizAdminController extends Controller
{
    /**
     * @Route("/admin/quizedit",name="admin/quizedit")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function adminAction()
    {

        return $this->render('Admin/quizAdmin.html.twig');
    }
}