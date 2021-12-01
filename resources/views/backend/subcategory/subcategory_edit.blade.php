@extends('admin.admin_master')
@section('admin')
      <!-- Content Wrapper. Contains page content -->

    <div class="container-full">

      <!-- Main content -->
      <section class="content">
        <div class="row">

          {{-- Edit Categories --}}
          <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit SubCategories</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                     <form action="{{route('subcategory.update', [$subcategory->id])}}" method="POST">
                        @csrf

                          <div class="col-12">	
                                <div class="form-group">
                                    <h5>Basic Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="category_id" required class="form-control">
                                            <option value="" disabled>Select Category</option>

                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}" {{($category->id === $subcategory->category_id) ? 'selected' : ''}}>
                                                    {{$category->category_name_en}}
                                                </option>
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
                                        <input type="text" name="subcategory_name_en" class="form-control" 
                                        value="{{$subcategory->subcategory_name_en}}"> </div>
                                    @error('subcategory_name_en')
                                        <span class="text-danger"> {{ $message }} </span>
                                    @enderror
                                </div>
                            

                            
                                <div class="form-group">
                                    <h5>SubCategory Name Japanese <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="subcategory_name_jp" class="form-control" 
                                        value="{{$subcategory->subcategory_name_jp}}"> </div>
                                    @error('subcategory_name_jp')
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