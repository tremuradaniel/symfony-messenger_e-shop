<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EshopController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('eshop/index.html.twig', [
            'controller_name' => 'EshopController',
        ]);
    }

    /**
     * @Route("/search", name="search")
     */
    public function search(): Response
    {
        $search = 'laptops';
        // call DB
        sleep(1);
        $result = ' result from DB';
        return new Response('Your search results for ' . $search . ': ' . $result);
    }

    /**
     * @Route("/signup-sms", name="signup-sms")
     */
    public function signUpSMS(): Response
    {
        $phoneNumber = '111 222 333';
        // connect to api of external sms service provider
        sleep(2);
        return new Response(sprintf('Your phone number %s successfully signed up for SMS newsletter!', $phoneNumber));
    }

    /**
     * @Route("/order", name="order")
     */
    public function order(): Response
    {
        $productID = '123';
        $productName = 'product name';
        $productAmount = 2;
        // saave the order in the database

        // send an email to client confirming the order (product name, amount, price, etc.)

        // update warehouse database to keep stock up to date in physical stores
        sleep(4);
        return new Response(sprintf('Your successfully ordered your product!', $productName));
    }
}
