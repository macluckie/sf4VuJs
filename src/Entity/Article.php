<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Assert\Length(
     *      min = 2,
     *      max = 50,    
     *      
     * )
     */
    private $title;


    /**
     * @ORM\Column(type="string", length=200, nullable=true)
     * @Assert\Length(
     *      min = 2,
     *      max = 200,    
     *      
     * )
     * 
     */
    private $subTitle;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Assert\Length(
     *      min = 2,
     *      max = 50,    
     *     
     * )
     */
    private $auteur;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="text", nullable=true)     
     */
    private $contenue;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     * 
     * 
     */
    private $picture;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(?string $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = new \DateTime();

        return $this;
    }

    public function getContenue(): ?string
    {
        return $this->contenue;
    }

    public function setContenue(?string $contenue): self
    {
        $this->contenue = $contenue;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of subTitle
     */
    public function getSubTitle()
    {
        return $this->subTitle;
    }

    /**
     * Set the value of subTitle
     *
     * @return  self
     */
    public function setSubTitle($subTitle)
    {
        $this->subTitle = $subTitle;

        return $this;
    }
}
