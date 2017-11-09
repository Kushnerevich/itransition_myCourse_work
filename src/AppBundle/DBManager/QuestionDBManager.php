<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 9.11.17
 * Time: 14.53
 */

namespace AppBundle\DBManager;

use Doctrine\Common\Persistence\ManagerRegistry;
use AppBundle\Entity\Question;

class QuestionDBManager
{
    private $db;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->db = $doctrine->getManager();
    }

    public function addQuestion(Question $question, string $NameOfTheQuestion)
    {
        $question->setNameOfQuestions($NameOfTheQuestion);
        $this->db->persist($question);
        $this->db->flush();
    }

    public function getQuestion(string $NameOfQuestion)
    {
        return $this->db
            ->getRepository('AppBundle\Entity\Question')
            ->findOneBy(['name_of_question' => $NameOfQuestion]);
    }
}