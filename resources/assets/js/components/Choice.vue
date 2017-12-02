<template>
    <div class="choice">
        <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal" @select="handleSelect">
            <router-link to="/homepage"><el-menu-item index="1">首页</el-menu-item></router-link>
            <router-link to="/find"><el-menu-item index="2">发现</el-menu-item></router-link>
            <router-link to="/choice"><el-menu-item index="3">精选</el-menu-item></router-link>
        </el-menu>
        <div class="picture-list" v-model="pictures" v-for="picture in pictures">
            <img class="picture" :src=picture.picture_content></img>
        </div>
    </div>
</template>

<script type="text/ecmascript-6">
    export default {
        data () {
            return {
                activeIndex: '3',
                pictures: [],
                picture: {}
            }
        },
        created () {
            this.$http.get('/pictures').then((response) => {
                response = response.body;
                this.pictures = response;
            })
        },
        methods: {
            handleSelect(key, keyPath) {
                console.log(key, keyPath);
            }
        }
    }
</script>

<style lang="stylus" rel="stylesheet/stylus">
    .choice
        background-color #F4F8DF
        .el-menu
            background-color #F4F8DF
            text-color #fff
        .picture-list
            background-color #fff
            margin-top 30px
            .picture
                height 300px
                width 300px
</style>
