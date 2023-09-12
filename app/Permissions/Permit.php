<?php

namespace App\Permissions;

class Permit { 

    public const CAN_CREATE_ADMIN = 'create_admin';
    public const CAN_VIEW_ADMIN = 'view_admin';
    public const CAN_STORE_ADMIN = 'store_admin';
    public const CAN_EDIT_ADMIN = 'edit_admin';
    public const CAN_DELETE_ADMIN = 'delete_admin';

    public const CAN_CREATE_USER = 'create_user';
    public const CAN_VIEW_USER = 'view_user';
    public const CAN_STORE_USER = 'store_user';
    public const CAN_EDIT_USER = 'edit_user';
    public const CAN_DELETE_USER = 'delete_user';

    public const CAN_UPLOAD_PRODUCT = 'upload_product';
    public const CAN_VIEW_PRODUCT = 'view_product';
    public const CAN_STORE_PRODUCT = 'store_product';
    public const CAN_EDIT_PRODUCT = 'edit_product';
    public const CAN_DELETE_PRODUCT = 'delete_product';

    public const CAN_VIEW_REVIEW = 'view_review';
    public const CAN_UPLOAD_REVIEW = 'upload_review';
    public const CAN_DELETE_REVIEW = 'delete_review';
    public const CAN_STORE_REVIEW = 'store_review';

}