@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>   
    <div class="container-full">
        <section class="content">

            <!-- Basic Forms -->
             <div class="box">
                <div class="box-header with-border">
                    <h3>Admin Change Profile</h3>
               </div>
            
               <div class="box-body">
                 <div class="row">
                   <div class="col">
                       <form method="post" action="{{ route('admin.profile.store', ['id' => $editData->id])}}" enctype="multipart/form-data">
                           @csrf
                         <div class="row">
                           <div class="col-12">	
                               
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Admin Name <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control" value="{{$editData->name}}"> </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Admin Email <span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="email" name="email" class="form-control" value="{{$editData->email}}"> </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Profile Image<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="file" name="profile_photo_path" class="form-control" id="image" > </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <img class="rounded-circle" style="width: 100px; height:100px;" id="showImage"
                                        src="{{ (!empty($editData->profile_photo_path)) ? url($editData->profile_photo_path) : url('upload/no_image.jpg')  }}" alt="User Avatar">
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

    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

@endsection