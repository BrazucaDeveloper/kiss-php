<?php
namespace App\Core;

class MainController extends WebController
{
    public function __construct(private MainProvider $provider) { }

    #[Route(path: '/', name: 'hello_world')]
    public function index(): Response
    {
        $data = $this->provider->getData();
        return view('hello/index', $data);
    }
}