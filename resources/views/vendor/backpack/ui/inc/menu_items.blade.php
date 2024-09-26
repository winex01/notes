{{-- This file is used for menu items by any Backpack v6 theme --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i>
        {{ trans('backpack::base.dashboard') }}</a></li>

<x-backpack::menu-item title="Notes" icon="la la-book" :link="backpack_url('note')" />
<x-backpack::menu-item title='Backups' icon='la la-hdd-o' :link="backpack_url('backup')" />

{{-- <x-backpack::menu-dropdown title="Add-ons" icon="la la-puzzle-piece">
    <x-backpack::menu-dropdown-header title="Authentication" />
    <x-backpack::menu-dropdown-item title="Users" icon="la la-user" :link="backpack_url('user')" />
    <x-backpack::menu-dropdown-item title="Roles" icon="la la-group" :link="backpack_url('role')" />
    <x-backpack::menu-dropdown-item title="Permissions" icon="la la-key" :link="backpack_url('permission')" />
    <x-backpack::menu-dropdown-header title="Tools / Etc..." />
    <x-backpack::menu-dropdown-item title='Backups' icon='la la-hdd-o' :link="backpack_url('backup')" />
    <x-backpack::menu-dropdown-item :title="trans('backpack::crud.file_manager')" icon="la la-files-o" :link="backpack_url('elfinder')" />
</x-backpack::menu-dropdown> --}}
