<template>
    <div class="exam-area">
        <div class="row">
            <div class="col-lg-4">
                <div class="card-box">
                    <h4 class="text-dark header-title m-t-0 m-b-30">Patient Exams</h4>

                    <div class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Name</label>
                            <div class="col-md-9">
                                <input type="text" v-model="name" class="form-control" placeholder="Exam Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Patient Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" v-model="ExamsDsc" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-9 text-right">
                                <button @click="addExams()" type="button" class="btn btn-primary btn-rounded waves-effect waves-light">ADD</button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card-box">
                    <h4 class="text-dark header-title m-t-0">Exam Table</h4>
                    <div class="text-center">
                        <ul class="list-inline chart-detail-list">
                            <li>
                                <h5 class="text-success">{{SuccessAlert}}</h5>
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
                                        <tr v-for="(data,index) in examInfo">
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
        name: "ExamComponent",
        data(){
            return{
                name:'',
                ExamsDsc:'',
                SuccessAlert:'',
                examInfo:[]
            }
        },
        mounted() {
            this.getData();
        },
        methods:{
            addExams(){
                axios.post('/admin/data/add/exam', {
                    name: this.name,
                    examDsc: this.ExamsDsc,
                })
                    .then((response)=>{
                        this.name='';
                        this.ExamsDsc='';
                        this.examInfo=this.getData();
                        this.SuccessAlert=response.data.Success;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            getData(){
                axios.get('/admin/data/get/exam')
                    .then((response)=>{
                        this.examInfo=response.data.examGet;
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
                axios.get('/admin/data/exam/delete/'+id)
                    .then((response)=>{
                        this.SuccessAlert=response.data.delete;
                        this.examInfo=this.getData();
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    });
            },
        },

    }
</script>

<style scoped>

</style>
