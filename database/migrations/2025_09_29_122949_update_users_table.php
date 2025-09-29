<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\UserRole;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Добавляем role_id для всех существующих пользователей
        // Сначала убедимся, что роли существуют
        $roles = UserRole::all()->keyBy('name'); // Получаем роли по имени

        User::all()->each(function($user) use ($roles) {
            if ($user->role === 'admin' && isset($roles['admin'])) {
                $user->role_id = $roles['admin']->id;
            } elseif ($user->role === 'company_owner' && isset($roles['company_owner'])) {
                $user->role_id = $roles['company_owner']->id;
            } elseif ($user->role === 'customer' && isset($roles['customer'])) {
                $user->role_id = $roles['customer']->id;
            }
            $user->save();
        });

        // 2. Удаляем старое текстовое поле role
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role');
        });
    }

    public function down(): void
    {
        // Восстановление поля role
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->nullable();
        });

        // Можно попробовать обратно заполнить role по role_id, если нужно
    }
};
