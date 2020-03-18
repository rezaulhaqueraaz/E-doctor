<template>
   <div class="prescription-area">
       <div class="row">
           <div class="col-md-12">
               <div class="card-box">
                   <h4 class="text-dark header-title m-t-0">Total Revenue</h4>

                   <div class="row">
                       <div class="col-md-12">
                           <div class="form-inline">
                               <div class="form-group m-r-10">
                                   <label for="exampleInputName2">Name</label>
                                   <input type="text" class="form-control" id="exampleInputName2" placeholder="Name">
                               </div>
                               <div class="form-group m-r-10">
                                   <label for="Age">Age</label>
                                   <input type="text" class="form-control" id="Age" placeholder="age">
                               </div>
                               <div class="form-group m-r-10">
                                   <label for="sex">Sex</label>
                                   <div class="radio radio-info radio-inline">
                                       <input type="radio" id="sex" value="Male" name="radioInline" checked="">
                                       <label for="sex">Male</label>
                                   </div>
                                   <div class="radio radio-inline">
                                       <input type="radio" id="inlineRadio2" value="Female" name="radioInline">
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
                                   <input type="text" class="form-control" id="height" placeholder="Height">
                               </div>
                               <div class="form-group m-r-10">
                                   <label for="wight">Weight</label>
                                   <input type="text" class="form-control" id="wight" placeholder="Weight">
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
       <div class="row">
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
                               <div class="form-group col-md-2">
                                   <label for="selectFVC">Select</label>
                                   <select v-model="medicineRow.selectFVC"  class="form-control" id="selectFVC" data-style="btn-white">
                                       <option value="Tab">Tablet</option>
                                       <option value="Cap">Capsul</option>
                                       <option value="Ointment">Ointment</option>
                                       <option value="Spray">Spray</option>
                                       <option value="Lotion">Lotion</option>
                                       <option value="Gel">Gel</option>
                                   </select>
                               </div>
                               <div class="form-group col-md-3">
                                   <label for="inputEmail4">Medicine Name</label>
                                   <input v-model="medicineRow.name"  type="text" class="form-control" id="inputEmail4" placeholder="Name">
                               </div>
                               <div class="form-group col-md-2">
                                   <label for="mg/ml">mg/ml</label>
                                   <input v-model="medicineRow.MG"   type="text" class="form-control" id="mg/ml" placeholder="mg/ml">
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
                               <div class="form-group col-md-2">
                                   <label for="inputPassword4">duration</label>
                                   <input type="text" v-model="medicineRow.duration"   class="form-control" placeholder="duration" id="du">
                               </div>
                               <div class="form-group col-md-3">
                                   <label for="inputPassword4">Day/Month</label>
                                   <div class="btn-group m-b-20">
                                       <div class="radio radio-info radio-inline">
                                           <input type="radio" v-model="medicineRow.day"  id="day" value="দিন" name="daymonth" checked="">
                                           <label for="day">দিন</label>
                                       </div>
                                       <div class="radio radio-info radio-inline">
                                           <input type="radio" v-model="medicineRow.month"   id="month" value="মাস" name="daymonth" checked="">
                                           <label for="month">মাস</label>
                                       </div>
                                   </div>
                               </div>
                               <div class="form-group col-md-3">
                                   <label for="dd">খাবারের.....</label>
                                   <br>
                                   <div class="btn-group m-b-20">
                                       <div class="radio radio-info radio-inline">
                                           <input type="radio" v-model="medicineRow.before"  id="dd" value="খাবারের আগে" name="meal" checked="">
                                           <label for="dd">আগে</label>
                                       </div>
                                       <div class="radio radio-info radio-inline">
                                           <input type="radio" v-model="medicineRow.after"   id="am" value="খাবারের পর" name="meal" checked="">
                                           <label for="am">পর</label>
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
                       </div>
                       <div class="col-md-8">
                           <div contenteditable="true" >
                               <p v-for=" data in medicinePres" v-text="data.name"></p>
                           </div>
<!--                           <textarea id="elm1" name="area">-->
<!--                           </textarea>-->
                       </div>
                       <div class="col-md-4">
                           <ul>

                           </ul>
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
        data(){
          return{
              selectDise:'',
              DiseaseInfo:[],
              finalDisease:[],
              cc:'',
              OE:'',
              selectExam:'',
              examInfo:[],
              examfinal:[],
              medicineRow:{},
              medicinePres:[],
          }
        },
        mounted() {
            this.getDiseasData();
            this.getExam();
        },
        methods:{
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
            }
        }
    }
</script>

<style scoped>
li{
    list-style: none;
}
</style>
