<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 9.11.17
 * Time: 17.05
 */

namespace AppBundle\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\DBManager\UserDBManager;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

    /**
     * @Route("/admin/useredit/del", name="/admin/useredit/del")
     * @Method("GET")
     */
    public function deleteAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->findOneBy(
            array('id' =>$_GET['id'])
        );
        $em->remove($user);
        $em->flush();
        return new Response("HEllo");
    }
}
