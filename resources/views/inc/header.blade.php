<div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom header">
      <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
        <span class="fs-4">Paste</span>
      </a>

      <nav class="d-inline-flex mt-1 mt-md-0 ms-md-auto">
        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('home') }}">Главная страница</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('paste') }}">Паста</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('contact-data') }}">Хранилище</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('user.private') }}">Аккаунт</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('user.registration') }}">Регистрация</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="{{ route('user.logout') }}">Выйти</a>
      </nav>
</div>