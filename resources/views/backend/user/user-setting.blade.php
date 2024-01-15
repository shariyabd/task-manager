@extends('backend.layout.master')
@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block">
                        <div class="card">
                            <div class="card-aside-wrap">
                                <div class="card-inner card-inner-lg">
                                    <div class="nk-block-head nk-block-head-lg">
                                        <div class="nk-block-between">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title">Security Settings</h4>
                                                <div class="nk-block-des">
                                                    <p>These settings are helps you keep your account secure.</p>
                                                </div>
                                            </div>
                                            <div class="nk-block-head-content align-self-start d-lg-none">
                                                <a href="#" class="toggle btn btn-icon btn-trigger mt-n1"
                                                    data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                            </div>
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block">
                                        <div class="card">
                                            <div class="card-inner-group">
                                                <!-- .card-inner -->
                                                <div class="card-inner">
                                                    <div class="between-center flex-wrap g-3">
                                                        <div class="nk-block-text">
                                                            <h6>Change Password</h6>
                                                            <p>Set a unique password to protect your account.</p>
                                                        </div>
                                                        <div class="nk-block-actions flex-shrink-sm-0">
                                                            <ul class="align-center flex-wrap flex-sm-nowrap gx-3 gy-2">
                                                                <li>
                                                                    <em class="text-soft text-date fs-12px">Last changed:
                                                                        <span>Oct 2, 2019</span></em>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Accordion container -->
                                                <div class="accordion" id="passwordAccordion">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="headingPassword">
                                                            <button class="accordion-button btn btn-primary" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#collapsePassword"
                                                                aria-expanded="false" aria-controls="collapsePassword">
                                                                Change Password
                                                            </button>
                                                        </h2>
                                                        <div id="collapsePassword" class="accordion-collapse collapse"
                                                            aria-labelledby="headingPassword"
                                                            data-bs-parent="#passwordAccordion">
                                                            <div class="accordion-body">
                                                                <!-- Your password change form goes here -->
                                                                <form>
                                                                    <!-- Current Password -->
                                                                    <div class="mb-3">
                                                                        <label for="currentPassword"
                                                                            class="form-label">Current Password</label>
                                                                        <input type="password" class="form-control"
                                                                            id="currentPassword" name="currentPassword"
                                                                            required>
                                                                    </div>

                                                                    <!-- New Password -->
                                                                    <div class="mb-3">
                                                                        <label for="newPassword" class="form-label">New
                                                                            Password</label>
                                                                        <div class="input-group">
                                                                            <input type="password" class="form-control"
                                                                                id="newPassword" name="newPassword"
                                                                                required>

                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text"
                                                                                    onclick="password_show_hide();">
                                                                                    <i class="fas fa-eye"
                                                                                        id="show_eye">show</i>
                                                                                    <i class="fas fa-eye-slash d-none"
                                                                                        id="hide_eye"></i>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Confirm Password -->
                                                                    <div class="mb-3">
                                                                        <label for="confirmPassword"
                                                                            class="form-label">Confirm Password</label>
                                                                        <div class="input-group">
                                                                            <input type="password" class="form-control"
                                                                                id="confirmPassword" name="confirmPassword"
                                                                                required>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Submit Button -->
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Submit</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- JavaScript to toggle accordion on button click -->

                                                <!-- .card-inner -->

                                            </div><!-- .card-inner-group -->
                                        </div><!-- .card -->
                                    </div><!-- .nk-block -->
                                </div><!-- .card-inner -->
                                @include('backend.user.include.aside')<!-- .card-aside -->
                            </div><!-- .card-aside-wrap -->
                        </div><!-- .card -->
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        function password_show_hide() {
            var x = document.getElementById("newPassword");
            var show_eye = document.getElementById("show_eye");
            var hide_eye = document.getElementById("hide_eye");
            hide_eye.classList.remove("d-none");
            if (x.type === "password") {
                x.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }
        document.getElementById('changePasswordBtn').addEventListener('click', function() {
            var accordion = new bootstrap.Collapse(document.getElementById('collapsePassword'));
        });
    </script>
    @end
