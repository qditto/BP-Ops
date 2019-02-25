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
                    <li class="nav-heading">Users</li>
                    <router-link tag="li" exact-active-class="active" :to="{path: '/users'}">
                        <a :title="'View Users'"><span>View Users</span></a>
                    </router-link>
                    <router-link tag="li" exact-active-class="active" :to="{path: '/roles'}">
                        <a :title="'View Roles'"><span>View Roles</span></a>
                    </router-link>
                    <router-link tag="li" exact-active-class="active" :to="{path: '/permissions'}">
                        <a :title="'View Permissions'"><span>View Permissions</span></a>
                    </router-link>
                </ul>
            </nav>
        </div>
    </aside>
</template>

<script>
    import store from '../../store'

    export default {
        name: "SideNav",
        data(){
            return{
                can: store.getters.getUserCan
            }
        }
    }
</script>

<style scoped>

</style>
