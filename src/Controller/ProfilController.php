<?php

namespace App\Controller;

use App\Repository\UserRepository;
use App\Repository\HorseRepository;
use App\Repository\HealthyRepository;
use App\Repository\PlanningHealthyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="app_profil")
     */
    public function index(
        Request $request,
        UserRepository $userRepository,
        HorseRepository $horseRepository, 
        HealthyRepository $healthyRepository,
        PlanningHealthyRepository $planningHealthyRepository): Response
    {    
        $form = $request->request->get('form');
        $user = $userRepository->findOneBy(['email' => $form['email']]);
        $horse = $horseRepository->findOneBy(['user' => $user->getId()]);
        $healthy = $healthyRepository->findOneBy(['user' => $user->getId()]);
        $planningHealthy = $healthyRepository->findOneBy(['user' => $user->getId()]);


        if($form['password'] != $user->getPassword()){
            return $this->render('homePage/error.html.twig', [
                'error' => "Le mot de passe ne correspond pas",
            ]);
        }else{
            return $this->render('profil/index.html.twig', [
                'healthy' => $healthy,
                'horse' => $horse,
                'user' => $user,
            ]);
        }
    }

        /**
     * @Route("/profil/calendar", name="app_profil_calendar")
     */
    public function calendar(Request $request, UserRepository $userRepository): Response
    {    
        return $this->render('profil/calendar.html.twig', []);
    }
}
