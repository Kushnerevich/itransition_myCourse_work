<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="Question")
 * @ORM\Entity()
 */
class Question implements \Serializable
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
    private $nameOfQuestion;

    public function getId(): int
    {
        return $this->id;
    }

    public function setNameOfQuestions(string $nameOfQuestion)
    {
        $this->nameOfQuestion=$nameOfQuestion;
    }

    public function getNameOfQuestions()
    {
        return $this->nameOfQuestion;
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->nameOfQuestion,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->nameOfQuestion,
            ) = unserialize($serialized);
    }
}