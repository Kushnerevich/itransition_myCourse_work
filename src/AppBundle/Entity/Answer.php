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
     * @ORM\Column(type="string", length=25, unique=false)
     */
    private $nameOfAnswer;

    /**
     * @ORM\Column(type="boolean")
     */
    private $right;

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

    public function setNameOfAnswer(string $nameOfAnswer)
    {
        $this->nameOfAnswer=$nameOfAnswer;
    }

    public function getname_of_answer()
    {
        return $this->nameOfAnswer;
    }

    public function setRight(string $right)
    {
        $this->right=$right;
    }

    public function getRight()
    {
        return $this->right;
    }

    public function setIdQuestion(string $idQuestion)
    {
        $this->idQuestion=$idQuestion;
    }

    public function getQuestion_id()
    {
        return $this->idQuestion;
    }
}