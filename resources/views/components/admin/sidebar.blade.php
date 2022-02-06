<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.news.*')) active @endif" href="http://laravel.gb/admin/news">
            <span data-feather="file"></span>
            Новости
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.category.*')) active @endif" href="http://laravel.gb/admin/category">
            <span data-feather="shopping-cart"></span>
            Категории
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.parse.*')) active @endif" href="http://laravel.gb/admin/parse">
            <span data-feather="shopping-cart"></span>
            Парсинг
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link @if(request()->routeIs('admin.users.*')) active @endif" href="http://laravel.gb/admin/users">
            <span data-feather="shopping-cart"></span>
            Пользователи
          </a>
        </li>
      </ul>
    </div>
  </nav>