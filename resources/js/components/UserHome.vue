<template>
    <div class="mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <div class="card">
                        <div class="card-header">
                            <button @click="logout" class="btn btn-success">Logout</button>
                        </div>
                        <div class="card-body">
                            <h3>You are in User Home</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    methods:{
        logout(){
            axios.get('/api/logout',{
                headers:{
                    Authorization: localStorage.getItem('user_token')
                }
            })
            .then((res) => {
                localStorage.removeItem('user_token')
                this.$router.push('/login')
                Toast.fire({
                    icon: 'success',
                    title: 'Logout In successfully.!'
                  })
            })

        }
    }
}
</script>