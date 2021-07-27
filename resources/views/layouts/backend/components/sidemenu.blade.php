
@php
$sidebar=sideBarMenu();
// dd($sidebar);
@endphp
<nav class="iq-sidebar-menu">


<ul id="iq-sidebar-toggle" class="side-menu">
    @foreach ($sidebar as $menu)
     @if(!empty($menu['heading']))
    <li class="px-3 pt-3 pb-2 ">
        <span class="text-uppercase small font-weight-bold">{{$menu['heading']}}</span>
    </li>

     @endif
    @if(!empty($menu['menu']))
     <li class=" sidebar-layout">
        {{-- <a href="javascript:void(0)" class="has-arrow arrow-c"><i class="{{$menu['menu']['icon']}}"></i><span>{{$menu['menu']['title']}}</span></a> --}}
        <a href="#app{{$loop->iteration}}" class="collapsed svg-icon" data-toggle="collapse" aria-expanded="false">
            <i class="">
                <span class="material-icons">
                    {{$menu['menu']['icon']}}
                 </span>
            </i>
            <span class="">{{$menu['menu']['title']}}</span>

            <svg xmlns="http://www.w3.org/2000/svg" class="svg-icon iq-arrow-right arrow-active" width="15" fill="none" viewbox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
        </a>
        <ul  id="app{{$loop->iteration}}" class="submenu collapse" data-parent="#iq-sidebar-toggle">
            @foreach ($menu['menu']['sub_menu'] as $item)
   		<li class=" sidebar-layout">
                   <router-link  to="{{$item['v-route']}}" >
                    <span class="material-icons">
                           {{$item['icon']}}
                        </span>
                        <span class="ml-2">{{$item['title']}}</span>
                   </router-link></li>
                </li>
            @endforeach

        </ul>
     </li>
     @endif
     @if(!empty($menu['single_link']))
     <li class=" sidebar-layout">
        <router-link  to="{{$menu['single_link']['v-route']}}" ><i class="{{$menu['single_link']['icon']}}"></i><span>{{$menu['single_link']['title']}}</span></router-link>
     </li>
     @endif
     @endforeach
</ul>
</nav>
