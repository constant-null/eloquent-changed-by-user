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
    public static function bootChangedByUser()
    {
        static::saving(function($model) {
            if (Auth::guest()) {
                $userId = 0;
            } else {
                $userId = Auth::user()->getAuthIdentifier();
            }

            $model->{static::getUpdatedByColumn()} = $userId;
        });
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
