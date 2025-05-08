<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = auth()->user()->role;
        $routeName = $request->route()->getName();

        $allowedRoutes = match ($role) {
            UserRole::admin => ['admin.dashboard', 'admin.*'],
            UserRole::teacher => ['teacher.dashboard', 'teacher.*'],
            UserRole::recruiter => ['recruiter.dashboard', 'recruiter.*'],
            UserRole::examsetter => ['examsetter.dashboard', 'examsetter.*'],
            default => [],
        };

        foreach ($allowedRoutes as $allowed) {
            if (str($routeName)->is($allowed)) {
                return $next($request); // Allow access to allowed route
            }
        }

        // Redirect to dashboard if trying to access unauthorized route
        return match ($role) {
            UserRole::admin => redirect()->route('admin.dashboard'),
            UserRole::teacher => redirect()->route('teacher.dashboard'),
            UserRole::recruiter => redirect()->route('recruiter.dashboard'),
            UserRole::examsetter => redirect()->route('examsetter.dashboard'),
            default => abort(403),
        };
    }

}
