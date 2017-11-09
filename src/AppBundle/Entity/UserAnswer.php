<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="UserAnswer")
 * @ORM\Entity()
 */
class UserAnswer
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="User", inversedBy="UserAnswer")
     * @ORM\JoinColumn(name="id_User", referencedColumnName="id")
     */
    private $idUser;

    /**
     * @ORM\OneToOne(targetEntity="Question", inversedBy="UserAnswer")
     * @ORM\JoinColumn(name="id_Question", referencedColumnName="id")
     */
    private $idQuestion;

    /**
     * @ORM\OneToOne(targetEntity="Answer", inversedBy="UserAnswer")
     * @ORM\JoinColumn(name="id_Answer", referencedColumnName="id")
     */
    private $idAnswer;

    public function getId(): int
    {
        return $this->id;
    }

    public function setIdUser(string $idUser)
    {
        $this->idUser=$idUser;
    }

    public function getNameOfQuestions()
    {
        return $this->idUser;
    }


    public function setIdQuestion(string $idQuestion)
    {
        $this->idQuestion=$idQuestion;
    }

    public function getIdQuestion()
    {
        return $this->idQuestion;
    }

    public function setIdAnswer(string $idAnswer)
    {
        $this->idAnswer=$idAnswer;
    }

    public function getIdAnswer()
    {
        return $this->idAnswer;
    }
}