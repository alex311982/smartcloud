<?php

namespace SmartCloudSolutions\GubarevBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Task
 *
 * @ORM\Table(name="Task", uniqueConstraints={@ORM\UniqueConstraint(name="name", columns={"name"})}, indexes={@ORM\Index(name="text_id", columns={"text_id"})})
 * @ORM\Entity
 */
class Task
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=32, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=255, nullable=true)
     */
    private $comment;

    /**
     * @var boolean
     *
     * @ORM\Column(name="filter_by_period", type="boolean", nullable=false)
     */
    private $filterByPeriod;

    /**
     * @var string
     *
     * @ORM\Column(name="critical_day_direction", type="string", length=32, nullable=false)
     */
    private $criticalDayDirection;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \SmartCloudSolutions\GubarevBundle\Entity\Text
     *
     * @ORM\ManyToOne(targetEntity="SmartCloudSolutions\GubarevBundle\Entity\Text")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="text_id", referencedColumnName="id")
     * })
     */
    private $text;



    /**
     * Set name
     *
     * @param string $name
     * @return Task
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
     * Set comment
     *
     * @param string $comment
     * @return Task
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set filterByPeriod
     *
     * @param boolean $filterByPeriod
     * @return Task
     */
    public function setFilterByPeriod($filterByPeriod)
    {
        $this->filterByPeriod = $filterByPeriod;

        return $this;
    }

    /**
     * Get filterByPeriod
     *
     * @return boolean 
     */
    public function getFilterByPeriod()
    {
        return $this->filterByPeriod;
    }

    /**
     * Set criticalDayDirection
     *
     * @param string $criticalDayDirection
     * @return Task
     */
    public function setCriticalDayDirection($criticalDayDirection)
    {
        $this->criticalDayDirection = $criticalDayDirection;

        return $this;
    }

    /**
     * Get criticalDayDirection
     *
     * @return string 
     */
    public function getCriticalDayDirection()
    {
        return $this->criticalDayDirection;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set text
     *
     * @param \SmartCloudSolutions\GubarevBundle\Entity\Text $text
     * @return Task
     */
    public function setText(\SmartCloudSolutions\GubarevBundle\Entity\Text $text = null)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return \SmartCloudSolutions\GubarevBundle\Entity\Text 
     */
    public function getText()
    {
        return $this->text;
    }
}
