@extends('backend.layouts.app',['pageSlug'=>'background'])
@section('title', 'Update Background')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="alert-hide" style="margin-top: 10px">
                    @if(Session::has('message'))
                        <div class="alert @if(Session::has('message')) {!! session('message') !!} @endif alert-primary">
                            <button id="cross" type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            {!! session('msg') !!}
                        </div>
                    @endif
                </div>

                <div class="card" style="margin-top: 10%;opacity: 0.8;box-shadow: 30px 50px 60px black;">
                    <div class="card-header" style="color: white">Edit Post</div>

                    <div class="card-body  justify-content-center">
                        <form method="POST" action="{{ route('bg.update' ,[$background->id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div class="row">
                                <div class="col-md-6 pr-md-1">
                                    <div class="form-group">

                                        <div>
                                            <label for="auth_bg" style="color: white">Add Image</label>
                                        </div>
                                        <div>

                                            @if($background->auth_bg)
                                                <img id="previewImg1" src="{{ asset($background->auth_bg) }}" width="70px" height="70px"
                                                     class="img-thumbnail img-fluid blog-img" alt="Image">
                                            @else
                                                <img id="previewImg1" src="{{asset('images/default.png')}}" alt="No File Choosen" width="100" height="100">
                                            @endif

                                        </div>
                                        <div>
                                            <button>
                                                <input type="file" name="auth_bg" onchange="previewFile(this);" class="img-thumbnail form-control @error('auth_bg') is-invalid @enderror">
                                                @error('auth_bg')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                                Choose File
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 pr-md-1">
                                    <div class="form-group">

                                        <div>
                                            <label for="aboutus_bg" style="color: white">Add Image</label>
                                        </div>
                                        <div>

                                            @if($background->aboutus_bg)
                                                <img id="previewImg2" src="{{ asset($background->aboutus_bg) }}" width="70px" height="70px"
                                                     class="img-thumbnail img-fluid blog-img" alt="Image">
                                            @else
                                                <img id="previewImg2" src="{{asset('images/default.png')}}" alt="No File Choosen" width="100" height="100">
                                            @endif

                                        </div>
                                        <div>
                                            <button>
                                                <input type="file" name="aboutus_bg" onchange="previewFile(this);" class="img-thumbnail form-control @error('aboutus_bg') is-invalid @enderror">
                                                @error('aboutus_bg')
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                                @enderror
                                                Choose File
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-5 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        <strong style="color: white">Edit Background</strong>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-1.10.1.min.js"></script>

    <script>
        // <!--alert Hide and Time Duration -->
        $(document).ready(function () {
            $("#cross").click(function () {
                $(".alert-hide").hide();
            });
            setTimeout(function () {

                $(".alert-hide").fadeOut("slow")

            }, 6000);
        });
        // <!--alert Hide and Time Duration -->

        function previewFile(input) {
            var file = $("input[type=file]").get(0).files[0];

            if (file) {
                var reader = new FileReader();
                // reader.onload = function () {
                //     $("#previewImg").attr("src", reader.result);
                // }
                if($('#previewImg1').length){
                    reader.onload = function () {
                            $("#previewImg1").attr("src", reader.result);
                        }
                } else if($('#previewImg2').length){
                    reader.onload = function () {
                            $("#previewImg2").attr("src", reader.result);
                        }
                }

                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection

