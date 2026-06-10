<script setup lang="ts">
import NavFooter from '@/components/NavFooter.vue';
import NavMain from '@/components/NavMain.vue';
import NavUser from '@/components/NavUser.vue';
import { Sidebar, SidebarContent, SidebarFooter, SidebarHeader, SidebarMenu, SidebarMenuButton, SidebarMenuItem } from '@/components/ui/sidebar';
import { type NavItem } from '@/types';
import { Link, usePage } from '@inertiajs/vue3';
import { BookOpen, Folder, LayoutGrid, ChartBarStacked, Laptop, MapPinHouse, Factory } from 'lucide-vue-next';
import AppLogo from './AppLogo.vue';
import { computed } from 'vue';

const mainNavItems: NavItem[] = [
    {
        title: 'Dashboard',
        url: '/dashboard',
        icon: LayoutGrid,
        roles: ['super_admin','inventory_manager','inventory_user'],
    },
    {
        title: 'Asset',
        url: '/assets',
        icon: Laptop,
        roles: ['super_admin','inventory_user'],
    },
    {
        title: 'Category',
        url: '/categories',
        icon: ChartBarStacked,
        roles: ['super_admin'],
    },
    {
        title: 'Location',
        url: '/locations',
        icon: MapPinHouse,
        roles: ['super_admin','inventory_manager'],
    },
    {
        title: 'Manufacturer',
        url: '/manufacturers',
        icon: Factory,
        roles: ['super_admin','inventory_manager'],
    },
    
];

const footerNavItems: NavItem[] = [
    {
        title: 'Github Repo',
        href: 'https://github.com/laravel/vue-starter-kit',
        icon: Folder,
    },
    {
        title: 'Documentation',
        href: 'https://laravel.com/docs/starter-kits',
        icon: BookOpen,
    },
];

const page= usePage();
const userRole = computed(() => page.props.auth?.user?.role || 'null');

const filteredNavItems = computed(() => {
    return mainNavItems.filter((item) => {
        if (!item.roles) {
            return true; // No roles means it's accessible to everyone
        }
        return item.roles.includes(userRole.value);
    })
});
</script>

<template>
    <Sidebar collapsible="icon" variant="inset">
        <SidebarHeader>
            <SidebarMenu>
                <SidebarMenuItem>
                    <SidebarMenuButton size="lg" as-child>
                        <Link :href="route('dashboard')">
                            <AppLogo />
                        </Link>
                    </SidebarMenuButton>
                </SidebarMenuItem>
            </SidebarMenu>
        </SidebarHeader>

        <SidebarContent>
            <NavMain :items="filteredNavItems" />
        </SidebarContent>

        <SidebarFooter>
            <NavFooter :items="footerNavItems" />
            <NavUser />
        </SidebarFooter>
    </Sidebar>
    <slot />
</template>