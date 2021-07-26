<?php

namespace App\Helper;

class HelperComponent
{

    public static function SideBar()
    {
        return [
            [
                "heading" => "Management",
                "menu" => [
                    "title" => 'User Management',
                    "icon" => "icon-rocket",
                    "color_code" => "",
                    "can" => "",
                    "v-can" => "",
                    "sub_menu" => [
                        setSubMenu(
                            null,
                            "Users",
                            "supervisor_account",
                            null,
                            null,
                            "/users",
                        ),
                        setSubMenu(
                            null,
                            "Roles",
                            null,
                            null,
                            null,
                            "/roles",
                        ),
                    ]
                ]

            ],
        ];
        }
    }

