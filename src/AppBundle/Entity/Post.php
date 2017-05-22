<?php

namespace AppBundle\Entity; 

use Doctrine\ORM\Mapping as ORM; 

/**
 * Class Post
 * @package AppBundle\Entity
 * 
 * @ORM\Entity
 * @ORM\Table(name="posts")
 *
 * @author Heide Goethals
 */
class Post {
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id; 
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $persoonId; 

    /**
     * @ORM\Column(type="text")
     */
    protected $tekst; 

    /**
     * @ORM\Column(type="datetime")
     */
    protected $tijd;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $eventId; 
            
    function __construct($persoon, $tekst) {
        $this->persoon = $persoon;
        $this->tekst = $tekst;
        $this->tijd = new DateTime();
    }
    
    public static function createExisting($id, $persoon, $tekst, $tijd) {
            $post = new Post($persoon, $tekst);
            $post->setId($id);
            $post->setTijd($tijd);
        return $post;
    }
    
    function getId() {
        return $this->id;
    }

    function getPersoonId() {
        return $this->persoonId;
    }

    function getTekst() {
        return $this->tekst;
    }

    function getTijd() {
        return $this->tijd;
    }
    
    function getEventId() {
        return $this->eventId;
    }
        
    private function setId($id) {
        $this->id = $id;
    }

    private function setPersoonId($persoonId) {
        $this->persoonId = $persoonId;
    }

    private function setTekst($tekst) {
        $this->tekst = $tekst;
    }

    private function setTijd($tijd) {
        $this->tijd = $tijd;
    }
    
    private function setEventId($eventId) {
        $this->eventId = $eventId;
    }

}



