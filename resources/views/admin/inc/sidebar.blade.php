<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
      <div>
            <img src="{{asset('assets/images/logo-img2.jpg')}}" height="40"
            width="150" alt="" />
      </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{route('admin.pages.dashboard')}}" >
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>

        </li>
        <li>
            <a href="{{route('user-list')}}" >
                <div class="parent-icon"><i class='bx bx-user'></i>
                </div>
                <div class="menu-title">Users</div>
            </a>

        </li>
        <li>
            <a href="{{route('payment-method')}}" >
                <div class="parent-icon"><i class='bx bx-wallet'></i>
                </div>
                <div class="menu-title">Payment Method</div>
            </a>

        </li>
        <li>
            <a href="{{route('deposit-manage')}}" >
                <div class="parent-icon"><i class='bx bx-cart'></i>
                </div>
                <div class="menu-title">Deposit Request</div>
            </a>

        </li>






    </ul>
    <!--end navigation-->
</div>
