<template>
    <div class="home-page">
        <div class="main-page">
            <div class="title">petrichor</div>
            <div class="description">the earthy scent produced when rain falls on dry soil</div>
            <div class="description">a website for social</div>
            <div class="search">
                <el-input class="input" placeholder="请输入内容"></el-input>
                <el-button class="button" type="primary" icon="el-icon-search">搜索</el-button>
            </div>
        </div>
    </div>
</template>

<script type="text/ecmascript-6">
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
            .title
                font-size 60px
                padding-top 100px
            .description
                font-size 20px
                margin-top 20px
            .search
                margin 40px auto
                line-height 20px
                width 350px
                .input
                    width 250px
                .button
                    width 76px
</style>
