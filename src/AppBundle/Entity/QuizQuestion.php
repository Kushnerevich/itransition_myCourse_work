<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="QuizQuestions")
 * @ORM\Entity()
 */
class QuizQuestion implements \Serializable
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="Quiz", inversedBy="QuizQuestions")
     * @ORM\JoinColumn(name="id_Quiz", referencedColumnName="id")
     */
    private $idQuiz;

    /**
     * @ORM\OneToOne(targetEntity="Question", inversedBy="QuizQuestions")
     * @ORM\JoinColumn(name="id_Question", referencedColumnName="id")
     */
    private $idQuestion;

    public function getId(): int
    {
        return $this->id;
    }

    public function setIdQuiz(string $idQuiz)
    {
        $this->idQuiz=$idQuiz;
    }

    public function getIdQuiz()
    {
        return $this->idQuiz;
    }

    public function setIdQuestion(string $idQuestion)
    {
        $this->idQuestion=$idQuestion;
    }

    public function getQuestion_id()
    {
        return $this->idQuestion;
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->idQuestion,
            $this->idQuiz
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->idQuestion,
            $this->idQuiz
            ) = unserialize($serialized);
    }
}