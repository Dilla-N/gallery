
    @extends('layouts.app')

    @section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>GALLERY PHOTO</div>
                          
                        </div>
                    </div>
    
                   
    
    
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
    
    
    
    @section('js')
    
    <script type="text/javascript">
    
      var query={};
    
      @if(Request::query('category'))
      Object.assign(query,{'category':"{{Request::query('category')}}"});
      @endif
      
      @if(Request::query('sort_by'))
        Object.assign(query,{'sort_by':"{{Request::query('sort_by')}}"});
      @endif
    
      function filter_image(value){
        Object.assign(query,{'category':value});
        window.location.href="{{route('home')}}"+'?'+$.param(query);
      }
    
      function sort_by(value){
        Object.assign(query,{'sort_by':value});
        window.location.href="{{route('home')}}"+'?'+$.param(query);
      }
    
    
      $("#image_upload_form").validate({
      rules: {
        caption: {
          required: true,
          maxlength: 255
        },
        category: {
          required: true
        },
        image:{
          required:true,
          extension:"png|jpeg|jpg|bmp"
        }
    
      },
      messages: {
        caption: {
          required: "Mohon untuk Masukan Keterangan Foto.",
          maxlength: "Max. 255 characters allowed."
        },
        category: {
          required: "Mohon pilih Kategori Foto.",
        },
        image: {
          required: "Upload Foto.",
          extension: "Hanya jpeg,jpg,png,bmp allowed",
        }
      },
        errorPlacement:function(error,element){
          if(element.attr('name')=="image"){
            error.insertAfter("#image_error");
          }else{
            error.insertAfter(element);
          }
        }
      });
    
    
    
        function readFile(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
    
        reader.onload = function(e) {
    
          var validImageType=['image/png','image/bmp','image/jpeg','image/jpg'];
    
          if(!validImageType.includes(input.files[0]['type'])){
            var htmlPreview =
            '<p>Image preview not available</p>' +
            '<p>' + input.files[0].name + '</p>';
          }else{
            var htmlPreview =
            '<img width="70%" height="300" src="' + e.target.result + '" />' +
            '<p>' + input.files[0].name + '</p>';
          }
          
      
          var wrapperZone = $(input).parent();
          var previewZone = $(input).parent().parent().find('.preview-zone');
          var boxZone = $(input).parent().parent().find('.preview-zone').find('.box').find('.box-body');
    
          wrapperZone.removeClass('dragover');
          previewZone.removeClass('hidden');
          boxZone.empty();
          boxZone.append(htmlPreview);
        };
    
        reader.readAsDataURL(input.files[0]);
      }
    }
    
    function reset(e) {
      e.wrap('<form>').closest('form').get(0).reset();
      e.unwrap();
    }
    
    $(".dropzone").change(function() {
      readFile(this);
    });
    
    $('.dropzone-wrapper').on('dragover', function(e) {
      e.preventDefault();
      e.stopPropagation();
      $(this).addClass('dragover');
    });
    
    $('.dropzone-wrapper').on('dragleave', function(e) {
      e.preventDefault();
      e.stopPropagation();
      $(this).removeClass('dragover');
    });
    
    $('.remove-preview').on('click', function() {
      var boxZone = $(this).parents('.preview-zone').find('.box-body');
      var previewZone = $(this).parents('.preview-zone');
      var dropzone = $(this).parents('.form-group').find('.dropzone');
      boxZone.empty();
      previewZone.addClass('hidden');
      reset(dropzone);
    });
    
    </script>
    @endsection