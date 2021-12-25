<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('backend') }}/assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Evergrow</h4>
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
            <a href="{{route('register')}}">
                <div class="parent-icon"><i class="bx bx-check-circle"></i>
                </div>
                <div class="menu-title">Registration</div>
            </a>
        </li>
        <li>
            <a href="widgets.html">
                <div class="parent-icon"><i class='bx bx-category'></i>
                </div>
                <div class="menu-title">Upgrade Package</div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-user'></i>
                </div>
                <div class="menu-title">Webwork</div>
            </a>
            <ul>
                <li> <a href="ecommerce-products.html"><i class="bx bx-right-arrow-alt"></i>My Sponsors</a>
                </li>
                <li> <a href="ecommerce-products-details.html"><i class="bx bx-right-arrow-alt"></i>My Team</a>
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
                <li> <a href="component-alerts.html"><i class="bx bx-right-arrow-alt"></i>Registration History</a>
                </li>
                <li> <a href="component-accordions.html"><i class="bx bx-right-arrow-alt"></i>Upgrade History</a>
                </li>
                <li> <a href="component-badges.html"><i class="bx bx-right-arrow-alt"></i>Withdraw History</a>
                </li>

            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-transfer"></i>
                </div>
                <div class="menu-title">Transfer History</div>
            </a>
            <ul>
                <li> <a href="content-grid-system.html"><i class="bx bx-right-arrow-alt"></i>Register Wallet</a>
                </li>
                <li> <a href="content-typography.html"><i class="bx bx-right-arrow-alt"></i>Cash Wallet</a>
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
                <li> <a href="icons-line-icons.html"><i class="bx bx-right-arrow-alt"></i>Sponsor Bonus History</a>
                </li>
                <li> <a href="icons-boxicons.html"><i class="bx bx-right-arrow-alt"></i>Daily Revenue History</a>
                </li>
                <li> <a href="icons-feather-icons.html"><i class="bx bx-right-arrow-alt"></i>Royalty Bonus History</a>
                </li>
                <li> <a href="icons-feather-icons.html"><i class="bx bx-right-arrow-alt"></i>Level Bonus History</a>
                </li>
                <li> <a href="icons-feather-icons.html"><i class="bx bx-right-arrow-alt"></i>Pair Bonus History</a>
                </li>
                <li> <a href="icons-feather-icons.html"><i class="bx bx-right-arrow-alt"></i>Team Bonus History</a>
                </li>
                <li> <a href="icons-feather-icons.html"><i class="bx bx-right-arrow-alt"></i>Club Bonus History</a>
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
                <li> <a href="form-elements.html"><i class="bx bx-right-arrow-alt"></i>Profile</a>
                </li>
                <li> <a href="form-input-group.html"><i class="bx bx-right-arrow-alt"></i>Payment Method</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="https://themeforest.net/user/codervent" target="_blank">
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
            <a href="pricing-table.html">
                <div class="parent-icon"><i class="bx
                    bx-up-arrow-circle"></i>
                </div>
                <div class="menu-title">Log out</div>
            </a>
        </li>


    </ul>
    <!--end navigation-->
</div>
