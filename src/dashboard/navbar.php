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
                            <source srcset="/Ohana/src/dashboard/img/avatar/avatar-illustrated-02.webp" type="image/webp"><img src="/Ohana/src/dashboard/img/avatar/avatar-illustrated-02.png" alt="User name">
                        </picture>
                    </span>
                </button>

                <ul class="users-item-dropdown nav-user-dropdown dropdown">

                    <li><a href="##">
                            <span> <?php echo $user->getType(); ?> </span>
                        </a></li>

                    <li><a href="##">
                            <span> <?php echo $user->getFullName(); ?> </span>
                        </a></li>

                    <li><a href="/dashboard/profile">
                            <i data-feather="user" aria-hidden="true"></i>
                            <span>Profile</span>
                        </a></li>

                    <li><a class="danger" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <i data-feather="log-out" aria-hidden="true"></i>
                            <span>Log out</span>
                        </a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- BOOTSTRAP USER PROFILE MODAL -->
<form id="user-profile">  
<div class="modal fade" id="editProfile" tabindex="-1" aria-labelledby="editprofileModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modalheader" id="editiprofilemodal"> UPDATE USER PROFILE </h5>
                <a href=""><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></a>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label"> First Name: </label>
                        <input type="text" class="form-control" id="recipient-name" placeholder="First Name">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label"> Middle Name: </label>
                        <input type="text" class="form-control" id="recipient-name" placeholder="Middle Name">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label"> Surname: </label>
                        <input type="text" class="form-control" id="recipient-name" placeholder="Last Name">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label"> Email Address: </label>
                        <input type="text" class="form-control" id="recipient-name" placeholder="Email Address">
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label"> Password: </label>
                        <input type="password" class="form-control" id="recipient-name" placeholder="Password" required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary"> Save Changes </button>
            </div>
        </div>
    </div>
</div>
</form>`

<!-- BOOTSTRAP 5.2.1 LOGOUT MODAL FIXED -->
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

