@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>   
    <div class="container-full">
        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
               <div class="box-header with-border">
                    <h3>Admin Change Password</h3>
               </div>
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method="post" action="{{ route('admin.update.password', ['id' => Auth::guard('admin')->id()])}}">
                           @csrf
                         <div class="row">
                           <div class="col-12">	
                               
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <h5>Current Password <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" id="old_password" name="old_password" class="form-control" value=""> </div>
                                            @error('old_password')
                                                <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    

                                    
                                        <div class="form-group">
                                            <h5>New Password <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" id="password" name="password" class="form-control" value=""> </div>
                                            @error('password')
                                                <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    

                                   
                                        <div class="form-group">
                                            <h5>Confirm Password <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" value=""> </div>
                                            @error('password_confirmation')
                                                <span class="text-danger"> {{ $message }} </span>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                </div>
                               
                               <input type="submit" class="btn btn-rounded btn-primary" value="Update">
                            </div>
                           
                       </form>
   
                   </div>
                   <!-- /.col -->
                 </div>
                 <!-- /.row -->
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
   
           </section>
    </div>

@endsection