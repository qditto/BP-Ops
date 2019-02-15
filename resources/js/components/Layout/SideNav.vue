<template>
    <aside class="aside-container">
        <div class="aside-inner">
            <nav class="sidebar" data-sidebar-anyclick-close="">
                <!-- START sidebar nav-->
                <ul class="sidebar-nav">

                    <li class="nav-heading">
                        <span>Clients</span>
                    </li>
                    <router-link tag="li" active-class="active" :to="{path: '/clients/create'}">
                        <a :title="'Create Client' "><span>Create Client</span></a>
                    </router-link>
                    <router-link tag="li" exact-active-class="active" :to="{path: '/clients'}">
                        <a :title="'View Clients'"><span>View Clients</span></a>
                    </router-link>
                    <li class="nav-heading">Products</li>
                </ul>
            </nav>
        </div>
    </aside>
</template>

<script>
    export default {
        name: "SideNav"
    }
</script>

<style scoped>

</style>
