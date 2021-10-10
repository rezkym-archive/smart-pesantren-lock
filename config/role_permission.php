<?php
use App\Classes\Permission\RoleHasPermission;

return
[
    'role_has_permission' =>
    [
        RoleHasPermission::AdminPermission(),
        RoleHasPermission::TeacherPermission(),
        //RoleHasPermission::BinsisPermission(),
        RoleHasPermission::StudentPermission(),
    ],
];