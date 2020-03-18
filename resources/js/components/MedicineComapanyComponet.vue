<template>
    <div class="medicine-company">
        <div class="row">
            <div class="col-lg-4">
                <div class="card-box">
                    <h4 class="text-dark header-title m-t-0 m-b-30">Add Medicine Company</h4>

                    <div class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Name</label>
                            <div class="col-md-9">
                                <input type="text" v-model="name" class="form-control" placeholder="Company Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Company Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" v-model="CompanyDesc" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-9 text-right">
                                <button @click="addcompany()" type="button" class="btn btn-primary btn-rounded waves-effect waves-light">ADD</button>
                            </div>
                        </div>


                    </div>
                </div>

            </div>

            <div class="col-lg-8">
                <div class="card-box">
                    <h4 class="text-dark header-title m-t-0">Sales Analytics</h4>
                    <div class="text-center">
                        <ul class="list-inline chart-detail-list">
                            <li>
                                <h5 class="text-success">{{SuccessAlert}}</h5>
                                <h5 class="text-success">{{DeleteAlert}}</h5>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <div class="table-responsive " >
                                    <table class="table table-hover table-striped scrollspy-example" data-spy="scroll" data-offset="0">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Action</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(data,index) in CompanyInfo">
                                            <th scope="row">{{index+1}}</th>
                                            <td>{{data.CompanyName}}</td>
                                            <td>
                                               <a href=""><span class="badge badge-primary"><i class="ion-compose"></i></span></a>

                                               <a class=" waves-effect waves-light" href="javascript:;" @click="deleteconfirm(data.id)"><span class="badge badge-danger">x</span></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</template>

<script>
    export default {
        name: "MedicineComapanyComponet",
        data(){
           return{
               name:'',
               CompanyDesc:'',
               SuccessAlert:'',
               DeleteAlert:'',
               CompanyInfo:[],
           }
        },
        mounted() {
            this.getData();
        },
        methods:{
            addcompany(){
                axios.post('/admin/data/add/company', {
                    name: this.name,
                    CompanyDesc: this.CompanyDesc
                })
                    .then((response)=>{
                        this.DeleteAlert='',
                        this.name='';
                        this.CompanyDesc='';
                        this.CompanyInfo=this.getData();
                        this.SuccessAlert=response.data.Success;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            getData(){
                axios.get('/admin/data/get/company')
                    .then((response)=>{
                        // handle success
                       this.name='';
                        this.CompanyDesc='';
                        this.CompanyInfo=response.data.dataCompany;
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });
            },
            deleteconfirm(id){
                axios.get('/admin/data/company/delete/'+id)
                    .then((response)=>{
                        this.DeleteAlert=response.data.delete;
                        this.CompanyInfo=this.getData();
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    });
            },


        }
    }
</script>

<style scoped>

</style>
