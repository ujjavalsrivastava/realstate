@extends('layout.back_master')
@section('title', 'EMI Calculator')
@section('content')
<!-- <form class="container">
   <p class="heading">EMI Calculator</p>
   <div class="input-container">
       <label for="amount">Loan Amount(₹)</label>
       <input type="number" id="amount" required>            
   </div>
   <div class="input-container">
       <label for="interest">Interest Rate(%)</label>
       <input type="number" id="interest" step="0.01" required>            
   </div>
   <div class="input-container loan-tenure-container">
       <label for="loanTenure">Loan Tenure</label>
       <input type="text" id="loanTenure" required>            
       <div class="radio-container">            
           <input type="radio" name="btn" id="year"><label for="year">Year</label>
           <input type="radio" name="btn" id="month"><label for="month">Month</label>
       </div>
   </div>
   <div class="submit-container">
       <input type="submit" value="Submit" id="calculate">            
   </div>
   
   <div class="output">
       <p>Loan EMI<span id="emi">₹</span></p>
       <p>Total Interest Payable<span id="totalInterest">₹</span></p>
       <p>Total Payment(Principal + Interest)<span id="totalPayment">₹</span> </p>
       
   </div>
   </form> -->
<!-- <script src="script.js"></script> -->
<!-- START SECTION SUBMIT PROPERTY -->
<section class="royal-add-property-area section_100">
   <form>
      @csrf
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <div class="single-add-property">
                  <h3>EMI Calculator</h3>
                  <div class="property-form-group">
                     <div class="row">
                        <div class="col-md-12">
                           <p>
                              <label for="amount">Loan Amount(₹)</label>
                              <input type="number" id="amount" placeholder="Enter your Amount">
                           </p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <p>
                              <label for="interest">Interest Rate(%)</label>
                              <input type="number" id="interest" step="0.01" required placeholder="Enter your Interest Rate">
                           </p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <p>
                              <label for="loanTenure">Loan Tenure</label>
                              <input type="number" id="loanTenure" required placeholder="Enter your Loan Tenure">
                           </p>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-12">
                           <input type="radio" name="btn" id="year"><label for="year">Year</label> &nbsp; &nbsp;
                           <input type="radio" name="btn" id="month"><label for="month">Month</label>
                        </div>
                     </div>
                     <br>
                     <div class="add-property-button">
                        <div class="row">
                           <div class="col-md-12">
                              <button class="btn btn-warning" type="submit" value="Submit" id="calculate" style="width: 100%;height: 100%;background: #FF385C;color: white;">  Submit  </button>
                           </div>
                        </div>
                     </div>
                     <br>
                     <div class="row">
                        <div class="col-md-12">
                           <p><b>Loan EMI</b> <span id="emi" style="color: #FF385C;"> ₹</span></p>
                           <p><b>Total Interest Payable</b> <span id="totalInterest" style="color: #FF385C;"> ₹</span></p>
                           <p><b>Total Payment(Principal + Interest)</b> <span id="totalPayment" style="color: #FF385C;"> ₹</span> </p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </form>
</section>
<!-- END SECTION SUBMIT PROPERTY -->
@endsection
@section('script')
<script>
   let loanAmount = document.getElementById("amount");
           let interestRate=document.getElementById("interest");
           let loanDuration = document.getElementById("loanTenure");
           let submit = document.getElementById("calculate");
   
           submit.addEventListener('click',(e)=>{
               e.preventDefault();
               calculateEMI();
           })
   
           function calculateEMI(){
               // First calculate total number of months in loan tenure if selected year
               let isYear = document.getElementById("year").checked;
               let isMonth = document.getElementById("month").checked;
               let noOfMonths=0;
               if(isYear=="" && isMonth==""){
                   alert("Please select loan tenure type-> Month or year");
               }else{
                   if(isYear==true){
                       noOfMonths=loanDuration.value * 12 ;
                   }else{
                       noOfMonths=loanDuration.value;
                   }
                   let r = parseFloat(interestRate.value)/12/100;
                   let P = loanAmount.value;
                   let n = noOfMonths;
                   let EMI = (P*r* Math.pow((1+r),n)) / (Math.pow((1+r),n)-1);
                   let totalInterest =(EMI * n) - P;
                   let totalPayment  = totalInterest + parseFloat(P);
                   document.getElementById("emi").innerText = "₹" + Math.round(EMI);
                   document.getElementById("totalInterest").innerText="₹" + Math.round(totalInterest);
                   document.getElementById("totalPayment").innerText="₹" + Math.round(totalPayment) ;
               }
           }
</script>
@endsection