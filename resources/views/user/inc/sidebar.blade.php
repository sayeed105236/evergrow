<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            	<img src="{{asset('assets/images/logo-img2.png')}}" height="40"
              width="150" alt="" />
        </div>

        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="/home/dashboard/{{Auth::user()->id}}" >
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li>
            <a href="/home/user-buy-unit/{{Auth::user()->id}}">
                <div class="parent-icon"><i class="bx bx-check-circle"></i>
                </div>
                <div class="menu-title">Buy Unit</div>
            </a>
        </li>
        <li>
            <a href="/home/user-rank/{{Auth::user()->id}}">
                <div class="parent-icon"><i class="bx bx-diamond"></i>
                </div>
                <div class="menu-title">Rank</div>
            </a>
        </li>
      
        <li>
            <a href="https://cryptoads.work/cads/user/referral_link/3stars">
                <div class="parent-icon"><i class='bx bx-category'></i>
                </div>
                <div class="menu-title">Staking</div>
            </a>
        </li>
        <li>
            <a href="/home/activation-package/{{Auth::user()->id}}">
                <div class="parent-icon"><i class='bx bx-category'></i>
                </div>
                <div class="menu-title">Activate Package</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-user'></i>
                </div>
                <div class="menu-title">Webwork</div>
            </a>
            <ul>
                <li> <a href="/home/referrals/{{Auth::user()->id}}"><i class="bx bx-right-arrow-alt"></i>My Sponsors</a>
                </li>
                <li> <a href="/home/my-team/{{Auth::user()->id}}"><i class="bx bx-right-arrow-alt"></i>My Team</a>
                </li>


            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-history'></i>
                </div>
                <div class="menu-title">History</div>
            </a>
            <ul>


                <li> <a href="/home/withdraw-report/{{Auth::user()->id}}"><i class="bx bx-right-arrow-alt"></i>Withdraw History</a>
                </li>
                <li> <a href="/home/transfer-report/{{Auth::user()->id}}"><i class="bx bx-right-arrow-alt"></i>Transfer History</a>
                </li>
                <li> <a href="/home/unit-buy-report/{{Auth::user()->id}}"><i class="bx bx-right-arrow-alt"></i>Unit Buy History</a>
                </li>

            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class="bx bx-book"></i>
                </div>
                <div class="menu-title">Income History</div>
            </a>
            <ul>
                <li> <a href="/home/sponsor_bonus_history/{{Auth::user()->id}}"><i class="bx bx-right-arrow-alt"></i>Sponsor Bonus History</a>
                </li>

                <li> <a href="/home/binary_bonus_history/{{Auth::user()->id}}"><i class="bx bx-right-arrow-alt"></i>Binary Bonus History</a>
                </li>
                <li> <a href="/home/profit_bonus_history/{{Auth::user()->id}}"><i class="bx bx-right-arrow-alt"></i>Profit Bonus History</a>
                </li>
                <li> <a href="/home/rank_bonus_history/{{Auth::user()->id}}"><i class="bx bx-right-arrow-alt"></i>Rank Bonus History</a>
                </li>
                <li> <a href="/home/unit_bonus_history/{{Auth::user()->id}}"><i class="bx bx-right-arrow-alt"></i>Unit Bonus History</a>
                </li>
                <li> <a href="/home/club_bonus_history/{{Auth::user()->id}}"><i class="bx bx-right-arrow-alt"></i>Club Bonus History</a>
                </li>
            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-cog'></i>
                </div>
                <div class="menu-title">Settings</div>
            </a>
            <ul>
                <li> <a href="/home/user-profile/{{Auth::user()->id}}"><i class="bx bx-right-arrow-alt"></i>Profile</a>
                </li>
                <li> <a href="/home/payment-method/{{Auth::user()->id}}"><i class="bx bx-right-arrow-alt"></i>Payment Method</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" target="_blank">
                <div class="parent-icon"><i class="bx bx-support"></i>
                </div>
                <div class="menu-title">Support</div>
            </a>
            <ul>
                <li> <a href="form-elements.html"><i class="bx bx-right-arrow-alt"></i>Open Ticket</a>
                </li>
                <li> <a href="form-input-group.html"><i class="bx bx-right-arrow-alt"></i>My Ticket</a>
                </li>
            </ul>
        </li>


        <li>


                <form method="POST" action="{{ route('logout') }}">
                    @csrf


                    <a class="d-flex align-items-center"  href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();"><div class="parent-icon"><i class="bx
                                        bx-up-arrow-circle"></i>
                                    </div>
                        Logout
                    </a>
                </form>

        </li>


    </ul>
    <!--end navigation-->
</div>
