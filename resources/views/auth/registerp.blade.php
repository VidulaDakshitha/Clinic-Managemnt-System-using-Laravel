@extends('main.layout.mainlayoutregister')

@section('content')


<div class="main">

    <div class="container1">
        <div class="booking-content">
            <div class="booking-image">
                <a onclick="myFunction()" ><img class="booking-img img1" src="images/registerIMG/form-img.jpg" alt="Booking Image"></a>
            </div>
            <div class="booking-form">
                    
            <form action="{{ route('register') }}" method="POST" id="booking-form" class="forma"  >
                    <h2 style="margin-top: -20%;">Register Yourself for International Homeopathy Clinic</h2>
                    <div class="form-group form-input">
                        {{ csrf_field() }}
                        <input  type="text" id="name" class ="inputa @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus/>
                        <label for="Name" class="form-label">Your Full Name</label>

                        @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                    </div>

                     <div class="form-radio">
                        <label class="label-radio"> Select Your Gender</label>
                        <div class="radio-item-list">
                            <span class="radio-item">
                                <input type="radio" class ="inputa" name="Gender" value="male" id="male" />
                                <label for="male">Male</label>
                            </span>
                            <span class="radio-item active">
                                <input type="radio" class ="inputa" name="Gender" value="female" id="female" checked="checked" />
                                <label for="female">Female</label>
                            </span>
                        </div>
                    </div>

                     <div class="form-group form-input">
                        <input class ="inputa" type="date" name="dob" id="dob" value="" placeholder="" required />
                        
                        <label for="dob" class="form-label">Birth Date</label>
                        
                    </div>



                     <div class="form-group form-input">
                        <input class ="inputa" type="text" name="Nic" id="Nic" value="" required />
                        <label for="Nic" class="form-label">NIC</label>
                    </div>
                    <div class="form-group form-input">
                        <input type="text" class ="inputa" name="Address1" id="Address1" value="" required />
                        <label for="Address1" class="form-label">Address Line 1</label>
                    </div>

                    <div class="form-group form-input">
                        <input type="text" class ="inputa"  name="Address2" id="Address2" value="" required />
                        <label for="Address2" class="form-label">Address Line 2</label>
                    </div>

                    <div class="form-group form-input">
                        <input type="text" class ="inputa" name="City" id="City" value="" required />
                        <label for="City" class="form-label">City</label>
                    </div>

                    <div class="form-group form-input">
                        <input type="number" class ="inputa" name="phone-number" id="phone-number" value="" required />
                        <label for="phone-number" class="form-label">Phone Number [eg:- 77xxxxxxx</label>
                    </div>

                    <div class="form-group form-input">
                        <input type="email"  id="email" class ="inputa @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" required autocomplete="email"/>
                        <label for="email" class="form-label">Email</label>

                        @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                    </div>

                    <div class="form-group form-input">
                        <input type="text" class ="inputa" name="Username" id="Username" value="" required />
                        <label for="Username" class="form-label">Username</label>
                    </div>

                    <div class="form-group form-input">
                        <input type="password"  name="password" id="password"  class ="inputa @error('password') is-invalid @enderror" name="password"
                        required autocomplete="new-password" />
                        <label for="Password" class="form-label" >Password</label>

                        @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                    </div>


                    <div class="form-group form-input">
                            <input id="password-confirm" type="password" class ="inputa"
                            name="password_confirmation" required autocomplete="new-password" />
                            <label for="password_confirmation" class="form-label" >Password Confirm</label>

                        </div>



                    {{-- <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div> --}}


                    <div class="form-submit">
                        <input type="submit" value="Register Now" class="submit" id="submit" name="submit" />
                        
                        <a href="#" class="vertify-booking">Already a member? click to login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script>
        function myFunction() {
        document.getElementById("name").value = "Vidula";
         document.getElementById("dob").value = "1998-03-18";
         document.getElementById("Nic").value = "985641722V";
         document.getElementById("Address1").value = "Daham Mawatha";
         document.getElementById("Address2").value = "Kaldemulla";
         document.getElementById("City").value = "Moratuwa";
         document.getElementById("phone-number").value = "779819207";
         document.getElementById("email").value = "viduladakshitha@gmail.com";
         document.getElementById("Username").value = "vidula";
         document.getElementById("password").value = "123456789";
         document.getElementById("password-confirm").value = "123456789";
        }
    </script>





@endsection