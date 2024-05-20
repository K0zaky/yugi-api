<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format'], ['variable', '/', '\\d+', 'code'], ['text', '/_error']], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token'], ['text', '/_wdt']], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token'], ['text', '/_profiler']], [], []],
    'add_carta_to_deck' => [['deck_id'], ['_controller' => 'App\\Controller\\DecksController::addCartaToDeck'], [], [['variable', '/', '[^/]++', 'deck_id'], ['text', '/deck']], [], []],
    'cartas' => [[], ['_controller' => 'App\\Controller\\CartasController::cartas'], [], [['text', '/cartas']], [], []],
    'cartaById' => [['id'], ['_controller' => 'App\\Controller\\CartasController::cartaById'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/carta']], [], []],
    'monstruos' => [[], ['_controller' => 'App\\Controller\\MonstruosController::monstruos'], [], [['text', '/monstruos']], [], []],
    'monstruoById' => [['id'], ['_controller' => 'App\\Controller\\MonstruosController::monstruoById'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/monstruo']], [], []],
    'magicas' => [[], ['_controller' => 'App\\Controller\\MagicasController::magicas'], [], [['text', '/magicas']], [], []],
    'magicaById' => [['id'], ['_controller' => 'App\\Controller\\MagicasController::magicaById'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/magica']], [], []],
    'trampas' => [[], ['_controller' => 'App\\Controller\\TrampasController::trampas'], [], [['text', '/trampas']], [], []],
    'trampaById' => [['id'], ['_controller' => 'App\\Controller\\TrampasController::trampaById'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/trampa']], [], []],
    'decks' => [[], ['_controller' => 'App\\Controller\\DecksController::decks'], [], [['text', '/decks']], [], []],
    'deckById' => [['id'], ['_controller' => 'App\\Controller\\DecksController::deckById'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/deck']], [], []],
    'decksByUser' => [['id'], ['_controller' => 'App\\Controller\\DecksController::decksByUser'], [], [['text', '/decks'], ['variable', '/', '[^/]++', 'id'], ['text', '/usuario']], [], []],
    'verCartasEnDecks' => [['deck_id'], ['_controller' => 'App\\Controller\\DecksController::cartaEnDeck'], [], [['text', '/cartas'], ['variable', '/', '[^/]++', 'deck_id'], ['text', '/deck']], [], []],
    'anyadirCartasEnDecks' => [['deck_id'], ['_controller' => 'App\\Controller\\DecksController::addCartaToDeck'], [], [['variable', '/', '[^/]++', 'deck_id'], ['text', '/deck-anyadir']], [], []],
    'borrarCartasEnDecks' => [['deck_id', 'carta_id'], ['_controller' => 'App\\Controller\\DecksController::removeCartaFromDeck'], [], [['variable', '/', '[^/]++', 'carta_id'], ['text', '/carta'], ['variable', '/', '[^/]++', 'deck_id'], ['text', '/deck']], [], []],
    'usuarios' => [[], ['_controller' => 'App\\Controller\\UsuariosController::usuarios'], [], [['text', '/usuarios']], [], []],
    'usuarioById' => [['id'], ['_controller' => 'App\\Controller\\UsuariosController::usuarioById'], [], [['variable', '/', '[^/]++', 'id'], ['text', '/usuario']], [], []],
];
