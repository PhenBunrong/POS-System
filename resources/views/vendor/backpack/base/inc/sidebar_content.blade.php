<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
<li class='nav-item'><a class='nav-link' href='{{ url('/home') }}'><i class="nav-icon lab la-accusoft"></i> Sale POS</a></li>

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('brand') }}'><i class="nav-icon la la-newspaper-o"></i> {{ trans('backpack::base.brand') }}</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('product') }}'><i class="nav-icon las la-wallet"></i> {{ trans('backpack::base.product') }}</a></li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-list"></i> Management</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('main-category') }}'><i class="nav-icon la la-circle"></i> Main categories</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('category') }}'><i class="nav-icon la la-circle"></i> Categories</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('sub-category') }}'><i class="nav-icon la la-circle"></i> Sub categories</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('color') }}'><i class="nav-icon la la-circle"></i> Colors</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('size') }}'><i class="nav-icon la la-circle"></i> Sizes</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('unit') }}'><i class="nav-icon la la-circle"></i> Units</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('status') }}'><i class="nav-icon la la-circle"></i> Statuses</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('writer') }}'><i class="nav-icon la la-circle"></i> Writers</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('publication') }}'><i class="nav-icon la la-circle"></i> Publications</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('vendor') }}'><i class='nav-icon la la-circle'></i> Vendors</a></li>
    </ul>
</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('supplier') }}'><i class="nav-icon las la-warehouse"></i> Suppliers</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('purchase') }}'><i class="nav-icon las la-shopping-bag"></i> Purchases</a></li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon las la-exclamation-circle"></i> Report</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('purchase/export') }}'><i class='nav-icon la la-circle'></i> Export</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('order') }}'><i class='nav-icon la la-circle'></i> Import</a></li>     
    </ul>
</li>
{{-- @role('superadmin') --}}
<li class="nav-title" style="font-size: 14px; text-transform: uppercase; background: whitesmoke;">USER ROLE</li>
<!-- Users, Roles, Permissions -->
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
    <ul class="nav-dropdown-items">
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
        <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('log-user') }}'><i class='nav-icon la la-history'></i> Log User Activity</a></li>
    </ul>
</li>
<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-user"></i> {{ trans('backpack::base.customers') }}</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('customer') }}'><i class='nav-icon la la-circle'></i> {{ trans('backpack::base.customers') }}</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('company') }}'><i class="nav-icon las la-circle"></i> {{ trans('backpack::base.companies') }}</a></li>            
    </ul>
</li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('member') }}'><i class='nav-icon la la-users'></i> {{ trans('backpack::base.member') }}</a></li>

<li class="nav-title" style="font-size: 14px; text-transform: uppercase; background: whitesmoke;"> SETTINGS</li>
{{-- <li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-globe"></i> Translations</a>
    <ul class="nav-dropdown-items">
      <li class="nav-item"><a class="nav-link" href="{{ backpack_url('language') }}"><i class="nav-icon la la-flag-checkered"></i> Languages</a></li>
      <li class="nav-item"><a class="nav-link" href="{{ backpack_url('language/texts') }}"><i class="nav-icon la la-language"></i> Site texts</a></li>
    </ul>
</li> --}}
{{-- <li class='nav-item'><a class='nav-link' href='{{ backpack_url('user') }}'><i class='nav-icon la la-user'></i> Users</a></li> --}}

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('elfinder') }}"><i class="nav-icon la la-files-o"></i> <span>{{ trans('backpack::crud.file_manager') }}</span></a></li>


<li class='nav-item'><a class='nav-link' href='{{ backpack_url('setting') }}'><i class='nav-icon la la-cog'></i> <span>Settings</span></a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('backup') }}'><i class='nav-icon la la-hdd-o'></i> Backups</a></li>
{{-- @endrole --}}
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('test') }}'><i class='nav-icon la la-question'></i> Saving</a></li>

<li class="nav-item nav-dropdown">
    <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-cog"></i> APIs</a>
    <ul class="nav-dropdown-items">
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('staff') }}'><i class='nav-icon la la-question'></i> Staff</a></li>
        <li class='nav-item'><a class='nav-link' href='{{ backpack_url('teacher') }}'><i class='nav-icon la la-question'></i> Teachers</a></li>
    </ul>
</li>
