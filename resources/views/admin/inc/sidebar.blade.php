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
            <a href="{{route('manage-unit')}}" >
                <div class="parent-icon"><i class='bx bx-check-circle'></i>
                </div>
                <div class="menu-title">Units</div>
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
        <li>
            <a href="{{route('withdraw-manage')}}" >
                <div class="parent-icon"><i class='bx bx-box'></i>
                </div>
                <div class="menu-title">Withdrawal Request</div>
            </a>

        </li>
        <li>
            <a href="{{route('settings-manage')}}" >
                <div class="parent-icon"><i class='bx bx-cog'></i>
                </div>
                <div class="menu-title">System Settings</div>
            </a>

        </li>
        <li>
            <a href="{{route('club-member-manage')}}" >
                <div class="parent-icon"><i class='bx bx-user'></i>
                </div>
                <div class="menu-title">Club Members</div>
            </a>

        </li>
        <li>
            <a href="{{route('profit-share-manage')}}" >
                <div class="parent-icon"><i class='bx bx-wallet'></i>
                </div>
                <div class="menu-title">Profit Share</div>
            </a>

        </li>
        <li>
            <a href="{{route('balance-adjust')}}" >
                <div class="parent-icon"><i class='bx bx-money'></i>
                </div>
                <div class="menu-title">Balance Adjust</div>
            </a>

        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-history'></i>
                </div>
                <div class="menu-title">Transaction History</div>
            </a>
            <ul>
                <li> <a href="{{route('manage-pair-history')}}"><i class="bx bx-right-arrow-alt"></i>Pair Bonus History</a>
                </li>
                <li> <a href="{{route('manage-rank-history')}}"><i class="bx bx-right-arrow-alt"></i>Rank Bonus History</a>
                </li>
                <li> <a href="{{route('manage-club-history')}}"><i class="bx bx-right-arrow-alt"></i>Club Bonus History</a>
                </li>
                  <li> <a href="{{route('manage-sponsor-history')}}"><i class="bx bx-right-arrow-alt"></i>Sponsor Bonus History</a>
                  </li>
                  <li> <a href="{{route('manage-profit-history')}}"><i class="bx bx-right-arrow-alt"></i>Profit Bonus History</a>
                  </li>
                  <li> <a href="{{route('manage-unit-history')}}"><i class="bx bx-right-arrow-alt"></i>Unit Bonus History</a>
                  </li>
                  <li> <a href="{{route('manage-transfer-history')}}"><i class="bx bx-right-arrow-alt"></i>Transfer History</a>
                  </li>
                  <li> <a href="{{route('manage-unit-purchase-history')}}"><i class="bx bx-right-arrow-alt"></i>Unit Purchase History</a>
                  </li>


            </ul>
        </li>






    </ul>
    <!--end navigation-->
</div>
