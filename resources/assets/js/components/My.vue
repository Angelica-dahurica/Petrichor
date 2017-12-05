<template>
    <div class="my">
        <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal">
            <router-link to="/homepage"><el-menu-item index="1">首页</el-menu-item></router-link>
            <router-link to="/find"><el-menu-item index="2">发现</el-menu-item></router-link>
            <router-link to="/choice"><el-menu-item index="3">精选</el-menu-item></router-link>
            <router-link to="/my"><el-menu-item index="4">我的</el-menu-item></router-link>
        </el-menu>
        <div class="picture-list">
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
                pictures: [],
                activeIndex: '4',
            }
        },
        created(){
            this.$http.get('/picture/like').then((response) => {
                response = response.body;
                this.pictures = response.data
            });
        }
    }
</script>

<style lang="stylus" rel="stylesheet/stylus">
    .my
        margin 0
        .el-menu
            background-color #F4F8DF
        .picture-list
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
