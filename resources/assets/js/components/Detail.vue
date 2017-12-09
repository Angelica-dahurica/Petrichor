<template>
    <div class="picture-detail">
        <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal">
            <el-menu-item index="1">图片详情</el-menu-item>
        </el-menu>
        <div class="detail-block">
            <div class="picture">
                <img width=auto :src="picture.picture_content"/>
            </div>
            <div class="picture-info">
                <div class="picture-name">图片名称：{{ picture.picture_name }}</div>
                <div class="picture-description">图片描述：{{ picture.picture_description }}</div>
                <div class="picture-content">来源：{{ picture.picture_content }}</div>
                <div class="picture-publishtime">发布时间：{{ picture.picture_publishtime }}</div>
                <div class="picture-tags">图片标签：{{ picture.picture_tags }}</div>
            </div>
        </div>
    </div>
</template>

<script type="text/ecmascript-6">
    export default {
        data () {
            return {
                picture: {},
                activeIndex: '1',
            }
        },
        created() {
            this.$http.get('/pictureid=' + this.$route.params.id).then((response) => {
                response = response.body;
                this.picture = response.data;
            });
        }
    }
</script>

<style lang="stylus" rel="stylesheet/stylus">
    .picture-detail
        margin 0
        .detail-block
            margin 0
            .picture
                display inline-block
                margin 30px 30px
            .picture-info
                display inline-block
                font-size 14px
                margin-left 30px
                .picture-name
                    margin 10px 30px 10px 20px
                .picture-description
                    margin 0 30px 10px 20px
                .picture-content
                    margin 0 30px 10px 20px
                .picture-publishtime
                    margin 0 30px 10px 20px
                .picture-tags
                    margin 0 30px 10px 20px
</style>
