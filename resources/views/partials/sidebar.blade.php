<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar toggle-sidebar">
    <div class="app-sidebar__user">
        <div class="user-body">
            <span class="avatar avatar-xl brround text-center cover-image" data-image-src="{{ url('assets/images/users/male/4.jpg') }}"></span>
        </div>
        <div class="user-info">
            <a href="#" class="ml-2"><span class="app-sidebar__user-name font-weight-semibold">Peter Mills</span><br>
                <span class="text-muted app-sidebar__user-name text-sm"> Web-Designer</span>
            </a>
        </div>
    </div>
    <div class="sidebar-navs">
        <ul class="nav  nav-pills-circle">
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Settings">
                <a class="nav-link border h-6 text-center m-2">
                    <i class="fe fe-settings"></i>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Chat">
                <a class="nav-link border h-6  m-2">
                    <i class="fe fe-mail"></i>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Followers">
                <a class="nav-link border h-6  m-2">
                    <i class="fe fe-user"></i>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="top" title="Logout">
                <a class="nav-link border h-6  m-2" >
                    <i class="fe fe-power"></i>
                </a>
            </li>
        </ul>
    </div>
    <ul class="side-menu toggle-menu">
        {{-- <li class="slide">
            <a class="side-menu__item"  data-toggle="slide" href="#"><i class="side-menu__icon typcn typcn-device-laptop"></i><span class="side-menu__label">Dashboard</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a class="slide-item"  href="index.html"><span>Dashboard 01</span></a></li>
                <li><a class="slide-item" href="index2.html"><span>Dashboard 02</span></a></li>
                <li><a class="slide-item" href="index3.html"><span>Dashboard 03</span></a></li>
                <li><a class="slide-item" href="index4.html"><span>Dashboard 04</span></a></li>
                <li><a class="slide-item" href="index5.html"><span>Dashboard 05</span></a></li>
            </ul>
        </li>
        <li>
            <a class="side-menu__item" href="widgets.html"><i class="side-menu__icon typcn typcn-th-small"></i><span class="side-menu__label">Widgets</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon typcn typcn-book"></i><span class="side-menu__label">Apps</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="cards.html" class="slide-item"> Cards design</a></li>
                <li><a href="cards-image.html" class="slide-item"> Image  Cards design</a></li>
                <li><a href="chat.html" class="slide-item"> Default Chat</a></li>
                <li><a href="calendar.html" class="slide-item"> Default calendar</a></li>
                <li><a href="calendar2.html" class="slide-item"> Full calendar</a></li>
                <li><a href="notify.html" class="slide-item"> Notifications</a></li>
                <li><a href="sweetalert.html" class="slide-item"> Sweet alerts</a></li>
                <li><a href="rangeslider.html" class="slide-item"> Range slider</a></li>
                <li><a href="scroll.html" class="slide-item"> Content Scroll bar</a></li>
                <li><a href="counters.html" class="slide-item">Counters</a></li>
                <li><a href="loaders.html" class="slide-item"> Loaders</a></li>
                <li><a href="time-line.html" class="slide-item"> Time Line</a></li>
                <li><a href="rating.html" class="slide-item"> Rating</a></li>
            </ul>
        </li>
        <li>
            <a class="side-menu__item" href="maps.html"><i class="side-menu__icon typcn typcn-location-outline"></i><span class="side-menu__label">Vector Maps</span></a>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon typcn typcn-arrow-repeat-outline"></i><span class="side-menu__label">Advanced UI</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="modal.html" class="slide-item"> Modal</a></li>
                <li><a href="tooltipandpopover.html" class="slide-item"> Tooltip and popover</a></li>
                <li><a href="progress.html" class="slide-item"> Progress</a></li>
                <li><a href="chart.html" class="slide-item"> Charts</a></li>
                <li><a href="carousel.html" class="slide-item"> Carousels</a></li>
                <li><a href="accordion.html" class="slide-item"> Accordions</a></li>
                <li><a href="tabs.html" class="slide-item"> Tabs</a></li>
                <li><a href="headers.html" class="slide-item"> Headers</a></li>
                <li><a href="footers.html" class="slide-item">Footers</a></li>
                <li><a href="crypto-currencies.html" class="slide-item"> Crypto-currencies</a></li>
                <li><a href="users-list.html" class="slide-item"> User List</a></li>
                <li><a href="search.html" class="slide-item"> Search page</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon typcn typcn-mail"></i><span class="side-menu__label">Tables</span></a>
            <ul class="slide-menu">
                <li><a href="email.html" class="slide-item">Email</a></li>
                <li><a href="emailservices.html" class="slide-item">Email Inbox</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon typcn typcn-chart-bar"></i><span class="side-menu__label">Charts</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="chart-chartist.html" class="slide-item">Chartist Charts</a></li>
                <li><a href="chart-dygraph.html" class="slide-item">Dygraph Charts</a></li>
                <li><a href="chart-peity.html" class="slide-item"> Pie Charts</a></li>
                <li><a href="chart-echart.html" class="slide-item"> Echart Charts</a></li>
                <li><a href="chart-flot.html" class="slide-item"> Flot Charts</a></li>
                <li><a href="chart-high.html" class="slide-item"> High Charts</a></li>
                <li><a href="chart-nvd3.html" class="slide-item"> Nvd3 Charts</a></li>
                <li><a href="chart-morris.html" class="slide-item"> Morris Charts</a></li>
                <li><a href="chart-c3.html" class="slide-item">C3 Charts</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon typcn typcn-globe-outline"></i><span class="side-menu__label">Elements</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="alerts.html" class="slide-item"> Alerts</a></li>
                <li><a href="buttons.html" class="slide-item"> Buttons</a></li>
                <li><a href="colors.html" class="slide-item"> Colors</a></li>
                <li><a href="avatars.html" class="slide-item"> Avatars</a></li>
                <li><a href="dropdown.html" class="slide-item">Dropdowns</a></li>
                <li><a href="thumbnails.html" class="slide-item"> Thumbnails</a></li>
                <li><a href="mediaobject.html" class="slide-item"> Media Object</a></li>
                <li><a href="list.html" class="slide-item"> List</a></li>
                <li><a href="tags.html" class="slide-item"> Tags</a></li>
                <li><a href="pagination.html" class="slide-item"> Pagination</a></li>
                <li><a href="navigation.html" class="slide-item"> Navigation</a></li>
                <li><a href="typography.html" class="slide-item"> Typography</a></li>
                <li><a href="breadcrumbs.html" class="slide-item"> Breadcrumbs</a></li>
                <li><a href="badge.html" class="slide-item"> Badges</a></li>
                <li><a href="jumbotron.html" class="slide-item"> Jumbotron</a></li>
                <li><a href="panels.html" class="slide-item"> Panels</a></li>
            </ul>
        </li> --}}
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon typcn typcn-document-text"></i><span class="side-menu__label">Prayer Management</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="form-elements.html" class="slide-item"> Dashboard</a></li>
                <li><a href="{{ route('prayer-management.create') }}" class="slide-item"> Mark Prayer</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon typcn typcn-document-text"></i><span class="side-menu__label">Expense Management</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="{{ route('expense-management.dashboard') }}" class="slide-item">Dashboard</a></li>
                <li><a href="{{ route('expense-management.category.index') }}" class="slide-item">Manage Categories</a></li>
                <li><a href="{{ route('expense-management.accounts.index') }}" class="slide-item">Manage Accounts</a></li>
                <li><a href="{{ route('expense-management.transaction.index') }}" class="slide-item">Manage Transactions</a></li>
            </ul>
        </li>
        {{-- <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon  typcn typcn-puzzle-outline"></i><span class="side-menu__label">Icons</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="icons.html" class="slide-item"> Font Awesome</a></li>
                <li><a href="icons2.html" class="slide-item"> Material Design Icons</a></li>
                <li><a href="icons3.html" class="slide-item"> Simple Line Icons</a></li>
                <li><a href="icons4.html" class="slide-item"> Feather Icons</a></li>
                <li><a href="icons5.html" class="slide-item"> Ionic Icons</a></li>
                <li><a href="icons6.html" class="slide-item"> Flag Icons</a></li>
                <li><a href="icons7.html" class="slide-item"> pe7 Icons</a></li>
                <li><a href="icons8.html" class="slide-item"> Themify Icons</a></li>
                <li><a href="icons9.html" class="slide-item">Typicons Icons</a></li>
                <li><a href="icons10.html" class="slide-item">Weather Icons</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon typcn typcn-clipboard"></i><span class="side-menu__label">Tables</span></a>
            <ul class="slide-menu">
                <li><a href="tables.html" class="slide-item">Default table</a></li>
                <li><a href="datatable.html" class="slide-item">Data Table</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon typcn typcn-beaker"></i><span class="side-menu__label">Pages</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="profile.html" class="slide-item"> Profile</a></li>
                <li><a href="editprofile.html" class="slide-item"> Edit Profile</a></li>
                <li><a href="pricing.html" class="slide-item"> Pricing Tables</a></li>
                <li><a href="gallery.html" class="slide-item"> Gallery</a></li>
                <li><a href="invoice.html" class="slide-item"> Invoice</a></li>
                <li><a href="about.html" class="slide-item"> About Company</a></li>
                <li><a href="services.html" class="slide-item"> Services</a></li>
                <li><a href="faq.html" class="slide-item"> FAQS</a></li>
                <li><a href="terms.html" class="slide-item"> Terms and Conditions</a></li>
                <li><a href="empty.html" class="slide-item"> Empty Page</a></li>
                <li><a href="blog.html" class="slide-item"> Blog</a></li>
                <li><a href="construction.html" class="slide-item"> Under Construction</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon typcn typcn-shopping-cart"></i><span class="side-menu__label">E-Commerce</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="shop.html" class="slide-item"> Products</a></li>
                <li><a href="shop-des.html" class="slide-item">Product Details</a></li>
                <li><a href="cart.html" class="slide-item"> Shopping Cart</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon typcn typcn-compass"></i><span class="side-menu__label">Custom</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="login.html" class="slide-item"> Login</a></li>
                <li><a href="register.html" class="slide-item"> Register</a></li>
                <li><a href="forgot-password.html" class="slide-item"> Forgot Password</a></li>
                <li><a href="lockscreen.html" class="slide-item"> Lock screen</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" data-toggle="slide" href="#"><i class="side-menu__icon typcn typcn-info-outline"></i><span class="side-menu__label">Error Pages</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li><a href="400.html" class="slide-item"> 400 Error</a></li>
                <li><a href="401.html" class="slide-item"> 401 Error</a></li>
                <li><a href="403.html" class="slide-item"> 403 Error</a></li>
                <li><a href="404.html" class="slide-item"> 404 Error</a></li>
                <li><a href="500.html" class="slide-item"> 500 Error</a></li>
                <li><a href="503.html" class="slide-item"> 503 Error</a></li>
            </ul>
        </li> --}}
    </ul>
</aside>
<!--sidemenu end-->
