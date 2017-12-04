<template>
    <div class="home-page">
        <div class="main-page">
            <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal">
                <router-link to="/homepage"><el-menu-item index="1">首页</el-menu-item></router-link>
                <router-link to="/find"><el-menu-item index="2">发现</el-menu-item></router-link>
                <router-link to="/choice"><el-menu-item index="3">精选</el-menu-item></router-link>
            </el-menu>
            <div class="sign">
                <router-link to="/signin" class="home-sign-in">登录</router-link>
                <router-link to="/signup" class="home-sign-up">注册</router-link>
            </div>
            <div class="title">petrichor</div>
            <div class="description">the earthy scent produced when rain falls on dry soil</div>
            <div class="description">a website for social</div>
            <router-link to="/homepage/find">
                <el-input icon="search" v-model="input" :on-icon-click="handleIconClick">
                </el-input>
            </router-link>
        </div>
    </div>
</template>

<script type="text/ecmascript-6">
    export default {
        data () {
            return {
                input: '',
                pictures: [],
                activeIndex: '1',
            }
        },
        methods: {
            handleIconClick (ev) {
                const url = this.$store.state.server + 'search/?query=' + this.input;
                this.$http.get(url).then((response) => {
                    response = response.body;
                    this.pictures = response.subjects
                })
            }
        }
    }
</script>

<style lang="stylus" rel="stylesheet/stylus">
    .home-page
        margin 0
        .main-page
            margin 0
            height 599px
            text-align center
            font-family "Buxton Sketch"
            background url("/images/home.jpg")
            .sign
                width 98%
                display flex
                padding-top 20px
                padding-right 20px
                font-size 14px
                text-align right
                .home-sign-in
                    width 97%
                .home-sign-up
                    width 3%
            .title
                font-size 60px
                padding-top 100px
            .description
                font-size 20px
                margin-top 20px
            .el-input
                width 280px
                margin-top 20px
</style>
