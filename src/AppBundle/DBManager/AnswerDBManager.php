<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 9.11.17
 * Time: 14.53
 */
namespace AppBundle\DBManager;

use AppBundle\Entity\Answer;
use Doctrine\Common\Persistence\ManagerRegistry;

class AnswerDBManager
{

    private $db;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->db = $doctrine->getManager();
    }

    public function addAnswer(Answer $newAnswer,string $answer,boolean $right,string $Question)
    {
        $newAnswer->setNameOfAnswer($answer);
        $newAnswer->setRight($right);
        $newAnswer->setIdQuestion($Question);
        $this->db->persist($newAnswer);
        $this->db->flush();
    }

    public function getAnswerName(string $nameOfAnswer)
    {
        return $this->db
            ->getRepository('AppBundle\Entity\Answer')
            ->findOneBy(['name_of_answer' => $nameOfAnswer]);
    }
}