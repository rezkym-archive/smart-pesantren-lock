<?php

namespace App\Classes\Permission;

class RoleHasPermission
{   
    /**
     * AdminPermission function
     * 
     * @param 
     * @return array
     */
    public static function AdminPermission()
    {
        return
        [
            'admin' =>
            [
                'manage_kesantrian',
                'manage_halaqoh',
            ],
        ];
    }

    /**
     * TeacherPermission function
     * 
     * @param
     * @return array
     */
    public static function TeacherPermission()
    {
        return
        [
            'teacher' =>
            [
                'halaqoh_teacher',
                'attendance_teacher',
            ],
        ];
    }

    /**
     * BinsisPermission function
     * 
     * @param
     * @return array
     */
    public static function BinsisPermission()
    {
        return
        [
            'binsis' =>
            [
                //
            ],
        ];
    }

    /**
     * StudentPermission function
     * 
     * @param
     * @return array
     */
    public static function StudentPermission()
    {
        return
        [
            'student' =>
            [
                'mutabaah_student',
            ],
        ];
    }
}
