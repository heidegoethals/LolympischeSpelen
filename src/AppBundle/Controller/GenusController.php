<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method; 
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response; 
use Symfony\Bundle\FrameworkBundle\Controller\Controller; 
use Symfony\Component\HttpFoundation\JsonResponse; 
//use PDO;


/**
 * @author heide.goethals
 */
class GenusController extends Controller {
   
    /**
     * @Route("/home/{naam}")
     * @return Response
     */
    public function showAction($naam) {
        $posts = $this->getDoctrine()->getRepository('AppBundle:Post')->findAll(); 
        //dump($posts); 
        
        return $this->render('home/show.html.twig', [
                'name'=> $naam,
                'posts'=>$posts,
                ]); 
    }
    /**
     * @Route("/home/{genusName}/notes", name="show_notes")
     * @Method("GET")
     */
    public function getNotesAction(){
        $posts = $this->getDoctrine()->getRepository('AppBundle:Post')->findBy(
                [
                    'eventId' => 1
                ]);
        
        $postsArray = array(); 
        foreach ($posts as $post){
            $nextPost = ['id' => $post->getId() , 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => $post->getTekst(), 'date' => 'Dec. 10, 2015'];
            array_push($postsArray, $nextPost); 
        }
            dump($postsArray); 
            
            
               /* $notes = [
            ['id' => 1, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'Octopus asked me a riddle, outsmarted me', 'date' => 'Dec. 10, 2015'],
            ['id' => 2, 'username' => 'AquaWeaver', 'avatarUri' => '/images/ryan.jpeg', 'note' => 'I counted 8 legs... as they wrapped around me', 'date' => 'Dec. 1, 2015'],
            ['id' => 3, 'username' => 'AquaPelham', 'avatarUri' => '/images/leanna.jpeg', 'note' => 'Inked!', 'date' => 'Aug. 20, 2015'],
               
        ];*/
                
                $data = [
                  'notes' => $postsArray,
                ];
                
                return new JsonResponse($data); 
    }

}
