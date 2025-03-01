<div class="side-header">
    <div class="app-header header d-flex">
        <div class="container-fluid">
            <div class="d-flex">
                <a class="header-brand" href="index.html">
                    <img alt="logo" class="header-brand-img main-logo" src="{{ url('assets/images/brand/logo-light.png') }}">
                    <img alt="logo" class="header-brand-img mobile-logo" src="{{ url('assets/images/brand/icon-light.png') }}">
                </a>
                <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
                <a href="#" data-toggle="search" class="nav-link icon navsearch"><i class="typcn typcn-zoom-outline"></i></a>
                <div class="header-leftnav">
                    <ul class="nav">
                        <li class="header-searchinput">
                            <form class="form-inline">
                                <div class="search-element">
                                    <input type="search" class="form-control header-search" placeholder="Search…" aria-label="Search" tabindex="1">
                                    <button class="btn btn-primary-color" type="submit"><i class="si si-magnifier"></i></button>
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
                <div class="d-flex order-lg-2 ml-auto header-rightnav">
                    <ul class="nav">
                        <li>
                            <div class="header-full-screen">
                                <a  class="nav-link icon full-screen-link" id="fullscreen-button">
                                    <i class="typcn typcn-arrow-maximise"></i>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown header-notify">
                                <a class="nav-link icon" data-toggle="dropdown">
                                    <i class="typcn  typcn-bell"></i>
                                    <span class="nav-unread bg-warning"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
                                    <div class="drop-heading">
                                        <div class="d-flex">
                                            <h5 class="mb-0 text-dark">Notifications</h5>
                                            <span class="badge badge-danger ml-auto">4</span>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider mt-0"></div>
                                    <a href="#" class="dropdown-item d-flex pb-3">
                                        <div class="notifyimg">
                                            <i class="fa fa-thumbs-o-up"></i>
                                        </div>
                                        <div>
                                            <strong>Someone likes our posts.</strong>
                                            <div class="small text-muted">3 hours ago</div>
                                        </div>
                                    </a>
                                    <a href="#" class="dropdown-item d-flex pb-3">
                                        <div class="notifyimg bg-secondary">
                                            <i class="fa fa-commenting-o"></i>
                                        </div>
                                        <div>
                                            <strong> 3 New Comments</strong>
                                            <div class="small text-muted">5  hour ago</div>
                                        </div>
                                    </a>
                                    <a href="#" class="dropdown-item d-flex pb-3">
                                        <div class="notifyimg bg-danger">
                                            <i class="si si-user"></i>
                                        </div>
                                        <div>
                                            <strong> Adding new Customers</strong>
                                            <div class="small text-muted">1  hour ago</div>
                                        </div>
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <div class="text-center dropdown-btn  pb-3">
                                        <a href="#" class=" btn btn-primary ">
                                        View all Notification</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown header-grid">
                                <a class="nav-link icon" data-toggle="dropdown">
                                    <i class="typcn typcn-th-large-outline"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow p-0">
                                    <ul class="drop-icon-wrap p-0">
                                        <li>
                                            <div class="drop-heading">
                                                <div class="d-flex">
                                                    <h5 class="mb-0 text-dark">Grid Elements</h5>
                                                </div>
                                            </div>
                                            <div class="dropdown-divider m-0"></div>
                                        </li>
                                        <li>
                                            <a href="#" class="drop-icon-item">
                                                <span class="bg-primary-transparent icon-service text-primary ">
                                                    <i class="fe fe-mail"></i>
                                                </span>
                                                <span class="block drop-text"> E-mail</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="drop-icon-item">
                                                <span class="bg-danger-transparent icon-service text-danger">
                                                    <i class="fe fe-calendar"></i>
                                                </span>
                                                <span class="block drop-text">calendar</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="drop-icon-item">
                                                <span class="bg-secondary-transparent icon-service text-secondary">
                                                    <i class="fe fe-map-pin"></i>
                                                </span>
                                                <span class="block drop-text">map</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="drop-icon-item">
                                                <span class="bg-pink-transparent icon-service text-pink">
                                                    <i class="fe fe-shopping-cart"></i>
                                                </span>
                                                <span class="block drop-text">Cart</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="drop-icon-item">
                                                <span class="bg-warning-transparent icon-service text-warning">
                                                    <i class="fe fe-message-square"></i>
                                                </span>
                                                <span class="block drop-text">chat</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="drop-icon-item">
                                                <span class="bg-info-transparent icon-service text-info">
                                                    <i class="fe fe-phone-outgoing"></i>
                                                </span>
                                                <span class="block drop-text">contact</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class=" btn btn-primary m-3">
                                                Add more	</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown user-header">
                                <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                                    <span class="avatar avatar-md brround"><img src="{{ url('assets/images/users/male/4.jpg') }}" alt="Profile-img" class="avatar avatar-md brround"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
                                    <div class="drop-heading">
                                        <div class="text-center">
                                            <h5 class="text-dark mb-1">Peter Mills</h5>
                                            <small class="text-muted"> Web-Designer</small>
                                        </div>
                                    </div>
                                    <div class="dropdown-divider m-0"></div>
                                    <a class="dropdown-item" href="#">
                                        <i class="dropdown-icon mdi mdi-account-outline "></i> Profile
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="dropdown-icon  mdi mdi-settings"></i> Settings
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="dropdown-icon mdi  mdi-message-outline"></i> Inbox
                                    </a>
                                    <a class="dropdown-item" href="#">
                                        <i class="dropdown-icon mdi mdi-comment-check-outline"></i> Message
                                    </a>
                                    <a class="dropdown-item" href="login.html">
                                        <i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign in
                                    </a>
                                    <div class="dropdown-divider m-0"></div>
                                    <div class="text-center">
                                        <a href="#" class=" btn btn-primary m-3">Logout	</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown d-md-flex header-settings">
                                <a href="#" class="nav-link icon " data-toggle="sidebar-right" data-target=".sidebar-right">
                                    <i class="fe fe-align-right"></i>
                                </a>
                            </div><!-- SIDE-MENU -->
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>