<?php

namespace App\Helpers;

class HelperComponent
{

    public static function SideBar()
    {
        return [
            [
                "heading" => "Dashboard",
                "menu" => [
                    "title" => 'Dashboards',
                    "icon" => "icon-rocket",
                    "color_code" => "",
                    "can" => "",
                    "v-can" => "",
                    "sub_menu" => [
                        setSubMenu(
                            null,
                            "Dashboard",
                            null,
                            null,
                            null,
                            "/dashboard",
                        ),
                        setSubMenu(
                            null,
                            "Seller Dashboard",
                            null,
                            null,
                            null,
                            "/seller/dashboard",
                        ),
                    ]
                ]

            ],
        ];
        }
    }

