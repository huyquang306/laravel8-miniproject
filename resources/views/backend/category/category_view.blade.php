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
                <h3 class="box-title">Categories List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th class="w-25">Icon</th>
                              <th class="w-25">Category EN</th>
                              <th class="w-25">Category JP</th>
                              <th class="w-25">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <i class="fas fa-tv"></i>
                                <td><span><i class="{{$category->category_icon}}"></i></span></td>
                                <td>{{ $category->category_name_en }}</td>
                                <td>{{ $category->category_name_jp }}</td>
                                
                                <td>
                                    <a href="{{route('category.edit', [$category->id])}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('category.delete', [$category->id])}}" class="btn btn-danger" id="delete">Delete</a>
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
                 <h3 class="box-title">Add Categories</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                     <form action="{{route('category.store')}}" method="POST">
                        @csrf

                          <div class="col-12">	
                                <div class="form-group">
                                    <h5>Category Name English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_name_en" class="form-control" value=""> </div>
                                    @error('category_name_en')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            

                            
                                <div class="form-group">
                                    <h5>Category Name Japanese <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_name_jp" class="form-control" value=""> </div>
                                    @error('category_name_jp')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            

                            
                                <div class="form-group">
                                    <h5>Category Icon <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="category_icon" class="form-control" value=""> </div>
                                    @error('category_icon')
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