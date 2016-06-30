<?php

namespace AppBundle\Entity;

/**
 * Events
 */
class Events
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $venue;

    /**
     * @var int
     */
    private $numberOfGuests;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $guests;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $items;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->guests = new \Doctrine\Common\Collections\ArrayCollection();
        $this->items = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Events
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set venue
     *
     * @param string $venue
     *
     * @return Events
     */
    public function setVenue($venue)
    {
        $this->venue = $venue;

        return $this;
    }

    /**
     * Get venue
     *
     * @return string
     */
    public function getVenue()
    {
        return $this->venue;
    }

    /**
     * Set numberOfGuests
     *
     * @param integer $numberOfGuests
     *
     * @return Events
     */
    public function setNumberOfGuests($numberOfGuests)
    {
        $this->numberOfGuests = $numberOfGuests;

        return $this;
    }

    /**
     * Get numberOfGuests
     *
     * @return int
     */
    public function getNumberOfGuests()
    {
        return $this->numberOfGuests;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Events
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Add guest
     *
     * @param Guests $guest
     *
     * @return Events
     */
    public function addGuest(Guests $guest)
    {
        $this->guests[] = $guest;

        return $this;
    }

    /**
     * Remove guest
     *
     * @param Guests $guest
     */
    public function removeGuest(Guests $guest)
    {
        $this->guests->removeElement($guest);
    }

    /**
     * Get guests
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGuests()
    {
        return $this->guests;
    }

    /**
     * Add item
     *
     * @param Items $item
     *
     * @return Events
     */
    public function addItem(Items $item)
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * Remove item
     *
     * @param Items $item
     */
    public function removeItem(Items $item)
    {
        $this->items->removeElement($item);
    }

    /**
     * Get items
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getItems()
    {
        return $this->items;
    }
    /**
     * @var \DateTime
     */
    private $dateOfEvent;


    /**
     * Set dateOfEvent
     *
     * @param \DateTime $dateOfEvent
     *
     * @return Events
     */
    public function setDateOfEvent($dateOfEvent)
    {
        $this->dateOfEvent = $dateOfEvent;

        return $this;
    }

    /**
     * Get dateOfEvent
     *
     * @return \DateTime
     */
    public function getDateOfEvent()
    {
        return $this->dateOfEvent;
    }
}
