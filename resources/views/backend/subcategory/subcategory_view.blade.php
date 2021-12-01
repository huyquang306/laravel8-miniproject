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
                <h3 class="box-title">SubCategories List</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                  <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                          <tr>
                              <th class="w-25">Category ID</th>
                              <th class="w-25">SubCategory EN</th>
                              <th class="w-25">SubCategory JP</th>
                              <th class="w-25">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                            @foreach ($subcategories as $subcategory)
                            <tr>
                                <td>{{ $subcategory->category->category_name_en }}</td>
                                <td>{{ $subcategory->subcategory_name_en }}</td>
                                <td>{{ $subcategory->subcategory_name_jp }}</td>
                                
                                <td>
                                    <a href="{{route('subcategory.edit', [$subcategory->id])}}" class="btn btn-info">Edit</a>
                                    <a href="{{route('subcategory.delete', [$subcategory->id])}}" class="btn btn-danger" id="delete">Delete</a>
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
                 <h3 class="box-title">Add SubCategories</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                     <form action="{{route('subcategory.store')}}" method="POST">
                        @csrf

                          <div class="col-12">	
                                <div class="form-group">
                                    <h5>Basic Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" required class="form-control">
                                            <option value="" disabled selected>Select Category</option>

                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name_en}}</option>
                                            @endforeach
                                            
                                        </select>
                                    </div>
                                    @error('category_id')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <h5>SubCategory Name English<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subcategory_name_en" class="form-control" value=""> </div>
                                    @error('subcategory_name_en')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            

                            
                                <div class="form-group">
                                    <h5>SubCategory Name Japanese <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subcategory_name_jp" class="form-control" value=""> </div>
                                    @error('subcategory_name_jp')
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