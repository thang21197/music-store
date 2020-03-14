@extends('frontend.layout.master')
@section('content')
 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">        
              <div class="col-md-12">
                <div class="aa-myaccount-register">                 
                 <h4>Register</h4>
                 @if (session('Notice'))
                   <div class="alert alert-success">
                  <strong>{{session('Notice')}}</strong> 
                   </div>
                 @endif
                 <form action="/post_register" class="aa-login-form" method="post">
                   @csrf
                    <label for="">Email address<span>*</span></label>
                    <input type="text" placeholder="Email" name="email" value="{{old('email')}}">
                     {!!ShowError($errors,'email')!!}
                    <label for="">Your name<span>*</span></label>
                    <input type="text" placeholder="Your name" name="your_name" value="{{old('your_name')}}">
                    {!!ShowError($errors,'your_name')!!}
                    <label for="">Password<span>*</span></label>
                    <input type="password" placeholder="Password" name="password" value="{{old('password')}}">
                    {!!ShowError($errors,'password')!!}
                    <label for="">Confirm Password<span>*</span></label>
                    <input type="password" placeholder="Confirm Password" name="confirm_password" value="{{old('confirm_password')}}">
                    {!!ShowError($errors,'confirm_password')!!}
                     <label for="">Address<span>*</span></label>
                    <input type="text" placeholder="Your adress" name="address" value="{{old('address')}}">
                    {!!ShowError($errors,'address')!!}
                     <label for="">Telephone Number<span>*</span></label>
                    <input type="text" placeholder="Telephone number" name="telephone" value="{{old('telephone')}}">
                    {!!ShowError($errors,'telephone')!!}
                    <button type="submit" class="aa-browse-btn">Register</button>                    
                  </form>
                </div>
              </div>
            </div>          
         </div>
       </div>
     </div>
     
   </div>
 </section>
 <!-- / Cart view section -->

  <!-- footer -->
@endsection