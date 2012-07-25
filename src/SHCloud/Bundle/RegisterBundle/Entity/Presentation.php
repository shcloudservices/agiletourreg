<?php

namespace SHCloud\Bundle\RegisterBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * SHCloud\Bundle\RegisterBundle\Entity\Presentation
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Presentation {
	/**
	 * @var integer $id
	 *
	 * @ORM\Column(name="id", type="integer")
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @var string $title
	 *
	 * @ORM\Column(name="title", type="string", length=255)
	 */
	private $title;

	/**
	 * @var text $summary
	 *
	 * @ORM\Column(name="summary", type="text")
	 */
	private $summary;

	/**
	 * @var string $slidesPath
	 *
	 * @ORM\Column(name="slidesPath", type="string", length=255)
	 */
	private $slidesPath;

	/**
	 * @ORM\ManyToOne(targetEntity="User", inversedBy="presentations")
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
	 */
	private $speaker;

	/**
	 * Get id
	 *
	 * @return integer 
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Set title
	 *
	 * @param string $title
	 * @return Presentation
	 */
	public function setTitle($title) {
		$this->title = $title;
		return $this;
	}

	/**
	 * Get title
	 *
	 * @return string 
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Set summary
	 *
	 * @param text $summary
	 * @return Presentation
	 */
	public function setSummary($summary) {
		$this->summary = $summary;
		return $this;
	}

	/**
	 * Get summary
	 *
	 * @return text 
	 */
	public function getSummary() {
		return $this->summary;
	}

	/**
	 * Set slidesPath
	 *
	 * @param string $slidesPath
	 * @return Presentation
	 */
	public function setSlidesPath($slidesPath) {
		$this->slidesPath = $slidesPath;
		return $this;
	}

	/**
	 * Get slidesPath
	 *
	 * @return string 
	 */
	public function getSlidesPath() {
		return $this->slidesPath;
	}

	/**
	 * Get speaker
	 * 
	 * @return User;
	 */
	public function getSpeaker() {
		return $this->speaker;
	}

	/**
	 * Set speaker
	 * @param User $speaker
	 */
	public function setSpeaker($speaker) {
		$this->speaker = $speaker;
	}

}
