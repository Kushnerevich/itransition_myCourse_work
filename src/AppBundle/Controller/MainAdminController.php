<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 9.11.17
 * Time: 15.00
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\DBManager\AnswerDBManager;
use AppBundle\DBManager\QuestionDBManager;

class MainAdminController extends Controller
    {
    /**
     * @Route("/admin",name="admin")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function mainAdminAction()
    {

        return $this->render('Admin/mainAdmin.html.twig');
    }
}