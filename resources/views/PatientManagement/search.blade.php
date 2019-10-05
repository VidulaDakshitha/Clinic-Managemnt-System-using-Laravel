@extends('main.layout.mainlayoutsearch')

@section('content')


<div class="container-fluid">
 
        
        
        
            <div class="row">
            <div class="col-md-7 col-sm-12 col-xs-12"><h1 style="font-size: 100px; margin-top: 29vh;margin-left: 10%;line-height: 100px;">let's Channel <br />Your Doctor</h1></div>	
            <div class="col-md-5 col-sm-12 col-xs-12 form-top-margin">
            <div class="front-search">
            <form  action="/showdoctor" method="post">
              {{ csrf_field() }}
            
                        <input type="text" name="doctor" class=".front-search input" id="doctor" placeholder="Doctor" onblur="checkDoctorId()">
                        <input type="hidden" name="doctor_id" id="doctor_id">
                        
                        <select name="hospital" id="hospital" onblur="checkHospitalId()" placeholder="Any Hospital" class="selectpicker">
                        <option value="" style="color: #ccc;">Select Hospital</option>  
                        <option value="148">IHHRI - Wellawatte</option>
                        </select>

                        <input type="text" name="specialization" class=".front-search input" id="spec" placeholder="Any Specialization" onblur="checkSpecializationId()">
                        <input type="hidden" name="specialization_id" id="spec_id" >

                        {{-- <input type='text' name="date" class=".front-search input" id='date' placeholder="Any Date" style="bottom: 0;" /> --}}
                        {{-- <input type="hidden" name="_token" value="qCTPw4CxwUEAjwERa2mn2jwkvLgMFbYrW08OwdKw"> --}}
                        <button type="submit">Search</button>
                    </form>  
            </div>	
            </div>	
            </div>	
        </div>
 
        <script type="text/javascript" src="{{ asset('js/searchJS/samp.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/searchJS/jquery2.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/searchJS/javascript3.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/searchJS/jquery1.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/searchJS/javascript1.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/searchJS/javascript2.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/searchJS/search.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/searchJS/javascript_date.js') }}"></script>
        
            <script type="text/javascript">
              $(document).ready (function(){
                  checkHospitalId();
                  checkDoctorId();
                  checkSpecializationId();
                  
                    $(function () {
                        $('#date').datetimepicker(
                          {
                            format:'DD/MM/YYYY'
                          });
                        //$("#date").val("code");
                    });
                  });
                  
                  function checkDoctorId(){
                    for(i=0;i<doctors.length;i++){
                        if(doctors[i].label==$("#doctor" ).val() && doctors[i].value==$("#doctor_id" ).val()){
                            return ;
                        }
                    }
                    $("#doctor" ).val('');
                    $("#doctor_id" ).val('');
                  }
                  function checkHospitalId(){
                    $("#hospital_id" ).val($("#hospital" ).val())  ;
        
                  }
                  function checkSpecializationId(){
                    for(i=0;i<specilizations.length;i++){
                        if(specilizations[i].label==$("#spec" ).val() && specilizations[i].value==$("#spec_id" ).val()){
                            return ;
                        }
                    }
                    $("#spec" ).val('');
                    $("#spec_id" ).val('');
                  }          
                </script>
       
  
@endsection