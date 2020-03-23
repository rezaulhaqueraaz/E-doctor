<template>
    <div class="medicine">
        <div class="row">

            <div class="col-lg-4">
                <div class="card-box">
                    <h4 class="text-dark header-title m-t-0 m-b-30">Add Medicine</h4>

                    <div class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Name</label>
                            <div class="col-md-9">
                                <input type="text" v-model="name" class="form-control" placeholder="Medicine Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="mg">MG/ML</label>
                            <div class="col-md-9">
                                <input type="text" v-model="mgml" id="mg"  class="form-control" placeholder="Mg/ml">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Medicine Type</label>
                            <div class="col-md-9">
                                <select v-model="medicineTypee" id="dsf" class="form-control">
                                    <option value="Tab">Tablet</option>
                                    <option value="Shyrup">Shyrup</option>
                                    <option value="Sus">Suspension</option>
                                    <option value="Inj">Injection</option>
                                    <option value="Drop">Drop</option>
                                    <option value="Iv">Iv</option>
                                    <option value="Cap">Capsul</option>
                                    <option value="Ointment">Ointment</option>
                                    <option value="Suppository">Suppository</option>
                                    <option value="Lotion">Lotion</option>
                                    <option value="Gel">Gel</option>
                                    <option value="Eye-Drop">Eye Drop</option>
                                    <option value="Spray">Eye Drop</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label" for="example-email">Generic Name</label>
                            <div class="col-md-9">
                                <input type="text" v-model="GenericName" id="example-email"  class="form-control" placeholder="Generic Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Company Name</label>
                            <div class="col-md-9">
                                <select v-model="CompanyNamee" id="inputState" class="form-control">
                                    <option selected>Choose...</option>
                                    <option v-for="data in CompanyInfo" v-bind:value="data.id">{{data.CompanyName}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Medicine Description</label>
                            <div class="col-md-9">
                                <textarea v-model="MedicineDesc" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-9 text-right">
                                <button @click="addmadicine()" type="button" class="btn btn-primary btn-rounded waves-effect waves-light">ADD</button>
                            </div>
                        </div>
                        <ul>
                            <li>{{medicineTypee}}-{{name}}-{{mgml}}</li>
                            <li>{{GenericName}}</li>
                            <li>{{MedicineDesc}}</li>
                        </ul>

                    </div>
                </div>

            </div>

            <div class="col-lg-8">
                <div class="card-box">
                    <h4 class="text-dark header-title m-t-0">Medicine Table</h4>
                    <div class="text-center">
                        <ul class="list-inline chart-detail-list">
                            <li>
                                <h5>{{successAlert}}</h5>
                            </li>
                        </ul>
                    </div>
                    <div class="card-box table-responsive">
                        <div class="table-responsive " >
                            <table class="table table-hover table-striped scrollspy-example" data-spy="scroll" data-offset="0">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">MG/ML</th>
                                    <th scope="col">Generic Name</th>
                                    <th scope="col">Action</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(data,index) in MedicineInfo">
                                    <th scope="row">{{index+1}}</th>
                                    <td>{{data.type}}-{{data.MedicineName}}</td>
                                    <td>{{data.Mg_ml}}</td>
                                    <td>{{data.GenericName}}</td>
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
</template>

<script>
    export default {
        name: "madicine",
        data(){
            return{
                name:'',
                GenericName:'',
                medicineTypee:'',
                mgml:'',
                CompanyNamee:'',
                MedicineDesc:'',
                CompanyInfo:[],
                MedicineInfo:[],
                successAlert:'',
            }
        },
        mounted() {
            this.getData();
            this.getMedicine();
        },
        methods:{
            addmadicine(){
                axios.post('/admin/data/add/medicine', {
                    name: this.name,
                    medicineType: this.medicineTypee,
                    mgml: this.mgml,
                    genericName: this.GenericName,
                    company: this.CompanyNamee,
                    medicineDsc: this.MedicineDesc
                })
                    .then((response)=>{
                       this.MedicineInfo=this.getMedicine();
                       this.GenericName='';
                       this.name='';
                       this.medicineTypee='',
                       this.mgml='',
                       this.MedicineDesc='';
                       this.successAlert=response.data.Success;
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },
            getData(){
                axios.get('/admin/data/get/company')
                    .then((response)=>{
                        // handle success
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
            getMedicine(){
                axios.get('/admin/data/get/medicine')
                    .then((response)=>{
                        // handle success
                        this.MedicineInfo=response.data.medicineGet;
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
                axios.get('/admin/data/medicine/delete/'+id)
                    .then((response)=>{
                        this.successAlert=response.data.delete;
                        this.MedicineInfo=this.getMedicine();
                        console.log(response.data.delete);
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
li{
    list-style: none;
}
</style>
