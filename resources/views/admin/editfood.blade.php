<!doctype html>
<html lang="en">
  <head>
   @include('admin.css')
  </head>
  <body>
    <!-- Page Container -->

    <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
      <!-- Side Overlay-->
      @include('admin.overlay')
      <!-- END Side Overlay -->

      <!-- Sidebar -->
      
      <!-- Sidebar Start -->
                @include('admin/sidebar')
      <!-- END Sidebar -->

        <!-- Header -->
          <header id="page-header">           
            <div class="content-header">              

                @include('admin.header')
                
            </div>
        <!-- END Header Content -->

        <!-- Header Search -->
       @include('admin.search')
        <!-- END Header Search -->

        <!-- Header Loader -->
        <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
        {{-- <div id="page-header-loader" class="overlay-header bg-header-dark">
          <div class="bg-white-10">
            <div class="content-header">
              <div class="w-100 text-center">
                <i class="fa fa-fw fa-sun fa-spin text-white"></i>
              </div>
            </div>
          </div>
        </div> --}}
       
        <!-- END Header Loader -->
      </header>
      <!-- END Header -->
      

      <!-- Main Container -->
      
      <main id="main-container">                
        <div class="content">
          <div class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-start">          
            <div class="content">
                <!-- Elements -->
                <div class="block block-rounded">                                
                  <div class="block-content">
                    @if(session()->has('message'))  
                   
                    <div class="alert alert-success alert-dismissible" role="alert">
                      <p class="mb-0">{{session()->get('message')}}!!!</p>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                      
                    </div>
        
                    @endif
                    <h1 class="m-4 " style="text-align: center">Edit Foods Information</h1>
                    <a href="{{ URL::previous() }}" class="btn btn-danger mb-4">Back</a>  
                        <form action="{{url('update_foodmanu',$data->id)}}" method="post" enctype="multipart/form-data">
                          @csrf
                            <div class="">
                              <div class="mb-2">                               
                                <input type="text" class="form-control border border-secondary" id="example-text-input" name="name" placeholder="Food name" value="{{$data->name}}" required>
                              </div>
                              <div class="mb-2">
                               
                                <input type="num" class="form-control border border-secondary" id="example-email-input" value="{{$data->price}}" name="price" placeholder="Food price" required>
                              </div>                               
                                <div class="mb-2">
                               
                                  <input type="text" class="form-control border border-secondary" id="example-email-input" value="{{$data->description}}" name="description" placeholder="Food Short Description" required>
                                </div>    
                                <div class="mb-2">
                                    <label class="form-label" for="example-email-input">Old food image</label>                         
                                    <img height="150px" width="150px"  src="{{url('admin_assets/foodimage/'.$data->image)}}" alt="">
                                  </div>                         
                                                                                          
                             <div class="row push">
                                <div class="col-lg-8 col-xl-5 overflow-hidden">
                                    <div class="mb-2">
                                      <label class="form-label" for="example-file-input">New food image</label>
                                      <input class="form-control" type="file" name="image">
                                    </div>                      
                                </div>                     
                             </div> 
                            
                             <button type="submit" class="btn btn-secondary bg-dark mb-4">Update Food info</button>
                                                                          
                        </form>
                 </div>
             </div>
         </div>
                    

                      
                        
                        







            
          </div>
        </div>        
      </main>
      <!-- END Main Container -->

      <!-- Footer -->
      @include('admin/footer')
      <!-- END Footer -->
    </div>
    <!-- END Page Container -->
   
    @include('admin/script')
  </body>
</html>

