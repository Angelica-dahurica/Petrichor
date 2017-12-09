<template>
    <div class="my">
        <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal">
            <router-link to="/"><el-menu-item index="1">首页</el-menu-item></router-link>
            <router-link to="/find"><el-menu-item index="2">发现</el-menu-item></router-link>
            <router-link to="/choice"><el-menu-item index="3">精选</el-menu-item></router-link>
            <router-link to="/my"><el-menu-item index="4">我的</el-menu-item></router-link>
        </el-menu>
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
</template>

<script type="text/ecmascript-6">
    export default {
        data () {
            return {
                pictures: [],
                activeIndex: '4',
                likepicture: {},
                isliked: false
            }
        },
        created(){
            this.$http.get('/picture/like').then((response) => {
                response = response.body;
                this.pictures = response.data
            });
        },
        methods: {
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
            },
            goToDetail (id) {
                console.log(id);
                this.$router.push({
                    name: 'picture-detail', params: { id: id }})
            }
        }
    }
</script>

<style lang="stylus" rel="stylesheet/stylus">
    .my
        margin 0
        .picture-list
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
