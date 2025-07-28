<?php
namespace App\Controllers;

#[Controller('index')]
class HelloWorldController extends WebController
{
    public function __construct(private MainProvider $provider) { }

    #[Get]
    public function index(): Response
    {
        return view('pages/hello-page.twig', $data);
    }
}