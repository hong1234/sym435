<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/DefaultController.php',
        ]);
    }

     /**
     * @Route("/list", name="list")
     */
    public function list()
    {
        return $this->render('default/list.html.twig', [
            //'number' => $number,
        ]);
    }

    /**
     * @Route("/session", name="session")
     */
    public function session(SessionInterface $session)
    {
        // stores an attribute for reuse during a later user request
        $session->set('foo', 'HELLO2 session !');

        // gets an attribute by name
        $foo = $session->get('foo');

        return $this->json([
            'message' => $foo,
            //'path' => 'src/Controller/DefaultController.php',
        ]);
    }

    /**
     * @Route("/session2", name="session2")
     */
    public function session2(SessionInterface $session)
    {
        // stores an attribute for reuse during a later user request
        //$session->set('foo', 'HELLO session !');

        // gets an attribute by name
        $foo = $session->get('foo');

        return $this->json([
            'message' => $foo,
            //'path' => 'src/Controller/DefaultController.php',
        ]);
    }

    /**
     * @Route("/user", name="user")
     */
    public function user()
    {
        $username = 'No One';
        if($user = $this->getUser()){
            $username = $user->getEmail();
        }

        //return $this->render('brand_new/index.html.twig', [
        //    'username' => $username,
        //    'controller_name' => 'BrandNewController',
        //]);
        return $this->json([
            'user' => $username,
            //'path' => 'src/Controller/DefaultController.php',
        ]);
    }

    /**
     * @Route("/table", name="table")
     */
    public function table()
    {
        $username = 'No One';
        if($user = $this->getUser()){
            $username = $user->getEmail();
        }

        return $this->json([
            'table' => $username,
            'path' => 'src/Controller/DefaultController.php',
        ]);
    }
}

    
