<template>
    <div class="admin">
        <el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal">
            <el-menu-item index="1">添加图片</el-menu-item>
        </el-menu>
        <div class="picture-info">
            <el-form :model="picture" ref="picture" class="upload-form">
                <el-form-item prop="picture_name" >
                    <div class="picture-name">
                        <el-input v-model="picture.picture_name" placeholder="图片名称"></el-input>
                    </div>
                </el-form-item>
                <el-form-item prop="picture_description" >
                    <div class="picture-description">
                        <el-input type="textarea" :autosize="{ minRows: 2, maxRows: 4}" placeholder="图片描述"
                                v-model="picture.picture_description">
                        </el-input>
                    </div>
                </el-form-item>
                <el-form-item prop="picture_content" >
                    <div class="picture-content">
                        <el-input v-model="picture.picture_content" placeholder="来源"></el-input>
                    </div>
                </el-form-item>
                <el-form-item prop="picture_tags" >
                    <div class="picture-tags">
                        <el-checkbox-group v-model="picture.picture_tags" :min="1" :max="5">
                            <el-checkbox v-for="picture_tags in interests" :label="picture_tags" :key="picture_tags">{{picture_tags}}</el-checkbox>
                        </el-checkbox-group>
                    </div>
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="submitForm('picture')">上传</el-button>
                </el-form-item>
            </el-form>
        </div>
    </div>
</template>

<script type="text/ecmascript-6">
    const interestsOptions = [
        '人像', '城市', '旅行', '纪实',
        '街拍', '人文', '美女', '建筑', '自然',
        '秋天', '静物', '光影', '夜景', '少女',
        '儿童', '植物', '生活', '花卉', '动物',
        '校园', '私房', '风格', '夕阳', '美食'];

    export default {
        data() {
            return {
                picture: {
                    picture_album: 1,
                    picture_name: '',
                    picture_description: '',
                    picture_content: '',
                    picture_publishtime:  new Date(),
                    picture_tags: [],
                },
                interests: interestsOptions,
                activeIndex: '1',
            }
        },
        methods: {
            showMessage (content) {
                this.$alert(content, '', {
                    confirmButtonText: '确定',
                    callback: action => {
                        this.$message({
                            type: 'info',
                            message: `action: ${action}`
                        })
                    }
                })
            },
            submitForm (formName) {
                this.$refs[formName].validate((valid) => {
                    if (valid) {
                        this.$http.post('/picture/upload',
                            {
                                picture_album: this.picture.picture_album,
                                picture_name: this.picture.picture_name,
                                picture_description: this.picture.picture_description,
                                picture_content: this.picture.picture_content,
                                picture_publishtime: this.picture.picture_publishtime,
                                picture_tags: this.picture.picture_tags.join(";")
                            },
                            {
                                emulateJSON: true
                            })
                            .then(response => {
                                if (response.status === 200) {
                                    this.showMessage('上传成功！');
                                    this.picture = {};
                                    console.log('kkkkkk');
                                    this.$router.push('/admin');
                                } else if(response.status === 500){
                                    alert('上传失败！')
                                }
                            }).catch(response => {
                            alert('出错了哦宝贝，错误代码：' + response.status)
                        });
                        return true
                    } else {
                        return false
                    }
                })
            }
        }
    }
</script>

<style lang="stylus" rel="stylesheet/stylus">
    .admin
        margin 0
        height 599px
        .picture-info
            display inline-block
            font-size 14px
            margin-left 30px
            .upload-form
                margin 0
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
                .el-button
                      margin-left 80%
</style>
