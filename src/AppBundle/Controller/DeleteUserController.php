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

class DeleteUserController extends Controller
{
    /**
     * @Route("/delete", name="delete")
     */
    public function HelloAction()
    {
       echo "asfasf";
    }
}