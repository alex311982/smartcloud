<?php

namespace SmartCloudSolutions\GubarevBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TaskGroupValues
 *
 * @ORM\Table(name="Task_group_values", uniqueConstraints={@ORM\UniqueConstraint(name="period", columns={"period", "task_id", "group_id"})}, indexes={@ORM\Index(name="group_id", columns={"group_id"}), @ORM\Index(name="task_id", columns={"task_id"})})
 * @ORM\Entity
 */
class TaskGroupValues
{
    /**
     * @var string
     *
     * @ORM\Column(name="period", type="string", length=32, nullable=false)
     */
    private $period;

    /**
     * @var boolean
     *
     * @ORM\Column(name="day_from", type="boolean", nullable=false)
     */
    private $dayFrom;

    /**
     * @var boolean
     *
     * @ORM\Column(name="avans", type="boolean", nullable=false)
     */
    private $avans;

    /**
     * @var integer
     *
     * @ORM\Column(name="days", type="smallint", nullable=false)
     */
    private $days;

    /**
     * @var boolean
     *
     * @ORM\Column(name="accumulate", type="boolean", nullable=false)
     */
    private $accumulate;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \SmartCloudSolutions\GubarevBundle\Entity\Task
     *
     * @ORM\ManyToOne(targetEntity="SmartCloudSolutions\GubarevBundle\Entity\Task")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="task_id", referencedColumnName="id")
     * })
     */
    private $task;

    /**
     * @var \SmartCloudSolutions\GubarevBundle\Entity\Taxgroup
     *
     * @ORM\ManyToOne(targetEntity="SmartCloudSolutions\GubarevBundle\Entity\Taxgroup")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     * })
     */
    private $group;



    /**
     * Set period
     *
     * @param string $period
     * @return TaskGroupValues
     */
    public function setPeriod($period)
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get period
     *
     * @return string 
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set dayFrom
     *
     * @param boolean $dayFrom
     * @return TaskGroupValues
     */
    public function setDayFrom($dayFrom)
    {
        $this->dayFrom = $dayFrom;

        return $this;
    }

    /**
     * Get dayFrom
     *
     * @return boolean 
     */
    public function getDayFrom()
    {
        return $this->dayFrom;
    }

    /**
     * Set avans
     *
     * @param boolean $avans
     * @return TaskGroupValues
     */
    public function setAvans($avans)
    {
        $this->avans = $avans;

        return $this;
    }

    /**
     * Get avans
     *
     * @return boolean 
     */
    public function getAvans()
    {
        return $this->avans;
    }

    /**
     * Set days
     *
     * @param integer $days
     * @return TaskGroupValues
     */
    public function setDays($days)
    {
        $this->days = $days;

        return $this;
    }

    /**
     * Get days
     *
     * @return integer 
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * Set accumulate
     *
     * @param boolean $accumulate
     * @return TaskGroupValues
     */
    public function setAccumulate($accumulate)
    {
        $this->accumulate = $accumulate;

        return $this;
    }

    /**
     * Get accumulate
     *
     * @return boolean 
     */
    public function getAccumulate()
    {
        return $this->accumulate;
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
     * Set task
     *
     * @param \SmartCloudSolutions\GubarevBundle\Entity\Task $task
     * @return TaskGroupValues
     */
    public function setTask(\SmartCloudSolutions\GubarevBundle\Entity\Task $task = null)
    {
        $this->task = $task;

        return $this;
    }

    /**
     * Get task
     *
     * @return \SmartCloudSolutions\GubarevBundle\Entity\Task 
     */
    public function getTask()
    {
        return $this->task;
    }

    /**
     * Set group
     *
     * @param \SmartCloudSolutions\GubarevBundle\Entity\Taxgroup $group
     * @return TaskGroupValues
     */
    public function setGroup(\SmartCloudSolutions\GubarevBundle\Entity\Taxgroup $group = null)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return \SmartCloudSolutions\GubarevBundle\Entity\Taxgroup 
     */
    public function getGroup()
    {
        return $this->group;
    }
}
