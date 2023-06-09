<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item" dir="rtl">
            <a class="nav-link collapsed" href="{{ route('index') }}">
                <i class="bi bi-diagram-2"></i>
                <span class="p-1" style="font-size: 22px">الموقع</span>
            </a>
        </li>

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
        </li>

        <li class="nav-item" dir="rtl">
            <a class="nav-link collapsed" href="{{ route('admin.site_content.edit') }}">
                <i class="bi bi-pencil-square"></i>
                <span class="p-1" style="font-size: 22px">محتوى الموقع</span>
            </a>
        </li>

        <li class="nav-item" dir="rtl">
            <a class="nav-link collapsed" href="{{ route('admin.email.index') }}">
                <i class="bi bi-envelope-fill"></i>
                <span class="p-1" style="font-size: 22px">البريد الوارد</span>
            </a>
        </li>

        <li class="nav-item" dir="rtl">
            <a class="nav-link collapsed" href="{{ route('admin.orders.index') }}">
                <i class="bi bi-receipt"></i>
                <span class="p-1" style="font-size: 22px">الطلبات</span>
            </a>
        </li>

        <li class="nav-item" dir="rtl">
            <a class="nav-link collapsed" href="{{ route('admin.shipping.index') }}">
                <i class="bi bi-receipt"></i>
                <span class="p-1" style="font-size: 22px">البلدان المخدمة</span>
            </a>
        </li>

        @if(auth()->user() && auth()->user()->hasRole('super-admin'))
            <li class="nav-item" dir="rtl">
                <a class="nav-link collapsed" href="{{ route('admin.admins') }}">
                    <i class="bi bi-person"></i>
                    <span class="p-1" style="font-size: 22px">admins</span>
                </a>
            </li>
        @endif

        <li class="nav-item" dir="rtl">
            <a class="nav-link collapsed" href="{{ route('admin.admin.logout') }}">
                <i class="bi bi-escape"></i>
                <span class="p-1" style="font-size: 22px">تسجيل خروج</span>
            </a>
        </li>


    </ul>

</aside><!-- End Sidebar-->
