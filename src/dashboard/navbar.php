<nav class="main-nav--bg">
    <div class="container main-nav">
        <div class="main-nav-start">
        </div>
        <div class="main-nav-end">
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle--gray" aria-hidden="true"></span>
            </button>
            <!-- USER PROFILE DROPDOWN FOR LOGOUT -->
            <div class="nav-user-wrapper">
                <button href="##" class="nav-user-btn dropdown-btn" title="My profile" type="button">
                    <span class="sr-only">My profile</span>
                    <span class="nav-user-img">
                        <picture>
                            <img src="/Ohana/src/dashboard/img/avatar/administrator.png" alt="Admin Profie">
                        </picture>
                    </span>
                </button>
                <ul class="users-item-dropdown nav-user-dropdown dropdown">
                    <li class="text-center mt-2" style="color:#db6551"><span><?php echo $user->getType(); ?></span></li>
                    <li class="text-center mt-2 mb-2"><span> <?php echo $user->getFullName(); ?></span></li>
                    <li><a href="/dashboard/profile"><i data-feather="user" aria-hidden="true"></i><span>Profile</span></a></li>
                    <li><a href="/home" target="_blank"><i data-feather="home" aria-hidden="true"></i><span>Ohana Website</span></a></li>
                    <li><a class="danger" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <i data-feather="log-out" aria-hidden="true"></i>
                            <span style="cursor:pointer;">Log out</span>
                        </a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!--  LOGOUT MODAL FIXED -->
<form method="POST" action="/accounts/logout">
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutTitle"> Do you want to logout? </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-left: 45%;"></button>
                </div>
                <div class="modal-body">
                    All the unsaved changes will be lost. Are you sure you would like to log-out?
                </div>
                <div class="modal-footer">
                    <button type="submit" name="btnLogout" class="btn btn-danger"> Logout </button>
                </div>
            </div>
        </div>
    </div>
</form>