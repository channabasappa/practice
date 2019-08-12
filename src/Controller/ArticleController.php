<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
/**
 * Description of ArticleController
 *
 * @author Administrator
 */
class ArticleController extends AbstractController {
    /**
     * @Route("/" ,name="app_homepage")
     */
    public function homepage(){
        //return new Response('Woo this is my first page');
        //return new Response('This is my first page');
        return $this->render('articls/homepage.html.twig');
    }

    /**
     * @Route("/news/{newshowpage}", name="app_showarticle" )
     */
    public function show($newshowpage){
        /*return new Response(sprintf(
            'Futer page to show new page : %s',$newshowpage));*/
        $comments = [
            'I ate a normal rock once. It did NOT taste like bacon!',
            'Woohoo! I\'m going on an all-asteroid diet!',
            'I like bacon too! Buy some from my site! bakinsomebacon.com',
        ];
        //dump($newshowpage,$this);
        return $this->render('articls/show.html.twig',[
            'title' => ucwords(str_replace('-','',$newshowpage)),
            'slug' => $newshowpage,
            'comments' => $comments
        ]);

    }

    /**
     * @Route("/news/{slug}/heart", name="app_article_heart",methods={"POST"})
     */
    public function getheartLikeCounts($slug){
        return new JsonResponse(['heart'=> rand(5,100)]);
    }
}
