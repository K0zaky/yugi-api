<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/cartas' => [[['_route' => 'cartas', '_controller' => 'App\\Controller\\CartasController::cartas'], null, ['GET' => 0], null, false, false, null]],
        '/monstruos' => [[['_route' => 'monstruos', '_controller' => 'App\\Controller\\MonstruosController::monstruos'], null, ['GET' => 0], null, false, false, null]],
        '/magicas' => [[['_route' => 'magicas', '_controller' => 'App\\Controller\\MagicasController::magicas'], null, ['GET' => 0], null, false, false, null]],
        '/trampas' => [[['_route' => 'trampas', '_controller' => 'App\\Controller\\TrampasController::trampas'], null, ['GET' => 0], null, false, false, null]],
        '/decks' => [[['_route' => 'decks', '_controller' => 'App\\Controller\\DecksController::decks'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/usuarios' => [[['_route' => 'usuarios', '_controller' => 'App\\Controller\\UsuariosController::usuarios'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:102)'
                            .'|router(*:116)'
                            .'|exception(?'
                                .'|(*:136)'
                                .'|\\.css(*:149)'
                            .')'
                        .')'
                        .'|(*:159)'
                    .')'
                .')'
                .'|/deck/([^/]++)(?'
                    .'|(*:186)'
                    .'|(*:194)'
                    .'|/(?'
                        .'|carta(?'
                            .'|s(*:215)'
                            .'|/([^/]++)(*:232)'
                        .')'
                        .'|anyadir(*:248)'
                    .')'
                .')'
                .'|/carta/([^/]++)(*:273)'
                .'|/m(?'
                    .'|onstruo/([^/]++)(*:302)'
                    .'|agica/([^/]++)(*:324)'
                .')'
                .'|/trampa/([^/]++)(*:349)'
                .'|/usuario/([^/]++)(?'
                    .'|/decks(*:383)'
                    .'|(*:391)'
                .')'
            .')/?$}sD',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        186 => [[['_route' => 'add_carta_to_deck', '_controller' => 'App\\Controller\\DecksController::addCartaToDeck'], ['deck_id'], ['PUT' => 0], null, false, true, null]],
        194 => [[['_route' => 'deckById', '_controller' => 'App\\Controller\\DecksController::deckById'], ['id'], ['GET' => 0, 'DELETE' => 1], null, false, true, null]],
        215 => [[['_route' => 'verCartasEnDecks', '_controller' => 'App\\Controller\\DecksController::cartaEnDeck'], ['deck_id'], ['GET' => 0], null, false, false, null]],
        232 => [[['_route' => 'borrarCartasEnDecks', '_controller' => 'App\\Controller\\DecksController::removeCartaFromDeck'], ['deck_id', 'carta_id'], ['DELETE' => 0], null, false, true, null]],
        248 => [[['_route' => 'anyadirCartasEnDecks', '_controller' => 'App\\Controller\\DecksController::addCartaToDeck'], ['deck_id'], ['PUT' => 0], null, false, false, null]],
        273 => [[['_route' => 'cartaById', '_controller' => 'App\\Controller\\CartasController::cartaById'], ['id'], ['GET' => 0], null, false, true, null]],
        302 => [[['_route' => 'monstruoById', '_controller' => 'App\\Controller\\MonstruosController::monstruoById'], ['id'], ['GET' => 0], null, false, true, null]],
        324 => [[['_route' => 'magicaById', '_controller' => 'App\\Controller\\MagicasController::magicaById'], ['id'], ['GET' => 0], null, false, true, null]],
        349 => [[['_route' => 'trampaById', '_controller' => 'App\\Controller\\TrampasController::trampaById'], ['id'], ['GET' => 0], null, false, true, null]],
        383 => [[['_route' => 'decksByUser', '_controller' => 'App\\Controller\\DecksController::decksByUser'], ['id'], ['GET' => 0], null, false, false, null]],
        391 => [
            [['_route' => 'usuarioById', '_controller' => 'App\\Controller\\UsuariosController::usuarioById'], ['id'], ['GET' => 0, 'PUT' => 1, 'DELETE' => 2], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
