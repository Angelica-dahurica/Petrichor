<template>
    <div class="choice">
        <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal">
            <router-link to="/"><el-menu-item index="1">首页</el-menu-item></router-link>
            <router-link to="/find"><el-menu-item index="2">发现</el-menu-item></router-link>
            <router-link to="/choice"><el-menu-item index="3">精选</el-menu-item></router-link>
            <router-link to="/my"><el-menu-item index="4">我的</el-menu-item></router-link>
        </el-menu>
        <div class="picture-list">
            <div class="picture" v-model="pictures" v-for="picture in pictures">
                <img height="280px" :src=picture.picture_content>
                <div class="picture-content" @mouseenter="enter(picture.pictureid)">
                    {{ picture.picture_description }}
                    <div class="liked" v-if="isliked"><i class="el-icon-star-on"></i></div>
                    <div class="not-liked" v-else><i class="el-icon-star-off"></i></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/ecmascript-6">
    export default {
        data () {
            return {
                activeIndex: '3',
                pictures: [],
                picture: {},
                likepicture: {},
                isliked: false
            }
        },
        created () {
            this.$http.get('/pictures').then((response) => {
                response = response.body;
                this.pictures = response.data;
            })
        },
        methods: {
            enter: function($id){
                this.$http.get('/pictures/pictureid=' + $id).then((response) => {
                    this.likepicture = response.body;
                    this.isliked = this.likepicture.userid !== 0;
                });
            },
        }
    }
</script>

<style lang="stylus" rel="stylesheet/stylus">
    .choice
        background-color #F4F8DF
        .picture-list
            background-color #fff
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
                .picture-content
                    position absolute
                    height 280px
                    width 100%
                    text-align center
                    line-height 280px
                    z-index 1
                    left 0
                    top 0
                    font-size 0
                    .liked
                        position absolute
                        width 100%
                        margin 0
                        line-height 280px
                        z-index 1
                        left 0
                        top 0
                        font-size 0
                    .liked:hover {
                        position absolute
                        width 100%
                        margin 0
                        line-height 280px
                        z-index 1
                        left 40%
                        top 40%
                        font-size 20px
                    }
                    .not-liked
                        position absolute
                        width 100%
                        margin 0
                        line-height 280px
                        z-index 1
                        left 0
                        top 0
                        font-size 0
                    .not-liked:hover {
                        position absolute
                        width 100%
                        margin 0
                        line-height 280px
                        z-index 1
                        left 40%
                        top 40%
                        font-size 20px
                    }
                .picture-content:hover {
                    position absolute
                    height 280px
                    width 100%
                    text-align center
                    line-height 280px
                    z-index 1
                    left 0
                    top 0
                    font-size 20px
                    color #777777
                    background-color:rgba(211,211,211,0.5)
    }
</style>
