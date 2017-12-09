<template>
    <div class="home-page">
        <div class="main-page" v-if="tag">
            <div class="not-signed-in" v-if="notsignedin">
                <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal" @select="handleSelect">
                    <router-link to="/"><el-menu-item index="1" @click="handleSignIn">首页</el-menu-item></router-link>
                    <router-link to="/find"><el-menu-item index="2">发现</el-menu-item></router-link>
                    <router-link to="/choice"><el-menu-item index="3">精选</el-menu-item></router-link>
                    <router-link to="/"><el-menu-item index="4">我的</el-menu-item></router-link>
                </el-menu>
                <div class="sign">
                    <router-link to="/signin" class="home-sign-in">登录</router-link>
                    <router-link to="/signup" class="home-sign-up">注册</router-link>
                </div>
            </div>
            <div class="signed-in" v-else>
                <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal" @select="handleSelect">
                    <router-link to="/"><el-menu-item index="1" @click="handleSignIn">首页</el-menu-item></router-link>
                    <router-link to="/find"><el-menu-item index="2">发现</el-menu-item></router-link>
                    <router-link to="/choice"><el-menu-item index="3">精选</el-menu-item></router-link>
                    <router-link to="/my"><el-menu-item index="4">我的</el-menu-item></router-link>
                </el-menu>
                <div class="sign">
                    <div class="home-sign-out" @click="handleSignOut">退出</div>
                </div>
            </div>
            <div class="title">petrichor</div>
            <div class="description">the earthy scent produced when rain falls on dry soil</div>
            <div class="description">a website for picture</div>
            <el-input icon="search" v-model="input" :on-icon-click="handleIconClick"></el-input>
        </div>
        <div class="search" v-else>
            <div v-if="notsignedin">
                <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal" @select="handleSelect">
                    <router-link to="/"><el-menu-item index="1" @click="handleSignIn">首页</el-menu-item></router-link>
                    <router-link to="/find"><el-menu-item index="2">发现</el-menu-item></router-link>
                    <router-link to="/choice"><el-menu-item index="3">精选</el-menu-item></router-link>
                    <router-link to="/"><el-menu-item index="4">我的</el-menu-item></router-link>
                </el-menu>
            </div>
            <div v-else>
                <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal" @select="handleSelect">
                    <router-link to="/"><el-menu-item index="1" @click="handleSignIn">首页</el-menu-item></router-link>
                    <router-link to="/find"><el-menu-item index="2">发现</el-menu-item></router-link>
                    <router-link to="/choice"><el-menu-item index="3">精选</el-menu-item></router-link>
                    <router-link to="/my"><el-menu-item index="4">我的</el-menu-item></router-link>
                </el-menu>
            </div>
            <div class="picture-list">
                <div class="picture" v-model="pictures" v-for="picture in pictures">
                    <img height="280px" :src=picture.picture_content>
                    <router-link :to="{name:'picture-detail',params:{id:picture.pictureid}}">
                        <div class="picture-detail"></div>
                    </router-link>
                    <div class="picture-content" @mouseenter="enter(picture.pictureid)" @click="likeThisPicture(picture.pictureid)">
                        <div class="liked" v-if="isliked"><i class="el-icon-star-on"></i></div>
                        <div class="not-liked" v-else><i class="el-icon-star-off"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/ecmascript-6">
    export default {
        data () {
            return {
                notsignedin: true,
                tag: true,
                input: '',
                pictures: [],
                likepicture: {},
                activeIndex: '1',
                isliked: false
            }
        },
        created(){
            let item = document.cookie.split(';');
            for (let i = 0; i < item.length; i++) {
                let c = item[i];
                while (c.startsWith(' '))
                    c = c.substring(1);
                if (c.startsWith('username=') && c.substring(9, c.length)){
                    this.notsignedin = false;
                    return;
                } else {
                    this.notsignedin = true;
                }
            }
        },
        methods: {
            handleIconClick () {
                this.$http.get('/pictures/description=' + this.input).then((response) => {
                    response = response.body;
                    this.pictures = response.data
                });
                this.tag = false;
            },
            handleSignOut () {
                this.notsignedin = true;
                this.setCookie("username", "", -1);
            },
            handleSignIn (ev) {
                let item = document.cookie.split(';');
                for (let i = 0; i < item.length; i++) {
                    let c = item[i];
                    while (c.startsWith(' '))
                        c = c.substring(1);
                    if (c.startsWith('username=') && c.substring(9, c.length)){
                        this.notsignedin = false;
                    }
                }
            },
            setCookie: function (cname, cvalue, exdays) {
                let d = new Date();
                d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
                let expires = "expires=" + d.toUTCString();
                document.cookie = cname + "=" + cvalue + "; " + expires;
            },
            handleSelect(key, keyPath) {
                this.tag = true;
                this.input = '';
            },
            enter: function($id){
                this.$http.get('/pictures/pictureid=' + $id).then((response) => {
                    this.likepicture = response.body;
                    this.isliked = this.likepicture.userid !== 0;
                });
            },
            likeThisPicture: function($id){
                this.$http.post('/like/picture', {
                    pictureid: $id,
                    isLiked: this.isliked
                },{
                    emulateJSON: true
                });
                this.isliked = !this.isliked;
            }
        }
    }
</script>

<style lang="stylus" rel="stylesheet/stylus">
    .home-page
        margin 0
        .main-page
            margin 0
            text-align center
            font-family "Buxton Sketch"
            height 599px
            background url("/images/home.jpg")
            .not-signed-in
                margin 0
                .sign
                    width 98%
                    display flex
                    padding-top 20px
                    padding-right 20px
                    font-size 14px
                    text-align right
                    .home-sign-in
                        width 3%
                        margin-left 90%
                    .home-sign-up
                        width 3%
                        margin-left 2%
            .signed-in
                margin 0
                .sign
                    width 98%
                    display flex
                    padding-top 20px
                    padding-right 20px
                    font-size 14px
                    text-align right
                    .home-sign-out
                        width 97%
            .title
                font-size 60px
                padding-top 100px
            .description
                font-size 20px
                margin-top 20px
            .el-input
                width 280px
                margin-top 20px
        .search
            margin 0
            .picture-list
                background-image none!important
                padding 30px 20px
                .picture
                    display inline-block
                    margin 10px 10px
                    height 280px
                    border-radius 5px
                    overflow hidden
                    position relative
                    .img
                        margin 0
                    .picture-detail
                        position absolute
                        width 90%
                        height 280px
                        z-index 1
                        left 0
                        top 0
                        font-size 0
                        .picture-content
                            position absolute
                            height 280px
                            width 10%
                            z-index 1
                            left 90%
                            top 0
                            font-size 0
                            .liked
                                position absolute
                                width 20px
                                margin 0
                                line-height 20px
                                z-index 1
                                left 0
                                top 90%
                                font-size 0
                            .liked:hover {
                                position absolute
                                width 20px
                                margin 0
                                line-height 20px
                                z-index 1
                                left 0
                                top 90%
                                font-size 20px
                            }
                            .not-liked
                                position absolute
                                width 20px
                                margin 0
                                line-height 20px
                                z-index 1
                                left 0
                                top 90%
                                font-size 0
                            .not-liked:hover {
                                position absolute
                                width 20px
                                margin 0
                                line-height 20px
                                z-index 1
                                left 0
                                top 90%
                                font-size 20px
                            }

</style>
