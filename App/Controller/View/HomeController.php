<?php

declare(strict_types=1);

namespace App\Controller\View;

use App\Controller\Http\Request;
use App\Controller\Http\Response;
use App\Utils\View;

class HomeController
{
    /**
     * Método responsável por retornar o conteúdo da view home
     * @return string
     */
    public function index(Request $request): Response
    {
        //Pegando o conteudo do header
        $header = View::render('header');

        //Pegando o conteudo do footer
        $footer = View::render('footer');

        //retorna o conteúdo da view home
        return new Response(200, View::render('home', [
            'header' => $header,
            'footer' => $footer,
        ]));
    }
}