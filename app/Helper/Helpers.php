<?php

use App\Helpers\HelperComponent;


function iconsImg($filename, $type)
{

    if (!empty($filename)) {
        if ($type == "png")
            return asset("/admin/icons/png/" . $filename);
        if ($type == "svg")
            return asset("/admin/icons/svg/" . $filename);
    }

    return asset("/admin/icons/default.png");
}

function SingleImgUpload($request, $path)
{
    if ($request->hasfile('thumbnail')) {
        $name = Str::slug(!empty($request->name) ? $request->name : config('app.name'), '-')  . "-" . time() . '.' . $request->thumbnail->extension();
        $request->thumbnail->move(public_path($path), $name);
    } else
        $name = "";
    return $name;
}

function sideBarMenu()
{
    return HelperComponent::sideBar();
}
function setSingleLink($title, $icon, $can = null, $v_can = null, $url = null, $v_route = null)
{
    return [
        "title" => $title,
        "icon" => $icon,
        "can" => $can,
        "v-can" => $v_can,
        "url" => $url,
        "v-route" => $v_route,
    ];
}
function setSubMenu($url = null, $title, $icon = null, $v_can = null, $can = null, $v_route = null)
{
    return [
        "url" => $url,
        "title" => $title,
        "icon" => $icon,
        "can" => $can,
        "v-can" => $v_can,
        "v-route" => $v_route,
    ];
}
