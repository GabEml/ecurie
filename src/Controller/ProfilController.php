<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="app_profil")
     */
    public function index(Request $request, UserRepository $userRepository): Response
    {    
        $form = $request->request->get('form');
        // var_dump($form['password'], $form['email']);
        $user = $userRepository->findOneBy(['email' => $form['email']]);
        if($form['password'] != $user->getPassword()){
            return $this->render('homePage/error.html.twig', [
                'error' => "Le mot de passe ne correspond pas",
            ]);
        }else{
            return $this->render('profil/index.html.twig', [
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
