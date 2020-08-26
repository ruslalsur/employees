<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Модель пользователя
 *
 * @package App
 * @property string last_name
 * @property string first_name
 * @property string middle_name
 * @property string avatar
 * @property string is_admin
 */

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'last_name', 'first_name', 'middle_name', 'is_admin', 'avatar', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Правила валидации
     *
     * @return array
     */
    public static function rules() {
        return [
            'last_name' => 'string|min:5|max:50',
            'first_name' => 'required|string|min:5|max:50',
            'middle_name' => 'string|min:5|max:50',
            'email' => "required|email",
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required|min:3',
            'is_admin' => 'sometimes|in:on'
        ];
    }

    public static function attributeNames() {
        return [
            'last_name' => 'Фамилия',
            'first_name' => 'Имя',
            'middle_name' => 'Отчество',
            'email' => '@email',
            'password' => 'Пароль',
            'password_confirmation' => 'Повтор пароля',
            'is_admin' => 'Администратор',
            'avatar' => 'Аватар'
        ];
    }
}
