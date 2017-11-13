<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use AppBundle\Entity\Quiz;
use AppBundle\Entity\Question;

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
     * @ORM\ManyToOne(targetEntity="Quiz", inversedBy="QuizQuestions")
     * @ORM\JoinColumn(name="id_Quiz", referencedColumnName="id",onDelete="cascade")
     */
    private $idQuiz;

    /**
     * @ORM\ManyToOne(targetEntity="Question", inversedBy="QuizQuestions")
     * @ORM\JoinColumn(name="id_Question", referencedColumnName="id",onDelete="cascade")
     */
    private $idQuestion;

    public function getId()
    {
        return $this->id;
    }

    public function setIdQuiz(Quiz $idQuiz)
    {
        $this->idQuiz=$idQuiz;
    }

    public function getid_Quiz()
    {
        return $this->idQuiz;
    }

    public function setIdQuestion(Question $idQuestion)
    {
        $this->idQuestion=$idQuestion;
    }

    public function getid_Question()
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