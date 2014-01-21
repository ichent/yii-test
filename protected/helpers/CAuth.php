<?php
/**
 * Вспомогательный класс для работы с
 * авторизационными данными пользователя
 */

class CAuth
{

    public static function isCurrentUserAuthorized() {
        return isset(Yii::app()->session['user']);
    }

    public static function isCurrentUserAdmin() {
        return self::isCurrentUserAuthorized() && Yii::app()->session['user']['is_admin'];
    }

    public static function getIdOfCurrentUser() {
        if (self::isCurrentUserAuthorized()) {
            return Yii::app()->session['user']['id'];
        } else {
            return 0;
        }
    }

    public static function getUserAuthorizationInfo() {
        return array(
            'isUserAuthorized' => self::isCurrentUserAuthorized(),
            'isUserAdmin' => self::isCurrentUserAdmin()
        );
    }
} 