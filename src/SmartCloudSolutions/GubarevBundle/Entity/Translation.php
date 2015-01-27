<?php

namespace SmartCloudSolutions\GubarevBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Translation
 *
 * @ORM\Table(name="Translation", uniqueConstraints={@ORM\UniqueConstraint(name="lang", columns={"lang", "text_id"})}, indexes={@ORM\Index(name="text_id", columns={"text_id"})})
 * @ORM\Entity
 */
class Translation
{
    /**
     * @var string
     *
     * @ORM\Column(name="lang", type="string", length=2, nullable=false)
     */
    private $lang;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", length=65535, nullable=false)
     */
    private $text;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
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
    private $text2;



    /**
     * Set lang
     *
     * @param string $lang
     * @return Translation
     */
    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * Get lang
     *
     * @return string 
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set text
     *
     * @param string $text
     * @return Translation
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
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
     * Set text2
     *
     * @param \SmartCloudSolutions\GubarevBundle\Entity\Text $text2
     * @return Translation
     */
    public function setText2(\SmartCloudSolutions\GubarevBundle\Entity\Text $text2 = null)
    {
        $this->text2 = $text2;

        return $this;
    }

    /**
     * Get text2
     *
     * @return \SmartCloudSolutions\GubarevBundle\Entity\Text 
     */
    public function getText2()
    {
        return $this->text2;
    }
}
