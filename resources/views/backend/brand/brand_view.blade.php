@extends('admin.admin_master')
@section('admin')
      <!-- Content Wrapper. Contains page content -->

    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row">
         
          <div class="col-8">

           <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Brands List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th class="w-25">Brand EN</th>
                              <th class="w-25">Brand JP</th>
                              <th class="w-25">Image</th>
                              <th class="w-25">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                            @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $brand->brand_name_en }}</td>
                                <td>{{ $brand->brand_name_jp }}</td>
                                <td><img src="{{asset($brand->brand_image) }}" style="width: 70px; height:40px;" alt=""></td>
                                <td>
                                    <a href="{{route('brand.edit', [$brand->id])}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('brand.delete', [$brand->id])}}" class="btn btn-danger" id="delete">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                      </tbody>
                     
                    </table>
                  </div>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->


          {{-- Add Brands --}}
          <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Brands</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                     <form action="{{route('brand.store')}}" enctype="multipart/form-data" method="POST">
                        @csrf

                          <div class="col-12">	
                                <div class="form-group">
                                    <h5>Brand Name English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="brand_name_en" class="form-control" value=""> </div>
                                    @error('brand_name_en')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            

                            
                                <div class="form-group">
                                    <h5>Brand Name Japanese <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="brand_name_jp" class="form-control" value=""> </div>
                                    @error('brand_name_jp')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            

                            
                                <div class="form-group">
                                    <h5>Brand Image <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="brand_image" class="form-control" value=""> </div>
                                    @error('brand_image')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                                
                              <input type="submit" class="btn btn-rounded btn-primary" value="Add">

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