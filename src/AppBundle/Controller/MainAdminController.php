<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 9.11.17
 * Time: 15.00
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;

class MainAdminController extends Controller
    {
    /**
     * @Route("/admin",name="admin")
     * @Security("has_role('ROLE_ADMIN')")
     * @Method("GET")
     */
    public function mainAdminAction(Request $request)
    {
        return $this->render('Admin/mainAdmin.html.twig');
    }
}