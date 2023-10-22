<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 获取管理员信息
        $admin = auth()->user();
        // 判断管理员没有登录
        if (!$admin) {
            // 返回401，提示登录
            return response()->json(['code' => 401, 'msg' => '请先登录']);
        }

        return $next($request);
    }
}
