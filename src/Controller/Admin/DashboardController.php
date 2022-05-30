<?php

namespace App\Controller\Admin;

use App\Entity\Disponibility;
use App\Entity\Healthy;
use App\Entity\PlanningBox;
use App\Entity\PlanningHealthy;
use App\Entity\Role;
use App\Entity\User;
use App\Entity\Box;
use App\Entity\Horse;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Ecurie');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Pannel Admin');

        yield MenuItem::linkToCrud('user', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Role utlisateur', 'fa fa-user', Role::class);
        yield MenuItem::linkToCrud('cheval', 'fa fa-comment', Horse::class);
        yield MenuItem::linkToCrud('installation', 'fa fa-user', Box::class);
        yield MenuItem::linkToCrud('planning pro', 'fa fa-comment', Disponibility::class);
        yield MenuItem::linkToCrud('planning installation', 'fa fa-user', PlanningBox::class);
        yield MenuItem::linkToCrud('Rendez-vous', 'fa fa-user', PlanningHealthy::class);
        yield MenuItem::linkToCrud('Carnet de Sante', 'fa fa-comment', Healthy::class);
    }
}
