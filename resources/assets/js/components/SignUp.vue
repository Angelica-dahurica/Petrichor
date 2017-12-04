<template>
    <div class="sign-up">
        <div class="title">petrichor</div>
        <div class="sign-body">
            <el-form :model="signUpForm" :rules="signUpRules" ref="signUpForm" class="sign-up-form">
                <el-form-item prop="username" >
                    <el-input placeholder="用户名" v-model="signUpForm.username" ></el-input>
                </el-form-item>
                <el-form-item prop="pass">
                    <el-input placeholder="密码" type="password" v-model="signUpForm.pass"></el-input>
                </el-form-item>
                <el-form-item prop="checkPass">
                    <el-input placeholder="重复密码" type="password" v-model="signUpForm.checkPass"></el-input>
                </el-form-item>
                <el-form-item prop="age">
                    <el-select v-model="signUpForm.age" placeholder="年龄">
                        <el-option  v-for="item in 150"
                                    :key="item.value"
                                    :value="item"></el-option>
                    </el-select>
                </el-form-item>
                <el-form-item prop="sex">
                    <el-radio-group v-model="signUpForm.sex">
                        <el-radio :label="1">男</el-radio>
                        <el-radio :label="0">女</el-radio>
                    </el-radio-group>
                </el-form-item>
                <el-form-item prop="interest">
                    <el-checkbox-group v-model="signUpForm.interest" :min="1" :max="5">
                        <el-checkbox v-for="interest in interests" :label="interest" :key="interest">{{interest}}</el-checkbox>
                    </el-checkbox-group>
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="submitForm('signUpForm')">注册</el-button>
                    <el-button @click="jumpTo('/signin')">登录</el-button>
                </el-form-item>
            </el-form>
        </div>
    </div>
</template>

<script type="text/ecmascript-6">
    import ElFormItem from "../../../../node_modules/element-ui/packages/form/src/form-item.vue";

    const interestsOptions = [
        '人像', '城市', '旅行', '纪实',
        '街拍', '人文', '美女', '建筑', '自然',
        '秋天', '静物', '光影', '夜景', '少女',
        '儿童', '植物', '生活', '花卉', '动物',
        '校园', '私房', '风格', '夕阳', '美食'];

    export default {
        components: {ElFormItem},
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
                    if (this.signUpForm.checkPass !== '') {
                        this.$refs.signUpForm.validateField('checkPass')
                    }
                    callback()
                }
            };
            const validatePassRepeat = (rule, value, callback) => {
                if (value === '') {
                    callback(new Error('请重新输入密码'))
                } else if (value !== this.signUpForm.pass) {
                    callback(new Error('两次输入不一致！'))
                } else {
                    callback()
                }
            };
            return {
                signUpForm: {
                    pass: '',
                    checkPass: '',
                    username: '',
                    sex: '',
                    interest: [],
                    age: 0,
//                    avatar: '',
//                    signature: ''
                },
                signUpRules: {
                    pass: [
                        { validator: validatePass, trigger: 'blur' }
                    ],
                    checkPass: [
                        { validator: validatePassRepeat, trigger: 'blur' }
                    ],
                    username: [
                        { validator: checkUsername, trigger: 'blur' }
                    ]
                },
                interests: interestsOptions,
                SignUpMsg: ''
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
                         this.$http.post('/user/signup',
                            {
                                nickname: this.signUpForm.username,
                                password: this.signUpForm.pass,
                                sex: this.signUpForm.sex,
                                interest: this.signUpForm.interest.join(";"),
                                age: this.signUpForm.age,
//                                avatar: this.signUpForm.avatar,
//                                signature: this.signUpForm.signature
                            },
                            {
                                emulateJSON: true
                            })
                            .then(response => {
                                if (response.status === 200) {
                                    this.showMessage('注册成功！');
                                    setTimeout(()=>{
                                        this.$router.push('/homepage');
                                    },1000);
                                } else if (response.status === 410) {
                                    alert('创建用户失败！错误代码：410')
                                } else if(response.status === 500){
                                    alert('昵称已被注册！')
                                } else {
                                    alert('创建用户失败！错误代码：400')
                                }
                            }).catch(response => {
                                alert('出错了哦宝贝，错误代码：' + response.status)
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
    .sign-up
        font-family "Buxton Sketch"
        font-size 60px
        text-align center
        padding-top 30px
        background-image url("/images/home.jpg")
        opacity 0.5
        margin 0
        .sign-body
            margin 0 auto
            width: 280px
            .sign-up-form
                font-size 18px
                width: 280px
                .el-input__inner
                    margin 10px auto 0 auto
                    width 280px
                    border-radius 5px
                .el-button
                    margin 0 auto 40px auto
                .el-radio-group
                    width 280px
                    margin 0
                .el-select
                    width 280px
                    margin 0
                .el-checkbox-group
                    margin 0 auto
                    .el-checkbox
                        margin 0 10px
</style>
