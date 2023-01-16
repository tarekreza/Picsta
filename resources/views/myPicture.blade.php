
@extends('master')
@section('content')
    

<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              
              <div class="card-body">
                <div class="row">

                  
                @foreach ($images as $image)
                    
                <div class="col-sm-2">
                    <a href="" data-toggle="lightbox" data-title="sample 5 - black" data-gallery="gallery">
                        <img src="{{ $image->file }}" class="img-fluid mb-2" alt="Image"/>
                    </a>
                    <a href="" class="btn btn-outline-danger btn-xs disabled">Edit</a>
                    <form action="{{ route('Images.destroy',$image->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                    <button class="btn btn-outline-danger btn-xs">Delete</button>
                    </form>
                </div>
                
                @endforeach

                </div>
              </div>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Ekko Lightbox -->
<script src="../plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Filterizr-->
<script src="../plugins/filterizr/jquery.filterizr.min.js"></script>
</script>

@endsection