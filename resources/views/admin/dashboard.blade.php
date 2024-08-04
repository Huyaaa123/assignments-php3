@extends('admin.layouts-admin.master-admin')
@section('content')
<h1>Dashboard</h1>
<!-- Analyses -->
<div class="analyse">
    <div class="sales">
        <div class="status">
            <div class="info">
                <h3>Total Sales</h3>
                <h1>$65,024</h1>
            </div>
            <div class="progresss">
                <svg>
                    <circle cx="38" cy="38" r="36"></circle>
                </svg>
                <div class="percentage">
                    <p>+81%</p>
                </div>
            </div>
        </div>
    </div>
    <div class="visits">
        <div class="status">
            <div class="info">
                <h3>Site Visit</h3>
                <h1>24,981</h1>
            </div>
            <div class="progresss">
                <svg>
                    <circle cx="38" cy="38" r="36"></circle>
                </svg>
                <div class="percentage">
                    <p>-48%</p>
                </div>
            </div>
        </div>
    </div>
    <div class="searches">
        <div class="status">
            <div class="info">
                <h3>Searches</h3>
                <h1>14,147</h1>
            </div>
            <div class="progresss">
                <svg>
                    <circle cx="38" cy="38" r="36"></circle>
                </svg>
                <div class="percentage">
                    <p>+21%</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End of Analyses -->

<!-- New Users Section -->
<div class="new-users">
    <h2>Người dùng mới</h2>
    <div class="user-list">
        @foreach($newUsers as $user)
            <div class="user">
                <img src="{{ $user->profile_image ? asset('storage/' . $user->profile_image) : 'https://picsum.photos/200/200?random=' . $user->id }}" alt="{{ $user->name }}'s profile image">
                <h2>{{ $user->name }}</h2>
                <p>{{ $user->created_at->diffForHumans() }}</p>
            </div>
        @endforeach
        <a href="{{ route('admin.users.create') }}">
            <div class="user">
                <img src="{{ asset('adminnn/images/plus.png') }}">
                <h2>Hơn nữa</h2>
                <p>Thêm mới</p>
            </div>
        </a>
    </div>
</div>
<!-- End of New Users Section -->

<!-- Recent Orders Table -->
{{-- <div class="recent-orders">
    <h2>Recent Orders</h2>
    <table>
        <thead>
            <tr>
                <th>Course Name</th>
                <th>Course Number</th>
                <th>Payment</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    <a href="#">Show All</a>
</div> --}}
<!-- End of Recent Orders -->

@endsection
