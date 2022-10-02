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
            {{-- show Reservations table here  --}}
            @if(session()->has('message'))  
                   
                    <div class="alert alert-success alert-dismissible" role="alert">
                      <p class="mb-0">{{session()->get('message')}}!!!</p>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
                      
                    </div>
        
                    @endif                                    
                
                        <div>  
                            <h1 class="m-4 " style="text-align: center">Table reservation information</h1>      
                   
                          <table class="table table-bordered table-striped table-vcenter">
                            <thead>
                              <tr>                                
                                <th >Customer name</th>
                                <th >Emali</th>
                                <th >Phone</th>
                                <th >Number of guest</th>
                                <th >Date</th>
                                <th >Time</th>
                                <th >Message</th>
                                <th class="text-center">Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d) 
                              <tr>                                
                                <td>
                                 {{$d->name}}
                                </td>
                                <td>{{$d->email}}</td>
                                <td>{{$d->phone}}</td>                                
                                <td class="text-center">{{$d->guest}}</td>
                                <td>{{$d->date}}</td>
                                <td>{{$d->time}}</td>
                                <td>{{$d->message}}</td>
                                
                                
                                <td class="text-center">
                                    <div class="btn-group">
                                      <a href="{{url('edit_food',$d->id)}}">
                                      <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Approved">
                                        <i class="fa fa-pencil-alt"></i>
                                      </button></a>
                                      <a href="{{url('delete_food',$d->id)}}" onclick="return confirm('Are You Sure Want To Delete This???')">
                                      <button type="button" class="btn btn-sm btn-alt-secondary" data-bs-toggle="tooltip" title="Canceled">
                                        <i class="fa fa-times"></i>
                                      </button></a>
                                    </div>
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

