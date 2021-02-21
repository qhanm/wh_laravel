@php
    /** @var \App\Models\Accounts\Role $role */
    $role = session()->get('user_role');
@endphp

@if($role->level > 5)
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <ul class="sidebar-menu" data-widget="tree">
                <li>
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Clients</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Suppliers</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="fa fa-users"></i>
                        <span>Customers</span>
                    </a>
                </li>
            </ul>
        </section>
    </aside>
@endif
