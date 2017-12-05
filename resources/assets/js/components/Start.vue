<template>
    <div class="home-page">
        <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal">
            <router-link to="/homepage"><el-menu-item index="1">首页</el-menu-item></router-link>
            <router-link to="/find"><el-menu-item index="2">发现</el-menu-item></router-link>
            <router-link to="/choice"><el-menu-item index="3">精选</el-menu-item></router-link>
            <el-menu-item index="4">我的</el-menu-item>
        </el-menu>
        <div class="main-page" v-if="tag">
            <div class="sign">
                <router-link to="/signin" class="home-sign-in">登录</router-link>
                <router-link to="/signup" class="home-sign-up">注册</router-link>
            </div>
            <div class="title">petrichor</div>
            <div class="description">the earthy scent produced when rain falls on dry soil</div>
            <div class="description">a website for social</div>
            <el-input icon="search" v-model="input" :on-icon-click="handleIconClick"></el-input>
        </div>
        <div class="picture-list" v-else>
            <div class="picture" v-model="pictures" v-for="picture in pictures">
                <img height="280px" :src=picture.picture_content>
            </div>
        </div>
    </div>
</template>

<script type="text/ecmascript-6">
    export default {
        data () {
            return {
                tag: true,
                input: '',
                pictures: [],
                activeIndex: '1',
            }
        },
        methods: {
            handleIconClick (ev) {
                this.$http.get('/pictures/description=' + this.input).then((response) => {
                    response = response.body;
                    this.pictures = response.data
                });
                this.tag = false;
            },
            handleSelect(key, keyPath) {
                this.tag = true;
                this.input = '';
            }
        }
    }
</script>

<style lang="stylus" rel="stylesheet/stylus">
    .home-page
        margin 0
        .el-menu
            background-color #F4F8DF
        .main-page
            margin 0
            text-align center
            font-family "Buxton Sketch"
            height 599px
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
        .picture-list
            background-image none!important
            padding 30px 20px
            .picture
                display inline-block
                margin 10px 10px
                height 280px
                border-radius 5px
                overflow hidden
                .img
                    margin 0
</style>
