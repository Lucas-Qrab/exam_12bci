<?php

namespace App\Controller;

use App\Entity\Ville;
use App\Entity\Restaurant;
use App\Repository\VilleRepository;
use App\Repository\RestaurantRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RestaurantController extends AbstractController
{
    /** 
     * @Route("/index" , name="index")
     * @param VilleRepository $villerepository 
     * @return Response
    */
    
    public function index(VilleRepository $villerepository): Response
    {
        return $this->render('restaurant/index.html.twig', [
            'villes' =>  $villerepository->findAll(),
        ]);
    }

    /**
     * @route("/ville/{nom}" , name="ville")
     * @param VilleRepository $villerepository 
     * @return Response
    */

    public function ville(VilleRepository $villerepository , string $nom) : Response 
    {
        return $this->render('restaurant/ville.html.twig', [
            "ville" => $villerepository->findOneBy(["name"=> $nom])
        ]);
    }

    /**
     * @Route ("/restaurant/{nom}" , name="restaurant")
     * @param RestaurantRepository $restaurantrepository
     * @return Response
    */

    public function restaurant(RestaurantRepository $restaurantrepository , string $nom) : Response
    {
        return $this->render('restaurant/restaurant.html.twig', [
            "restaurant" => $restaurantrepository->findOneBy(['nom'=>$nom])
        ]);
    }

  
}
