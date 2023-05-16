<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item" dir="rtl">
            <a class="nav-link collapsed" href="{{ route('admin.index') }}">
                <i class="bi bi-diagram-2"></i>
                <span class="p-1" style="font-size: 22px">الصفحة الرئيسية</span>
            </a>
        </li>

        <li class="nav-item" dir="rtl">
            <a class="nav-link collapsed" href="{{ route('admin.books.index') }}">
                <i class="bi bi-book"></i>
                <span class="p-1" style="font-size: 22px">الكتب</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item" dir="rtl">
            <a class="nav-link collapsed" href="{{ route('admin.site_content.edit') }}">
                <i class="bi bi-pencil-square"></i>
                <span class="p-1" style="font-size: 22px">محتوى الموقع</span>
            </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item" dir="rtl">
            <a class="nav-link collapsed" href="{{ route('admin.email.index') }}">
                <i class="bi bi-envelope-fill"></i>
                <span class="p-1" style="font-size: 22px">البريد الوارد</span>
            </a>
        </li><!-- End Contact Page Nav -->

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="{{ route('admin.contact.editPage') }}">--}}
{{--                <i class="bi bi-card-list"></i>--}}
{{--                <span>Contact</span>--}}
{{--            </a>--}}
{{--        </li><!-- End Register Page Nav -->--}}

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="{{ route('admin.subscribers') }}">--}}
{{--                <i class="bi bi-arrow-down-circle"></i>--}}
{{--                <span>Subscribed Emails</span>--}}
{{--            </a>--}}
{{--        </li><!-- End Login Page Nav -->--}}

{{--         <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="{{ route('admin.inbox') }}">--}}
{{--                <i class="bi bi-envelope"></i>--}}
{{--                <span>Inbox</span>--}}
{{--            </a>--}}
{{--        </li><!-- End Login Page Nav -->--}}

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link collapsed" href="{{ route('admin.logout') }}">--}}
{{--                <i class="bi bi-box-arrow-in-right"></i>--}}
{{--                <span>Logout</span>--}}
{{--            </a>--}}
{{--        </li><!-- End Login Page Nav -->--}}
    </ul>

</aside><!-- End Sidebar-->
