<template>
    <header class="topnavbar-wrapper">
        <!-- START Top Navbar-->
        <nav class="navbar topnavbar">
            <!-- START navbar header-->
            <div class="navbar-header">
                <a class="navbar-brand" href="#/">
                    <div class="brand-logo">
                        <img class="img-fluid" src="img/logos/jumpsix-logo_white.png" alt="App Logo">
                    </div>
                    <div class="brand-logo-collapsed">
                        <img class="img-fluid" src="img/logos/triangle_logo_white_sm.png" alt="App Logo">
                    </div>
                </a>
            </div>
            <!-- END navbar header-->
            <!-- START Left navbar-->
            <ul class="navbar-nav mr-auto flex-row">


            </ul>
            <!-- END Left navbar-->
            <!-- START Right Navbar-->
            <ul class="navbar-nav flex-row">
                <!-- Search icon-->
                <li class="nav-item">
                    <a class="nav-link" href="#" data-search-open="">
                        <em class="icon-magnifier"></em>
                    </a>
                </li>

                <b-nav-item-dropdown class="dropdown-list" no-caret menuClass="animated flipInX" right>
                    <template slot="button-content">
                        <em class="icon-user"></em>
                    </template>
                    <b-dropdown-item>
                        <div class="item user-block">
                            <!-- User picture-->
                            <div class="user-block-picture">
                                <div class="user-block-status">
                                    <img class="img-thumbnail rounded-circle" :src="user_avatar" alt="Avatar" width="60" height="60">
                                    <div class="circle bg-success circle-lg"></div>
                                </div>
                            </div>
                            <!-- Name and Job-->
                            <div class="user-block-info">
                                <span class="user-block-name" v-text="user_full_name"></span>
                                <span class="user-block-role">{{user_role | capitalize}}</span>
                            </div>
                        </div>
                    </b-dropdown-item>
                </b-nav-item-dropdown>
                    <!-- START Alert menu-->
                    <b-nav-item-dropdown class="dropdown-list" no-caret menuClass="animated flipInX" right>
                        <template slot="button-content">
                            <em class="icon-bell"></em>
                            <span class="badge badge-danger">11</span>
                        </template>
                        <b-dropdown-item>
                            <!-- START list group-->
                            <div class="list-group">
                                <!-- list item-->
                                <div class="list-group-item list-group-item-action">
                                    <div class="media">
                                        <div class="align-self-start mr-2">
                                            <em class="fab fa-twitter fa-2x text-info"></em>
                                        </div>
                                        <div class="media-body">
                                            <p class="m-0">New followers</p>
                                            <p class="m-0 text-muted text-sm">1 new follower</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- list item-->
                                <div class="list-group-item list-group-item-action">
                                    <div class="media">
                                        <div class="align-self-start mr-2">
                                            <em class="fas fa-envelope fa-2x text-warning"></em>
                                        </div>
                                        <div class="media-body">
                                            <p class="m-0">New e-mails</p>
                                            <p class="m-0 text-muted text-sm">You have 10 new emails</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- list item-->
                                <div class="list-group-item list-group-item-action">
                                    <div class="media">
                                        <div class="align-self-start mr-2">
                                            <em class="fas fa-tasks fa-2x text-success"></em>
                                        </div>
                                        <div class="media-body">
                                            <p class="m-0">Pending Tasks</p>
                                            <p class="m-0 text-muted text-sm">11 pending task</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- last list item-->
                                <div class="list-group-item list-group-item-action">
                                <span class="d-flex align-items-center">
                                    <span class="text-sm">More notifications</span>
                                    <span class="badge badge-danger ml-auto">14</span>
                                </span>
                                </div>
                            </div>
                            <!-- END list group-->
                        </b-dropdown-item>
                    </b-nav-item-dropdown>
                    <!-- END Alert menu-->

            </ul>
            <!-- END Right Navbar-->
            <HeaderSearch/>
        </nav>
        <!-- END Top Navbar-->
    </header>
</template>

<script>
    import HeaderSearch from './HeaderSearch'
    import ToggleFullscreen from '../Common/ToggleFullscreen'
    export default {
        name: 'Header',
        data(){
            return{
                user_avatar: this.$store.getters.getUser.avatar,
                user_full_name: this.$store.getters.getUser.name,
                user_role : this.$store.getters.getUser.role
            }
        },
        components: {
            HeaderSearch,
            ToggleFullscreen
        },
        methods: {

        }
    }
</script>
