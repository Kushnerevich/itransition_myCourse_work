<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 11.11.17
 * Time: 21.27
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class DeleteUserController extends Controller
{
    /**
     *@Route("/delete", name="delete")
     *@Security("has_role('ROLE_ADMIN')")
     *@Method("GET")
     */
    public function deleteAction()
    {
        return $this->render('Admin/mainAdmin.html.twig');
    }
}


