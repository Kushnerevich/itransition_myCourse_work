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
    private $Id;

    /**
     * @ORM\Column(type="string", length=60, unique=false)
     */
    private $name_of_question;

    public function getId():int
    {
        return $this->Id;
    }

    public function setNameOfQuestions(string $nameOfQuestion)
    {
        $this->name_of_question=$nameOfQuestion;
    }

    public function getname_of_question()
    {
        return $this->name_of_question;
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->Id,
            $this->name_of_question,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->Id,
            $this->name_of_question,
            ) = unserialize($serialized);
    }
}