<?php

namespace Oxhild\ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class BinderCard
 *
 * @package Oxhild\ApiBundle\Entity
 *
 * @author Eric Dupertuis <dupertuis.eric@gmail.com>
 *
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Oxhild\ApiBundle\Repository\BinderCardRepository")
 */
class BinderCard
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Oxhild\ApiBundle\Entity\Binder")
     */
    private $binder;

    /**
     * @ORM\ManyToOne(targetEntity="Oxhild\ApiBundle\Entity\Card")
     */
    private $card;

    /**
     * @ORM\Column(type="integer")
     */
    private $count;

    /**
     * @return mixed
     */
    public function getBinder()
    {
        return $this->binder;
    }

    /**
     * @param mixed $binder
     */
    public function setBinder($binder)
    {
        $this->binder = $binder;
    }

    /**
     * @return mixed
     */
    public function getCard()
    {
        return $this->card;
    }

    /**
     * @param mixed $card
     */
    public function setCard($card)
    {
        $this->card = $card;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @param mixed $count
     */
    public function setCount($count)
    {
        $this->count = $count;
    }

    public function addCount()
    {
        $this->count++;
    }

    public function removeCard()
    {
        $this->count--;
    }
}