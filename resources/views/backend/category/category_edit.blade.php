@extends('admin.admin_master')
@section('admin')
      <!-- Content Wrapper. Contains page content -->

    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row">



          {{-- Add Brands --}}
          <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Category</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                     <form action="{{route('category.update', [$category->id])}}" method="POST">
                        @csrf

                          <div class="col-12">	
                                <div class="form-group">
                                    <h5>Category Name English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_name_en" class="form-control" value="{{$category->category_name_en}}"> </div>
                                    @error('category_name_en')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            

                            
                                <div class="form-group">
                                    <h5>Category Name Japanese <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_name_jp" class="form-control" value="{{$category->category_name_jp}}"> </div>
                                    @error('category_name_jp')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            

                            
                                <div class="form-group">
                                    <h5>Category Icon <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_icon" class="form-control" value="{{$category->category_icon}}"> </div>
                                    @error('category_icon')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                
                              <input type="submit" class="btn btn-rounded btn-primary" value="Update">

                     </form>
                   </div>
               </div>
               <!-- /.box-body -->
             </div>
             <!-- /.box -->
           </div>
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    
    </div>

<!-- /.content-wrapper -->
@endsection