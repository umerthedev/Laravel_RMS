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
            
          <!-- Dynamic Table with Export Buttons -->
          <div class="block block-rounded">
            {{-- message-container --}}
                  @if(session()->has('message'))  
                    <div class="alert alert-success alert-dismissible" role="alert">
                      <p class="mb-0">{{session()->get('message')}}!!!</p>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                    </div>
                  @endif
                   {{--End message-container --}}
            <div class="block-header block-header-default">
              <h3 class="block-title" style="text-align: center">
                Edit Chef Table
              </h3>
            </div>
            <div class="block-content block-content-full">
              <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
              <table class="table table-bordered table-striped table-vcenter js-dataTable-buttons">
                <thead>
                  <tr>
                    
                    <th>Chef Name</th>
                    <th>Chef Speciality</th>                                       
                    <th>image</th>
                    <th>Action</th>
                    
                  </tr>
                </thead>
                <tbody>
                  @foreach($foodchef as $chef)
                  <tr>
                    <td>{{$chef->name }}</td>                    
                    <td>{{$chef->speciality  }}</td>                 
                    <td>
                      <img height="80px" width="80px" src="admin_assets/chefimage/{{$chef->image}}">                                            
                    </td>
                    <td class="text-center">
                      <div class="btn-group">
                        <a href="{{url('edit_chef',$chef->id)}}">
                        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Edit">
                          <i class="fa fa-pencil-alt"></i>
                        </button></a>
                        <a href="{{url('delete_chef',$chef->id)}}" onclick="return confirm('Are You Sure Want To Delete This???')">
                        <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Delete">
                          <i class="fa fa-times"></i>
                        </button></a>
                      </div>
                    </td>                    
                    
                  </tr>  
                  @endforeach              
                </tbody>
                
              </table>
              <div class="dataTables_info">
                {!! $foodchef->links() !!}
            </div>
            </div>
          </div>
          <!-- END Dynamic Table with Export Buttons -->
            
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

