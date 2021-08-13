<?php

namespace App\Helper;

class HelperComponent
{

    public static function SideBar()
    {
        return [
            // [
            //     "heading" => "Management",
            //     "menu" => [
            //         "title" => 'User Management',
            //         "icon" => "people",
            //         "color_code" => "",
            //         "can" => "",
            //         "v-can" => "",
            //         "sub_menu" => [
            //             setSubMenu(
            //                 null,
            //                 "Users",
            //                 "supervisor_account",
            //                 null,
            //                 null,
            //                 "/users",
            //             ),
            //             setSubMenu(
            //                 null,
            //                 "Roles",
            //                 null,
            //                 null,
            //                 null,
            //                 "/roles",
            //             ),
            //         ]
            //     ]

            // ],
            
            [
                "heading" => "Content",
                "menu" => [
                    "title" => 'App Management',
                    "icon" => "mobile_friendly",
                    "color_code" => "",
                    "can" => "",
                    "v-can" => "",
                    "sub_menu" => [
                        setSubMenu(
                            null,
                            "articles",
                            "article",
                            null,
                            null,
                            "/articles",
                        ),
                        setSubMenu(
                            null,
                            "blogs",
                            "feed",
                            null,
                            null,
                            "/blogs",
                        ),

                    ]
                ]

            ],

        ];
        }
    }

