<template>
    <div class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                <div class="card-header">User Login</div>

                <div class="card-body">
                    <form method="POST">
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="username" type="email" class="form-control" name="username" v-model="username" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" v-model="password" name="password" required autocomplete="current-password">

                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button @click.prevent="login" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            username:'',
            password:''
        }
    },
    methods:{
        login(){
            let data = {
                username :  this.username,
                password : this.password
            }
            
            axios.post('/api/login',data)
            .then((res) => {
                let token = res.data.token_type + ' ' + res.data.access_token

                localStorage.setItem('user_token', token);

                this.$router.push('/home')
                Toast.fire({
                    icon: 'success',
                    title: 'logied In successfully.!'
                  })
                
            }).catch(() => {
                Toast.fire({
                    icon: 'error',
                    title: 'Email Or Password Wrong!'
                  })
            })
        }
    }
}
</script>