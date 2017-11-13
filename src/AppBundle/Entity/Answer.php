<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="Answer")
 * @ORM\Entity()
 */
class Answer
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nameOfAnsw;

    /**
     * @ORM\Column(type="boolean")
     */
    private $rightAnswer;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Question",inversedBy="QuizQuestions")
     * @ORM\JoinColumn(name="Question_id", referencedColumnName="id", onDelete="cascade")
     */
    private $idQuestion;

    public function getId(): int
    {
        return $this->id;
    }

    public function setnameOfAnsw(string $nameOfAnswer)
    {
        $this->nameOfAnsw=$nameOfAnswer;
    }

    public function getname_of_answer()
    {
        return $this->nameOfAnsw;
    }

    public function setRight(bool $right)
    {
        $this->rightAnswer=$right;
    }

    public function getright_answer()
    {
        return $this->rightAnswer;
    }

    public function setIdQuestion( $idQuestion)
    {
        $this->idQuestion=$idQuestion;
    }

    public function getQuestion_id()
    {
        return $this->idQuestion;
    }
}