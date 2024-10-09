<div id="sidebar">
    <ul class="navbar-nav me-auto">
        <li class="nav-item p-3 {{ request()->is('admin/posts*') ? 'active' : ''}}">
            <a class="nav-link text-white" href="{{route('admin.posts.index')}}">Posts</a>
        </li>
        <li class="nav-item p-3 {{ request()->is('admin/categories*') ? 'active' : ''}}">
            <a class="nav-link text-white" href="{{route('admin.categories.index')}}">Categoria</a>
        </li>
    </ul>
</div>