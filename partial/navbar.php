<header class="bg-white w-100 border border-secondary">
      <div class="container">
        <div class="d-flex align-items-center py-3 justify-content-between">
          <div  class="d-flex align-items-center">
            <div  class="logo gradient-text" style='margin-right: 60px;'>
            <a href="/projectct467/" style='text-decoration: none'>SPing</a>
        </div>
            <div class="input-group d-none d-md-flex">
              <input autocomplete="off" type="text" class="form-control rounded" placeholder="Tìm kiếm"/>
            </div>
          </div>
          <div  class="d-flex">
            <div  class="">
              <ul class="nav">
                <li class="nav-item rounded-2 d-flex align-items-center">
                <a  href="/projectct467/order.php" style='text-decoration: none'>Quản lý đơn hàng</a>
                </li>

                <li  class="nav-item rounded-2 dropdown">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    Cài Đặt
                  </a>
                  <ul class="dropdown-menu">
                    <li>
                      <a class="dropdown-item" href="/profile.php">Thông tin cá nhân</a>
                    </li>
                    <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#resetPWModal" >Đổi mật khẩu</a></li>
                    <li id='logout'>
                      <form method="POST" action="./login.php" >
                        <button type="submit" class="w-100 text-start px-3" style="border: 0; background-color: white;">Đăng nhập</button>
                      </form>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>