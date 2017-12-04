<template>
    <div class="sign-in">
        <div class="title">petrichor</div>
        <div class="sign-body">
            <el-form :model="signInForm" :rules="signInRules" ref="signInForm" class="sign-in-form">
                <el-form-item prop="username" >
                    <el-input placeholder="用户名" v-model="signInForm.username" ></el-input>
                </el-form-item>
                <el-form-item prop="pass">
                    <el-input placeholder="密码" type="password" v-model="signInForm.pass"></el-input>
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="submitForm('signInForm')">登录</el-button>
                    <el-button @click="jumpTo('/signup')">注册</el-button>
                </el-form-item>
        </el-form>
        </div>
    </div>
</template>

<script type="text/ecmascript-6">
    export default {
        mounted () {
        },
        data () {
            const checkUsername = (rule, value, callback) => {
                if (!value) {
                    return callback(new Error('请输入用户名'))
                }
                setTimeout(() => {
                    if (value.length < 1 || value.length > 10) {
                        callback(new Error('用户名长度必须在1和10之间！'))
                    } else {
                        callback()
                    }
                }, 1000)
            };
            const validatePass = (rule, value, callback) => {
                if (value === '') {
                    callback(new Error('请输入密码'))
                } else {
                    callback()
                }
            };
            return {
                signInForm: {
                    pass: '',
                    username: ''
                },
                signInRules: {
                    pass: [
                        { validator: validatePass, trigger: 'blur' }
                    ],
                    username: [
                        { validator: checkUsername, trigger: 'blur' }
                    ]
                }
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
                        this.$http.post(this.$store.state.server + 'api/user/signin', {name: this.signInForm.username, pwd: this.signInForm.pass}, {emulateJSON: true}).then(response => {
                            console.log(response.status);
                            if (response.status === 201) {
                                this.showMessage('登陆成功！');
                                const token = response.data.token;
                                window.localStorage.setItem('token', token);
                                console.log(window.localStorage.getItem('token'));
                                this.jumpTo('/homepage')
                            }
                        }).catch(response => {
                            if (response.status === 401) {
                                this.showMessage('密码错误！')
                            } else {
                                this.showMessage('登陆失败！错误代码：' + response.status)
                            }
                        });
                        return true
                    } else {
                        return false
                    }
                })
            },
            resetForm (formName) {
                this.$refs[formName].resetFields()
            },
            jumpTo (url) {
                this.$router.push(url)
            }
        }
    }
</script>

<style lang="stylus" rel="stylesheet/stylus">
    .sign-in
        font-family "Buxton Sketch"
        font-size 60px
        text-align center
        padding-top 100px
        height 599px
        background-image url("/images/home.jpg")
        opacity 0.5
        .sign-body
            opacity 1
            width: 280px
            margin: 0 auto
            .sign-in-form
                padding-top: 60px
                height 50px
                font-size 18px
                .el-input__inner
                    margin 0
                    border-radius 5px
                .el-button
                    margin 0 auto 20px auto
</style>
