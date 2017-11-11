<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="Quiz")
 * @ORM\Entity()
 */
class Quiz implements \Serializable
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
    private $nameOfQuiz;


    public function getId(): int
    {
        return $this->id;
    }

    public function setname_of_quiz(string $nameOfQuiz)
    {
        $this->nameOfQuiz=$nameOfQuiz;
    }

    public function getname_of_quiz()
    {
        return $this->nameOfQuiz;
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->nameOfQuiz,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->nameOfQuiz,
            ) = unserialize($serialized);
    }
}