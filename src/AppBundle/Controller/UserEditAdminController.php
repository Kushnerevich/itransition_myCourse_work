<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 9.11.17
 * Time: 17.05
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\DBManager\UserDBManager;
use AppBundle\Entity\User;

class UserEditAdminController extends Controller
{

    /**
     * @Route("/admin/useredit",name= "admin/useredit")
     * @Security("has_role('ROLE_ADMIN')")
     */
    public function adminAction(UserDBManager $manager)
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository(User::class)->findAll();
        return $this->render('Admin/userAdmin.html.twig',array(
            'users' => $users
            ));
    }

    /*public function deleteAction()
    {
        !!!
        return $this->render('Admin/userAdmin.html.twig',array(
            'users' => $users
            ));
    }*/
}
