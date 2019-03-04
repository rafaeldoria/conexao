<div class="col-md-2">
    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">Menu</li>
                @foreach ($menus as $menu)
                <li>
                    <a href="{{route($menu->route)}}">
                        <i class="{{$menu->class}}"></i><span>{{$menu->title}}</span>
                    </a>
                </li>
                @endforeach
            </ul>
        </section>
    </aside>
</div>