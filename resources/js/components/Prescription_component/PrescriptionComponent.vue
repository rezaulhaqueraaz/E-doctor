<template>
   <div class="prescription-area">
       <div class="row">
           <div class="row">
               <div class="col-md-12">
                   <div class="card-box">
                       <h4 class="text-dark header-title m-t-0">Total Revenue</h4>

                       <div class="row">
                           <div class="col-md-12">
                               <div class="form-inline">
                                   <div class="form-group m-r-10">
                                       <label for="exampleInputName2">Name</label>
                                       <input v-model="patientNmae" type="text" class="form-control" id="exampleInputName2" placeholder="Name">
                                   </div>
                                   <div class="form-group m-r-10">
                                       <label for="Age">Age</label>
                                       <input type="text" v-model="age" class="form-control" id="Age" placeholder="age">
                                   </div>
                                   <div class="form-group m-r-10">
                                       <label for="sex">Sex</label>
                                       <div class="radio radio-info radio-inline">
                                           <input type="radio" id="sex" v-model="sex" value="Male" name="radioInline" checked="">
                                           <label for="sex">Male</label>
                                       </div>
                                       <div class="radio radio-inline">
                                           <input type="radio" id="inlineRadio2" v-model="sex" value="Female" name="radioInline">
                                           <label for="inlineRadio2">Female</label>
                                       </div>
                                   </div>
                                   <div class="form-group m-r-10">
                                       <label for="a">Address</label>
                                       <input type="text" class="form-control" id="a" placeholder="Address">
                                   </div>

                               </div>
                           </div>
                       </div>
                       <br>
                       <div class="row">
                           <div class="col-md-12">
                               <div class="form-inline">
                                   <div class="form-group m-r-10">
                                       <label for="height">Height</label>
                                       <input v-model="height" type="text" class="form-control" id="height" placeholder="Height">
                                   </div>
                                   <div class="form-group m-r-10">
                                       <label for="wight">Weight</label>
                                       <input v-model="weight" type="text" class="form-control" id="wight" placeholder="Weight">
                                   </div>
                                   <div class="form-group m-r-10">
                                       <label for="Phone">Phone</label>
                                       <input type="text" class="form-control" id="Phone" placeholder="Phone">
                                   </div>
                               </div>
                           </div>
                       </div>
                       <br>
                       <div class="row">
                           <div class="col-md-12">
                               <div class="form-inline">
                                   <div class="form-group m-r-10">
                                       <label for="f">Father Name</label>
                                       <input type="text" class="form-control" id="f" placeholder="Father Name">
                                   </div>
                                   <div class="form-group m-r-10">
                                       <label for="m">Mother Name</label>
                                       <input type="text" class="form-control" id="m" placeholder="Mother Name">
                                   </div>
                                   <div class="form-group m-r-10">
                                       <label for="r">Reg No</label>
                                       <input type="text" class="form-control bg-inverse " style="color:#fff" id="r" placeholder="Registration Number">
                                   </div>
                               </div>
                           </div>
                       </div>

                       <!-- end row -->

                   </div>

               </div>
           </div>
           <div class="col-md-3">
               <div class="card-box">
                   <div class="form-group">
                       <label for="d">Select Disease</label>
                       <select @change="clickDesiese(selectDise)"  v-model="selectDise" class="form-control" id="d" data-style="btn-white">
                           <option   v-for="DiseaseData in DiseaseInfo" v-bind:value="DiseaseData.name">{{DiseaseData.name}}</option>
                       </select>
                       <br>
                       <ul>
                           <li v-for="(data,index) in finalDisease">{{data}}&nbsp;<span style="cursor: pointer" @click="removeFinal(index)" class="badge badge-danger">x</span></li>
                       </ul>
                   </div>
                   <div class="form-group">
                       <label for="d">C/C</label>
                       <textarea v-model="cc" class="form-control"></textarea>
                   </div>
                   <div class="form-group">
                       <label for="d">O/E</label>
                       <textarea v-model="OE" class="form-control"></textarea>
                   </div>
                   <div class="form-group">
                       <label for="i">Select Investigation</label>
                       <select @change="clickexam(selectExam)"  v-model="selectExam" class="form-control" id="i" data-style="btn-white">
                           <option  v-for="examInfData in examInfo" v-bind:value="examInfData.name">{{examInfData.name}}</option>
                       </select>
                       <br>
                       <ul>
                           <li v-for="(data,index) in examfinal">{{data}}&nbsp;<span style="cursor: pointer" @click="removeFinalexam(index)" class="badge badge-danger">x</span></li>
                       </ul>
                   </div>
               </div>
           </div>
           <div class="col-md-9">
               <div class="card-box">
                   <div class="row">
                       <div class="col-md-12">
                           <div class="form-row">
                               <div class="col-md-4">
                                   <div class="form-group">
                                       <label>Medicine Name</label>
                                       <div class="input-group m-t-10">
                                           <input type="email" v-model="medicineRow.name" v-on:keyup="queryMedicine()" id="example-input2-group2" name="example-input2-group2" class="form-control" placeholder="Name">
                                           <span class="input-group-btn">
                                                <button @click="cancel()" type="button" class="btn btn-sm waves-effect waves-light btn-danger">x</button>
                                                </span>
                                       </div>
                                       <div class="search-results">
                                           <ul>
                                               <li class="" v-for="data in queryResult" @click="clickQuerymedicine(data.MedicineName,data.type,data.Mg_ml)">{{data.type}}-{{data.MedicineName}}-{{data.Mg_ml}}</li>
                                           </ul>
                                       </div>
                                   </div>
                               </div>
                               </div>
                               <div class="form-group col-md-2">
                                   <label for="poriman">পরিমান</label>
                                   <input v-model="medicineRow.poriman"   type="text" class="form-control" id="poriman" placeholder="eg: 1">
                               </div>
                               <div class="form-group col-md-2">
                                   <label for="selectid">..</label>
                                   <select  v-model="medicineRow.cft"  class="form-control" id="selectid" data-style="btn-white">
                                       <option value="চা চামাচ" >চা চামাচ</option>
                                       <option value="ফোটা" >ফোটা</option>
                                       <option value="ট্যাবলেট" >ট্যাবলেট</option>
                                       <option value="টি" >টি</option>
                                       <option value="Vial" >Vial</option>
                                       <option value="Ample" >Ample</option>
                                   </select>
                               </div>
                               <div class="form-group col-md-2">
                                   <label for="inputPassword4">Type Dose</label>
                                   <input v-model="medicineRow.type" type="text" class="form-control" id="inputPassword4" placeholder="eg: 1-0-1">
                               </div>
                               <div class="clearfix"></div>
                               <div class="form-group col-md-2">
                                   <label for="inputPassword4">duration</label>
                                   <input type="text" v-model="medicineRow.duration"   class="form-control" placeholder="duration" id="du">
                               </div>
                               <div class="form-group col-md-3">
                                   <label for="inputPassword4">Day/Month</label>
                                   <br>
                                   <div class="btn-group m-b-20">
                                       <div class="radio radio-info radio-inline">
                                           <input type="radio" v-model="medicineRow.daymonth"  id="day" value="দিন" name="daymonth" checked="">
                                           <label for="day">দিন</label>
                                       </div>
                                       <div class="radio radio-info radio-inline">
                                           <input type="radio" v-model="medicineRow.daymonth"   id="month" value="মাস" name="daymonth" checked="">
                                           <label for="month">মাস</label>
                                       </div>
                                   </div>
                               </div>
                               <div class="form-group col-md-3">
                                   <label for="dd">খাবারের.....</label>
                                   <br>
                                   <div class="btn-group m-b-20">
                                       <div class="radio radio-info radio-inline">
                                           <input type="radio" v-model="medicineRow.meal"  id="dd" value="খাবারের পূর্বে" name="meal" checked="">
                                           <label for="dd">পূর্বে</label>
                                       </div>
                                       <div class="radio radio-info radio-inline">
                                           <input type="radio" v-model="medicineRow.meal"   id="am" value="খাবারের পরে" name="meal" checked="">
                                           <label for="am">পরে</label>
                                       </div>
                                   </div>
                               </div>
                               <div class="form-group col-md-1">
                                   <label for="inputPassword4"></label>
                                   <div class="btn-group m-b-20">
                                       <button @click="addmedicine(medicineRow)" type="button" class="btn btn-inverse waves-effect waves-light">Add</button>
                                   </div>
                               </div>
                           </div>
                       <div class="col-md-8">
                           <div class="card">
                               <div class="card-body">
                                   <ul>
                                       <li v-for=" (data,index) in medicinePres">
                                           <p>{{data.name}}&nbsp;{{data.poriman+' '}} {{data.cft}}&nbsp;&nbsp; <span style="cursor: pointer" @click="removepresmedicine(index)" class="badge badge-danger">x</span></p>
                                           <p>{{data.type}}-{{data.meal}}&nbsp;&nbsp;{{data.duration+' '}}{{data.daymonth}}</p>
                                       </li>
                                   </ul>
                               </div>
                           </div>
                       </div>
                       <div class="col-md-4">
                           <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Preview</button>
                       </div>
                       </div>
                   </div>
               </div>
           </div>
       <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
           <div class="modal-dialog modal-lg">
               <div class="modal-content">
                   <div class="container">
                       <div class="doctor-info-area">
                           <div class="row">
                               <div class="col-sm-4">
                                   <div class="doctor-info">
                                       <h5>Prof. Md.Ullah Rocky</h5>
                                       <p>MBBS, FCPS, MD (Pediatrics), Ph.D</p>
                                       <h5>Head, Department of Child Health</h5>
                                       <p>Southern Medical College & Hospital</p>
                                       <p>Chattogram - Bangladesh.</p>
                                   </div>
                               </div>
                               <div class="col-sm-3">

                               </div>
                               <div class="col-sm-5">
                                   <div class="doctor-chember-info text-right">
                                       <h5>Chamber</h5>
                                       <p>20 K.B. Fazlul Kader Road, Panchlish</p>
                                       <p>Infornt of Chattogram Medical College & Hospital</p>
                                       <p>Chattogram - Bangladesh.</p>
                                       <h6>Morning Schedule</h6>
                                       <p>Visiting Day : Sunday, Tuesday & Thursday</p>
                                       <p>Visiting Time : (11:00am to 01:00pm)</p>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="patient-prescription-area">
                           <div class="row">
                               <div class="col-sm-4" style="border-right:1px solid #000;">
                                   <div class="patient-info">
                                       <p>Name:&nbsp;{{patientNmae}}</p>
                                       <p>Age:&nbsp;{{age}}</p>
                                       <p>Sex:&nbsp;{{sex}}</p>
                                       <p>Height:&nbsp;{{height}}</p>
                                       <p>Weight:&nbsp;{{weight}}</p>
                                   </div>
                                   <hr>
                                   <div class="patient-Disease">
                                       <h5 class="text-center">Disease</h5>
                                       <p v-for="data in finalDisease">{{data}}</p>
                                   </div>
                                   <hr>
                                   <div class="patient-cc">
                                       <h5 class="text-center">C/C</h5>
                                       <p>{{cc}}</p>
                                   </div>
                                   <hr>
                                   <div class="patient-oe">
                                       <h5 class="text-center">O/E</h5>
                                       <p>{{OE}}</p>
                                   </div>
                                   <hr>
                                   <div class="patient-Investigation">
                                       <h5 class="text-center">Investigation</h5>
                                       <p v-for="data in examfinal">{{data}}</p>
                                   </div>
                               </div>
                               <div class="col-sm-8">
                                   <div class="patient-medicine-area">
                                       <ul>
                                           <li v-for=" (data,index) in medicinePres">
                                               <p><strong>{{data.name}}&nbsp;{{data.poriman+' '}} {{data.cft}}&nbsp;</strong></p>
                                               <p>{{data.type}}-{{data.meal}}&nbsp;&nbsp;{{data.duration+' '}}{{data.daymonth}}</p>
                                           </li>
                                       </ul>
                                   </div>
                                   <div class="patient-advice">
                                       <h6>উপদেশ:</h6>
                                       <ul>
                                           <li><p>জ্বর না কামা পর্যন্ত,কাশি শ্বাসকষ্ট দেখা দেবার সাথে সাথে</p></li>
                                       </ul>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="prescription-footer text-right">
                           <p>১ মাস পর আবার আসবেন</p>
                       </div>
                   </div>
               </div>
           </div>
       </div>
           </div>

</template>

<script>
    export default {
        name: "PrescriptionComponent",
        comments:{

        },
        data(){
          return{

              patientNmae:'',
              height:'',
              weight:'',
              sex:'',
              age:'',
              selectDise:'',
              DiseaseInfo:[],
              finalDisease:[],
              cc:'',
              OE:'',
              selectExam:'',
              examInfo:[],
              examfinal:[],
              medicineRow:{
                  name:'',
              },
              medicinePres:[],
              test:'',
              queryResult:[],
          }
        },
        mounted() {
            this.getDiseasData();
            this.getExam();
        },
        methods:{
            cancel(){
                this.queryResult=[]
            },
            clickQuerymedicine(name,type,mg){
              this.medicineRow.name=type+'-'+name+' '+mg;
              this.queryResult=[]
            },
            queryMedicine(){
                axios.post('/admin/query/medicine/query', {
                    name: this.medicineRow.name,
                })
                    .then((response)=>{
                            this.queryResult=response.data.s
                    })
                    .catch(function (error) {
                        console.log(error);
                    });
            },

            getDiseasData(){
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
            clickDesiese(selectDise){
                this.finalDisease.push(selectDise);
            },
            removeFinal(index){
                this.finalDisease.splice(index,1);
            },
            getExam(){
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
            clickexam(selectExam){
                this.examfinal.push(selectExam);
            },
            removeFinalexam(index){
                this.examfinal.splice(index,1);
            },
            addmedicine(medicineRow){
                this.medicinePres.push(medicineRow);
                this.cleanmedicine();
            },
            cleanmedicine(){
                this.medicineRow={};
            },
            removepresmedicine(index){
                this.medicinePres.splice(index,1);
            }

        }
    }
</script>

<style scoped>
li{
    list-style: none;
}
.pres-content-area{
    width: 100%;
    padding-left: 1%;
    min-height: 150px;
}
    .ivestigation-name{
        width: 26%;
        min-height: 90px;
        border-right: 1px solid #000;
        float: left;
    }
.search-results{
    max-height: 200px;
    width: 100%;
    background-color: #fff;
    color: rgb(255, 255, 255);
    border-radius: 0px 0px 7px 7px;
    position: absolute;
    z-index: 99;
    overflow-y: auto;
}
.search-results ul li{
    list-style: none;
    padding: 5px 0px;
    width: 100%;
    padding-left: 1%;
    color: #000;
    font-size: 12px;
}
.search-results ul li:hover{
    color: #000;
    display: block;
    border-left: 1px solid #000;
    font-size: 12px;
}

.doctor-info-area{
    padding: 4% 1%;
    font-size: 12px;
}
.doctor-info{
    padding-top: 10%;
}
.doctor-chember-info{
    font-size: 12px;
}
.patient-prescription-area{
    border-top: 2px solid #000;
    padding: 2%;
}
.patient-info{
    min-height: 120px;
}
.patient-Disease{
    min-height: 120px;
}
.patient-cc{
    min-height: 120px;
}
.patient-oe{
    min-height: 120px;
}
.patient-Investigation{
    min-height: 120px;
}
.patient-medicine-area{
    padding: 1% 4%;
}
.patient-medicine-area li{
    padding: 2% 4%;
}
.prescription-footer{
    border-top: 1px solid #000;
    min-height: 20px;
    border-bottom: 1px solid #000;
    margin-bottom: 10px;
    padding: 1%;
}
li{
    list-style: none;
}


</style>
