<?php
namespace ConstantNull\Eloquent\Support;

use Auth;

trait ChangedByUser
{
    /**
     * Trait initialization
     *
     * @return null
     */
    public static function bootUpdatedByUser()
    {
        static::saving(function($model) {
            if (Auth::guest()) {
                $userId = 0;
            } else {
                $userId = Auth::user()->{static::getUserIdField()};
            }

            $model->{static::getUpdatedByColumn()} = $userId;
        });
    }

    /**
     * get name of the user's id field
     *
     * @return string name of id field
     */
    public static function getUserIdField()
    {
        return defined('static::USER_ID') ? static::USER_ID : 'id';
    }

    /**
     * get name of the database column that holds id if used that changed record
     *
     * @return string name of database column
     */
    public static function getUpdatedByColumn()
    {
        return defined('static::CHANGED_BY') ? static::USER_ID : 'changed_by';
    }
}
