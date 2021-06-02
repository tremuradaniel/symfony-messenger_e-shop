<?php

namespace App\Controller;

use App\Message\Command\SignUpSMS;
use App\Message\Query\SearchQuery;
use App\Message\Command\CreateOrder;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Transport\AmqpExt\AmqpStamp;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
        $attributes = [];
        $routingKey = ['sms1', 'sms2'];
        $routingKey = $routingKey[random_int(0,1)];
        $this->messageBus->dispatch(new SignUpSms($phoneNumber), [new AmqpStamp($routingKey, AMQP_NOPARAM, $attributes)]);

        return new Response(sprintf('Your phone number %s succesfully signed up to SMS newsletter!',$phoneNumber));
    }

    /**
     * @Route("/order", name="order")
     */
    public function order(): Response
    {
        $productID = '123';
        $productName = 'product name';
        $productAmount = 2;
        // save the order in the database

        $this->messageBus->dispatch(new CreateOrder($productID, $productAmount));
        return new Response(sprintf('Your successfully ordered your product!', $productName));
    }
}
