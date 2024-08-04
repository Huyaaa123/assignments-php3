<div class="toggle">
    <a href="/">
        <div class="logo">
            <img src="https://static.vnncdn.net/v1/logo/logoVietnamNet.svg">
            <h2>Vietnam<span class="danger">net</span></h2>
        </div>
    </a>
    <div class="close" id="close-btn">
        <span class="material-icons-sharp">
            close
        </span>
    </div>
</div>

<div class="sidebar">
    <a href="{{ route('admin.dashboard') }}">
        <span class="material-icons-sharp">
            dashboard
        </span>
        <h3>Dashboard</h3>
    </a>
    <a href="{{ route('admin.users') }}">
        <span class="material-icons-sharp">
            person_outline
        </span>
        <h3>Người dùng </h3>
    </a>
    <a href="{{ route('admin.loaitin') }}">
        <span class="material-icons-sharp">
            receipt_long
        </span>
        <h3>Loại Tin</h3>
    </a>
    <a href="{{ route('admin.tin') }}">
        <span class="material-icons-sharp">
            receipt_long
        </span>
        <h3>Tin</h3>
    </a>
    <a href="{{ route('admin.comments') }}">
        <span class="material-icons-sharp">
            mail_outline
        </span>
        <h3>Bình luận</h3>
        <span class="message-count">1</span>
    </a>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <span class="material-icons-sharp">
            logout
        </span>
        <h3>
            {{ __('Logout') }}
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </h3>
    </a>
</div>
