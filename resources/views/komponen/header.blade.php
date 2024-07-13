<div class="main-header">
  <div class="main-header-logo">
      <div class="logo-header" data-background-color="dark">
          <a href="index.html" class="logo">
              <img
                  src="{{ Auth::user()->foto ? Storage::url(Auth::user()->foto) : asset('assets/img/default-profile.jpg') }}"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
              />
          </a>
          <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
              </button>
          </div>
          <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
          </button>
      </div>
  </div>
  <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
      <div class="container-fluid">
          <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
              <li class="nav-item topbar-user dropdown hidden-caret">
                  <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                      <div class="avatar-sm">
                          <img
                              src="{{ Auth::user()->foto ? Storage::url(Auth::user()->foto) : asset('assets/img/default-profile.jpg') }}"
                              alt="..."
                              class="avatar-img rounded-circle"
                          />
                      </div>
                      <span class="profile-username">
                          <span class="op-7">Hi,</span>
                          <span class="fw-bold">{{ Auth::user()->name }}</span>
                      </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                      <div class="dropdown-user-scroll scrollbar-outer">
                          <li>
                              <div class="user-box">
                                  <div class="avatar-lg">
                                      <img src="{{ Auth::user()->foto ? Storage::url(Auth::user()->foto) : asset('assets/img/default-profile.jpg') }}" alt="image profile" class="avatar-img rounded">
                                  </div>
                                  <div class="u-text">
                                      <h4>{{ Auth::user()->name }}</h4>
                                      <p class="text-muted">{{ Auth::user()->email }}</p>
                                      <a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
                                  </div>
                              </div>
                          </li>
                          <li>
                              <div class="dropdown-divider"></div>
                              <form action="{{ route('logout') }}" method="POST">
                                  @csrf
                                  <button type="submit" class="dropdown-item">Logout</button>
                              </form>
                          </li>
                      </div>
                  </ul>
              </li>
          </ul>
      </div>
  </nav>
</div>
