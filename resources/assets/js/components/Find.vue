<template>
    <div class="find">
        <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal" @select="handleSelect">
            <router-link to="/homepage"><el-menu-item index="1">首页</el-menu-item></router-link>
            <router-link to="/find"><el-menu-item index="2">发现</el-menu-item></router-link>
            <router-link to="/choice"><el-menu-item index="3">精选</el-menu-item></router-link>
        </el-menu>

    </div>
</template>

<script type="text/ecmascript-6">
    export default {
        data () {
            return {
                activeIndex: '2',
            }
        },
        methods: {
            handleSelect(key, keyPath) {
                console.log(key, keyPath);
            }
        },
        props: {
            pictures: {
                type: Array
            }
        }
    }
</script>

<style lang="stylus" rel="stylesheet/stylus">
    .find
        background-color #F4F8DF
        .el-menu
            background-color #F4F8DF
            text-color #fff
</style>
