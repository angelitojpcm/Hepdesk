<div class="mx-3 mx-lg-0">
    <div class="card my-5 col-xl-9 col-xxl-8 mx-auto rounded-4 overflow-hidden p-4">
        <div class="row g-4">
            <div class="col-lg-6 d-flex">
                <div class="card-body">
                    <img src="<?= BASE_URL ?>assets/images/logo1.png" class="mb-4" width="145" alt="" />
                    <h4 class="fw-bold">Accede al sistema</h4>
                    <p class="mb-0">Ingresa tus credenciales para acceder con tu cuenta.</p>
                    <div class="row gy-2 gx-0 my-4">
                        <div class="col-12 col-lg-12">
                            <button class="btn btn-filter py-2 px-4 font-text1 fw-bold d-flex align-items-center justify-content-center w-100">
                                <span class=""><img src="<?= BASE_URL ?>assets/images/apps/05.png" width="20" class="me-2" alt="" />Sign in with Google</span>
                            </button>
                        </div>
                    </div>

                    <div class="separator">
                        <div class="line"></div>
                        <p class="mb-0 fw-bold">O INGRESA CON</p>
                        <div class="line"></div>
                    </div>
                    <div class="form-body mt-4">
                        <form class="row g-3" id="loginForm">
                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <input type="email"  name="email" class="form-control" id="email" placeholder="jhon@example.com" />
                            </div>
                            <div class="col-12">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group" id="show_hide_password">
                                    <input type="password" name="password" class="form-control border-end-0" id="password" value="12345678" placeholder="Enter Password" />
                                    <a href="javascript:;" class="input-group-text bg-transparent"><i class="bi bi-eye-slash-fill"></i></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked />
                                    <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-md-6 text-end">
                                <a href="auth-boxed-forgot-password.html">Forgot Password ?</a>
                            </div>
                            <div class="col-12">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-grd-primary">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-lg-flex d-none">
                <div class="p-3 rounded-4 w-100 d-flex align-items-center justify-content-center bg-grd-primary">
                    <img src="<?= BASE_URL ?>assets/images/auth/login1.png" class="img-fluid" alt="" />
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</div>