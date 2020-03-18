<template>
    <div class="Disease">
        <div class="row">
            <div class="col-lg-4">
                <div class="card-box">
                    <h4 class="text-dark header-title m-t-0 m-b-30">Disease</h4>

                    <div class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Name</label>
                            <div class="col-md-9">
                                <input type="text" v-model="name" class="form-control" placeholder="Disease Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Disease Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" v-model="DiseaseDsc" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-9 text-right">
                                <button @click="addDisease()" type="button" class="btn btn-primary btn-rounded waves-effect waves-light">ADD</button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card-box">
                    <h4 class="text-dark header-title m-t-0">Disease Table</h4>
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
                                        <tr v-for="(data,index) in DiseaseInfo">
                                            <th scope="row">{{index+1}}</th>
                                            <td>{{data.name}}</td>
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
        name: "DiseaseComponent",
        data(){
            return{
                name:'',
                DiseaseDsc:'',
                DiseaseInfo:[],
                SuccessAlert:'',
                DeleteAlert:'',
            }
        },
        mounted() {
            this.getData();
        },
        methods:{
            addDisease(){
                axios.post('/admin/data/add/disease', {
                    name: this.name,
                    Disease: this.DiseaseDsc
                })
                    .then((response)=>{
                        this.DeleteAlert='',
                        this.name='';
                        this.DiseaseDsc='';
                        this.DiseaseInfo=this.getData();
                        this.SuccessAlert=response.data.Success;
                        console.log('insert')
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            getData(){
                axios.get('/admin/data/get/disease')
                    .then((response)=>{

                        this.DiseaseInfo=response.data.diseaseGet;
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
                axios.get('/admin/data/disease/delete/'+id)
                    .then((response)=>{
                        this.DeleteAlert=response.data.delete;
                        this.DiseaseInfo=this.getData();
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
