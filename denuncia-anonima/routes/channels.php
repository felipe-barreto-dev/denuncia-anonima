<?php

use App\Models\Denuncia;
use Illuminate\Support\Facades\Broadcast;

Broadcast::routes();

// Broadcast::channel('chat.{id_denuncia}', function ($user, $id_denuncia) {
//     $denuncia = Denuncia::find($id_denuncia);

//     if ($denuncia) {
//         \Log::info('Denúncia carregada com id usuário: ' . $denuncia->id_usuario . ' e id responsável: ' . $denuncia->id_responsavel);
//     } else {
//         \Log::info('Denúncia não encontrada com o ID: ' . $id_denuncia);
//         return false;
//     }

//     // Verifique se o usuário tem o perfil de admin
//     if ($user->perfil && $user->perfil->nome === 'admin') {
//         \Log::info('Acesso permitido para o admin: ' . $user->id);
//         return true;
//     }

//     // Verifique se o usuário autenticado é o criador ou responsável pela denúncia
//     if ($denuncia->id_usuario === $user->id || $denuncia->id_responsavel === $user->id) {
//         \Log::info('Acesso permitido ao canal chat para o usuário: ' . $user->id . ' com ID de denúncia: ' . $id_denuncia);
//         return true;
//     }

//     \Log::info('Acesso negado ao canal chat para o usuário: ' . $user->id . ' com ID de denúncia: ' . $id_denuncia);
//     return false;
// });

Broadcast::channel('chat.{denunciaId}', function ($user, $denunciaId) {
    \Log::info('Verificando acesso ao canal', ['user_id' => $user->id, 'denunciaId' => $denunciaId]);
    return true; // Lógica de autorização
});



