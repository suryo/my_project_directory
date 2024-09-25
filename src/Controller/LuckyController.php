<?php
// src/Controller/LuckyController.php
namespace App\Controller;

use App\Entity\Categories;
use App\Repository\CategoriesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

class LuckyController extends AbstractController
{
    #[Route('/number', name: 'number')]
    public function number(EntityManagerInterface $entityManager): Response
    {
        $number = random_int(0, 100);
        $page_title = "belajar";
        $repository = $entityManager->getRepository(Categories::class);
        $categories = $repository->findAll();
        return $this->render('home.html.twig', [
            'number'=> $number,
            'page_title'=> $page_title,
            'username' => "suryo",
            'categories' => $categories         
        ]);
    }
}