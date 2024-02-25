<?php

namespace App\Controller;


use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityNotFoundException;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ArticleController extends AbstractController
{
    #[Route('/', name: 'app_article_index',methods:['GET'])]
    public function index(ArticleRepository $articleRepository, PaginatorInterface $paginatorInterface,Request $request): Response
    {
        try{
            $data = $articleRepository->findPublished();
        }catch(EntityNotFoundException $ex){
            echo "Exception Found - " . $ex->getMessage() . "<br />";  // rempace par addflassh
        }
        return $this->render('pages/article/index.html.twig',['articles'=>$paginatorInterface->paginate($data,$request->query->getInt('page',1),
        9)]);
    }
}
