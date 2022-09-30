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
           <div class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0    text-center text-md-start">          
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
                
                        <div>  
                            <h1 class="m-4 " style="text-align: center">User Information</h1>      
                   
                          <table class="table table-bordered table-striped table-vcenter">
                            <thead>
                              <tr>                                
                                <th style="width: 10%;">ID</th>
                                <th style="width: 70%;">Name</th>
                                <th style="width: 70%;">Email</th>
                                <th style="width: 70%;">Phone</th>
                                <th class="text-center" style="width: 120%;">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d) 
                              <tr>                                
                                <td style="width: 10%px">
                                 {{$d->id}}
                                </td>
                                <td>{{$d->name}}</td>
                                <td>{{$d->email}}</td>
                                <td>{{$d->phone}}</td>
                                
                                
                                <td class="text-center">
                                    @if($d->usertype=='0')
                                  <div class="btn-group">                                     
                                    <a href="{{url('delete_u',$d->id)}}" onclick="return confirm('Are You Sure Want To Delete This???')">
                                    <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Delete">
                                      <i class="fa fa-times"></i>
                                    </button></a>
                                  </div>
                                  @else
                                  <div class="btn-group">                                  
                                   
                                    <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Delete" disabled>
                                      {{-- <i class="fa fa-times"></i> --}}
                                      Not Allowed
                                    </button>
                                  </div>
                                  @endif
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table> 
                        <div class="dataTables_info">
                          {!! $data->links() !!}
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

