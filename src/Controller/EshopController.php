<?php

namespace App\Controller;

use App\Message\Query\SearchQuery;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class EshopController extends AbstractController
{
    use HandleTrait;
    /**
     * @var MessageBusInterface
     */
    private $messageBus;
    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

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
//        $this->messageBus->dispatch(new SearchQuery($search));
        // the same as above
        $result = $this->handle(new SearchQuery($search));
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
