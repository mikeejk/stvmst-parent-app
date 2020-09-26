
<!-- begin:: Aside Menu -->
<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
    <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
        <ul class="kt-menu__nav ">
            @if(Auth::user()->role === 'emp')
            <li class="kt-menu__item {{ Request::path() === 'home'? 'kt-menu__item--active': '' }}" aria-haspopup="true">
                <a  href="/teacher" class="kt-menu__link">
                    <i class="kt-menu__link-icon flaticon2-graph-1"></i>
                    <span class="kt-menu__link-text">Dashboard</span>
                </a>
            </li>
            <li class="kt-menu__item {{ Request::path() === 'video-upload'? 'kt-menu__item--active': '' }}" aria-haspopup="true">
                <a href="/video-upload" class="kt-menu__link">
                    <i class="kt-menu__link-icon flaticon2-user"></i>
                    <span class="kt-menu__link-text">Video Upload</span>
                </a>
            </li>
            <li class="kt-menu__item {{ Request::path() === 'map-video'? 'kt-menu__item--active': '' }}" aria-haspopup="true">
                <a href="/map-video" class="kt-menu__link">
                    <i class="kt-menu__link-icon flaticon2-user"></i>
                    <span class="kt-menu__link-text">Map Video</span>
                </a>
            </li>
            <li class="kt-menu__item {{ Request::path() === 'all-courses'? 'kt-menu__item--active': '' }}" aria-haspopup="true">
                <a href="/all-courses" class="kt-menu__link">
                    <i class="kt-menu__link-icon flaticon2-user"></i>
                    <span class="kt-menu__link-text">All Courses</span>
                </a>
            </li>
            @else
            <li class="kt-menu__item {{ Request::path() === 'home'? 'kt-menu__item--active': '' }}" aria-haspopup="true">
                <a  href="/home" class="kt-menu__link">
                    <i class="kt-menu__link-icon flaticon2-graph-1"></i>
                    <span class="kt-menu__link-text">Dashboard</span>
                </a>
            </li>
            <li class="kt-menu__item {{ Request::path() === 'online-class'? 'kt-menu__item--active': '' }}" aria-haspopup="true">
                <a href="/online-class" class="kt-menu__link">
                    <i class="kt-menu__link-icon flaticon2-user"></i>
                    <span class="kt-menu__link-text">Online Class</span>
                </a>
            </li>
            <li class="kt-menu__item {{ Request::path() === 'courses'? 'kt-menu__item--active': '' }}" aria-haspopup="true">
                <a href="/courses" class="kt-menu__link">
                    <i class="kt-menu__link-icon flaticon2-user"></i>
                    <span class="kt-menu__link-text">Courses</span>
                </a>
            </li>
            @endif





        </ul>
    </div>
</div>

<!-- end:: Aside Menu -->