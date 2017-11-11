<?php
/**
 * Created by PhpStorm.
 * User: yuriy
 * Date: 26.10.17
 * Time: 16.17
 */

namespace AppBundle\DBManager;

use Doctrine\Common\Persistence\ManagerRegistry;
use AppBundle\Entity\User;
use AppBundle\Entity\UserToken;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManager;


class UserDBManager extends Controller
{
    private $db;
    const BYTE_COUNT = 32;
    const REGISTRATION_TYPE = 'registration';
    const RECOVER_TYPE = 'recover';

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->db = $doctrine->getManager();
    }

    public function addUser(User $user)
    {
        $userToken = new UserToken($user, self::REGISTRATION_TYPE, $this->getToken(), $this->getTime());
        $user->setUserToken($userToken);
        $this->db->persist($user);
        $this->db->persist($userToken);
        $this->db->flush();
    }

    public function getUsers(string $email)
    {
        return $this->db
            ->getRepository('AppBundle\Entity\User')
            ->findOneBy(['email' => $email]);
    }

    public function isUserExist(string $email): bool
    {
        return null !== $this->getUsers($email);
    }

    public function getUserByToken(string $token):? User
    {
        $userToken = $this->db
            ->getRepository('AppBundle\Entity\UserToken')
            ->findOneBy(['token' => $token]);
        if ($userToken) {
            return $userToken->getUser();
        } else {
            return null;
        }
    }

    public function isUserExistByToken(string $token): bool
    {
        return null !== $this->getUserByToken($token);
    }

    public function getUserById(int $id):? User
    {
        return $this->db
            ->getRepository('AppBundle\Entity\User')
            ->findOneBy(['id' => $id]);
    }

    public function activateUser(User $user)
    {
        $user->setIsActive(true);
        $userToken = $user->getUserToken();
        $this->db->remove($userToken);
        $this->db->flush();
    }

    public function resetPassword(User $user)
    {
        $userToken = new UserToken($user, self::RECOVER_TYPE, $this->getToken(), $this->getTime());
        $user->setUserToken($userToken);
        $this->db->persist($user);
        $this->db->persist($userToken);
        $this->db->flush();
    }

    public function updatePassword(User $user)
    {
        $userToken = $user->getUserToken();
        $this->db->remove($userToken);
        $this->db->persist($user);
        $this->db->flush();
    }

    public function isRegistrationToken(string $token): bool
    {
        $userToken = $this->getUserByToken($token)->getUserToken();
        return $userToken->getType() === self::REGISTRATION_TYPE;
    }

    public function isRecoverToken(string $token): bool
    {
        $userToken = $this->getUserByToken($token)->getUserToken();
        return $userToken->getType() === self::RECOVER_TYPE;
    }

    private function getToken(): string
    {
        return bin2hex(openssl_random_pseudo_bytes(self::BYTE_COUNT));
    }

    private function getTime(): \DateTime
    {
        return new \DateTime();
    }

    public function getAllUsers()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository(User::class)->findAll();
        return $users;
    }
}