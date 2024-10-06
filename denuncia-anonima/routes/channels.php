<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('chat.{id_denuncia}', function ($user, $id_denuncia) {
    // Aqui, você pode adicionar lógica para verificar se o usuário pode acessar o canal
    return auth()->check(); // Certifique-se de que o usuário esteja autenticado
});

