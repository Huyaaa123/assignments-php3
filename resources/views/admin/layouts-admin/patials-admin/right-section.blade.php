<div class="nav">
    <button id="menu-btn">
        <span class="material-icons-sharp">
            menu
        </span>
    </button>
    {{-- <div class="dark-mode">
        <span class="material-icons-sharp active">
            light_mode
        </span>
        <span class="material-icons-sharp">
            dark_mode
        </span>
    </div> --}}

    <div class="profile">
        <div class="info">
            <p>Hey, <b>{{ Auth::user()->name }}</b></p>
            <small class="text-muted">Admin</small>
        </div>
        <div class="profile-photo">
            <img src="https://picsum.photos/200?random={{ Auth::user()->id }}" alt="Profile Photo">
        </div>
    </div>


</div>
<!-- End of Nav -->

<div class="user-profile">
    <div class="logo">
        <img src="https://static.vnncdn.net/v1/logo/logoVietnamNet.svg">
        <h2>Vietnam<span class="danger">net</span></h2>
        <p>Trang tin tức điện tử Việt Nam</p>
    </div>
</div>

<div class="reminders">
    <div class="header">
        <h2>Lời nhắc</h2>
        <span class="material-icons-sharp">
            notifications_none
        </span>
    </div>

    <div class="notification">
        <div class="icon">
            <span class="material-icons-sharp">
                volume_up
            </span>
        </div>
        <div class="content">
            <div class="info">
                <h3>Workshop</h3>
                <small class="text_muted">
                    08:00 AM - 12:00 PM
                </small>
            </div>
            <span class="material-icons-sharp">
                more_vert
            </span>
        </div>
    </div>

    <div class="notification deactive">
        <div class="icon">
            <span class="material-icons-sharp">
                edit
            </span>
        </div>
        <div class="content">
            <div class="info">
                <h3>Workshop</h3>
                <small class="text_muted">
                    08:00 AM - 12:00 PM
                </small>
            </div>
            <span class="material-icons-sharp">
                more_vert
            </span>
        </div>
    </div>

    <div class="notification add-reminder">
        <div>
            <span class="material-icons-sharp">
                add
            </span>
            <h3>Thêm lời nhắc</h3>
        </div>
    </div>

</div>
