<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureCatalogManager
{
    public function handle(Request $request, Closure $next): Response
    {
        $emailUsuario = mb_strtolower((string) $request->user()?->email);
        $emailsPermitidos = array_map(
            static fn (string $email): string => mb_strtolower(trim($email)),
            config('catalog.admin_emails', [])
        );

        abort_unless(
            $emailUsuario !== '' && in_array($emailUsuario, $emailsPermitidos, true),
            403,
            'Você não tem permissão para acessar a área de gestão do catálogo.'
        );

        return $next($request);
    }
}
