<!doctype html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body>
    <!-- Page Container -->

    <div id="page-container"
        class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
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
                <div
                    class="d-md-flex justify-content-md-between align-items-md-center py-3 pt-md-3 pb-md-0 text-center text-md-start">
                    <div class="content">
                        <!-- Elements -->
                        <div class="block block-rounded">
                            <div class="block-content">
                                @if (session()->has('message'))
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <p class="mb-0">{{ session()->get('message') }}!!!</p>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close">X</button>

                                    </div>
                                @endif

                                <div>
                                    <h1 class="m-4 " style="text-align: center">Customer Order information</h1>

                                    <table class="table table-bordered table-striped table-vcenter">
                                        <thead>
                                            <tr>
                                                <th>Customer name</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Food Name</th>
                                                <th class="text-center">Price</th>
                                                <th class="text-center">Quantity</th>
                                                <th>Total Price</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($oreders as $or)
                                                <tr>
                                                    <td>
                                                        {{ $or->name }}
                                                    </td>
                                                    <td>{{ $or->phone }}</td>
                                                    <td>{{ $or->address }}</td>
                                                    <td class="text-center">{{ $or->food_name }}</td>
                                                    <td> TK {{ $or->price }} </td>
                                                    <td class="text-center">{{ $or->quantity }}</td>
                                                    <td> TK {{ $or->price * $or->quantity }}</td>


                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a href="{{ url('delete_orders', $or->id) }}"
                                                                onclick="return confirm('Are You Sure Want To Delete This???')">
                                                                <button type="button"
                                                                    class="btn btn-sm btn-alt-secondary"
                                                                    data-bs-toggle="tooltip" title="Delete">
                                                                    <i class="fa fa-trash"></i>
                                                                </button></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5" class="text-center">No Data Found</td>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    <div class="dataTables_info">
                                        {!! $oreders->links() !!}
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
