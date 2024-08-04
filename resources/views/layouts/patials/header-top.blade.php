<style>
    .header__clock {
        color: #555;
        font-family: notosans-regular;
        font-size: 16px;
    }

    .thoitiet {
        display: flex;
        align-items: center;
    }

    .weather {
        display: flex;
        align-items: center;
    }

    .city,
    .temp {
        margin-right: 10px;
    }

    .search-box {
        width: fit-content;
        height: fit-content;
        position: relative;
    }

    .input-search {
        height: 20px;
        width: 20px;
        border-style: none;
        padding: 5px;
        font-size: 12px;
        letter-spacing: 1px;
        outline: none;
        border-radius: 12.5px;
        transition: all .5s ease-in-out;
        background-color: #98a7a8;
        padding-right: 20px;
        color: #000000;
    }

    .input-search::placeholder {
        color: rgba(69, 60, 60, 0.5);
        font-size: 12px;
        letter-spacing: 1px;
        font-weight: 100;
    }

    .btn-search {
        width: 25px;
        height: 25px;
        border-style: none;
        font-size: 10px;
        font-weight: bold;
        outline: none;
        cursor: pointer;
        border-radius: 50%;
        position: absolute;
        top: 3px;
        right: 0px;
        color: #ffffff;
        background-color: #98a7a8;
        pointer-events: painted;
    }

    .btn-search:focus~.input-search {
        width: 200px;
        border-radius: 0px;
        background-color: transparent;
        border-bottom: 1px solid rgba(255, 255, 255, .5);
        transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
    }

    .input-search:focus {
        width: 200px;
        border-radius: 0px;
        background-color: transparent;
        border-bottom: 1px solid rgba(255, 255, 255, .5);
        transition: all 500ms cubic-bezier(0, 0.110, 0.35, 2);
    }
    .dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-menu {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown:hover .dropdown-menu {
    display: block;
}
.avatar {
        width: 20px;
        height: 20px;
        border-radius: 50%;
    }
</style>
<div class="site-navbar-top">
    <div class="container">
        <div class="row ">
            <div class="col-2 align-items-center justify-content-center">
                <a href="/" title="vietnamnet" data-utm-source="#vnn_source=trangchu&amp;vnn_medium=logo-top"
                    previewlistener="true">
                    <img width="140" src="https://static.vnncdn.net/v1/logo/logoVietnamNet.svg" alt="VietNamNet">
                </a>
            </div>
            <div class="col-4 d-flex align-items-center justify-content-center">
                <div class="header__clock">
                    <span id="time-now"></span>
                </div> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20">
                    <line x1="10" y1="0" x2="10" y2="100%" stroke="#999" stroke-width="1"
                        stroke-dasharray="111" />
                </svg>
                <div class="header__clock">
                    <div class="thoitiet">
                        <div class="weather loading">
                            <div class="city"></div>
                            <div class="temp"></div>
                            <img class="may" src="https://openweathermap.org/img/wn/04n.png" alt="" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
            <div class="col-3 d-flex align-items-center justify-content-start">
                @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                    <div class="dropdown">
                        <a href="#" class="nav-link font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500" id="navbarDropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img id="avatar" class="avatar" src="" alt="Avatar">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                    @else
                    <a href="login">
                        <button class="vnn__login-btn" style="display: flex; background: none; border: none; cursor: pointer; gap: 5px; height:100%">
                            <span style="margin:auto; white-space: nowrap; color: #4d4d4d;">Đăng nhập</span>
                            <span style="margin: auto; transform: translateY(-2px); border: none">
                                <img src="https://static.vnncdn.net/icon-v1/dang-nhap.svg" alt="login vietnamnet" style="width: 20px;">
                            </span>
                        </button>
                    </a>
                        {{-- <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif --}}
                    @endauth
                </div>
            @endif
            
                <div class="search-box">
                    <button class="btn-search" id="searchButton"><i class="fas fa-search"></i></button>
                    <input type="text" class="input-search" id="searchInput" placeholder="Type to Search..." name="q" value="{{ $searchTerm ?? '' }}">
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Đợi cho DOM tải xong
    document.addEventListener('DOMContentLoaded', function() {
        var searchButton = document.getElementById('searchButton');
        var searchInput = document.getElementById('searchInput');

        searchInput.addEventListener('keypress', function(event) {
            if (event.key === 'Enter') {
                performSearch();
            }
        });

        searchButton.addEventListener('click', function() {
            performSearch();
        });

        function performSearch() {
            var searchText = searchInput.value;

            // Kiểm tra nếu ô tìm kiếm không trống
            if (searchText.trim() !== '') {
                var searchUrl = "{{ route('search') }}";
                var encodedSearchText = encodeURIComponent(searchText);
                var url = searchUrl + "?q=" + encodedSearchText;

                // Chuyển hướng đến URL tìm kiếm
                window.location.href = url;
            }
        }
    });
</script>
<script>
    // Lấy hình ảnh ngẫu nhiên từ Lorem Picsum API
    fetch('https://picsum.photos/200/300')
        .then(response => response.url)
        .then(randomImageUrl => {
            // Gán URL hình ảnh ngẫu nhiên cho thẻ img
            document.getElementById('avatar').src = randomImageUrl;
        })
        .catch(error => {
            console.error(error);
        });
</script>
    <script>
        let weather = {
            apiKey: "062d92a2646152d39eb7845a608226cb", // Thay thế bằng API key của openweathermap.org của bạn
            fetchWeather: function(city) {
                fetch(
                        "https://api.openweathermap.org/data/2.5/weather?q=" +
                        city +
                        "&lang=vi&units=metric&appid=" +
                        this.apiKey
                    )
                    .then((response) => {
                        if (!response.ok) {
                            throw new Error("Không có địa điểm");
                        }
                        return response.json();
                    })
                    .then((data) => this.displayWeather(data));
            },
            displayWeather: function(data) {
                const {
                    name
                } = data;
                const {
                    icon
                } = data.weather[0];
                const {
                    temp
                } = data.main;

                document.querySelector(".city").innerText = name;
                document.querySelector(".may").src =
                    "https://openweathermap.org/img/wn/" + icon + ".png";
                document.querySelector(".temp").innerText = temp + "°C";
            },
        };

        weather.fetchWeather("Hanoi"); // Lấy dữ liệu thời tiết cho Hà Nội

        function updateRealTime() {
            var currentDate = new Date();
            var day = currentDate.getDate();
            var month = currentDate.getMonth() + 1;
            var year = currentDate.getFullYear();
            var dayOfWeek = currentDate.getDay();
            var weekdays = ["Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy"];
            var currentDateElement = document.getElementById("time-now");

            currentDateElement.innerHTML = weekdays[dayOfWeek] + ", " + day + "/" + month + "/" + year;
        }

        // Cập nhật thời gian thực mỗi giây
        setInterval(updateRealTime, 1000);

        // Cập nhật thời gian ngay khi trang web được tải
        updateRealTime();
    </script>
