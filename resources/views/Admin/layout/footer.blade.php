<div class="container mx-auto text-center">
  <p>&copy; {{ date('Y') }} CMS Dashboard. All rights reserved.</p>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  function toggleDropdown(id) {
    const dropdown = document.getElementById(id);
    dropdown.classList.toggle('hidden');
  }

  function toggleDropdown1() {
    const dropdown = document.getElementById('profileDropdown');
    dropdown.classList.toggle('hidden');
  }

  CKEDITOR.replace('editor1', {
    height: 300,
    filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
    filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
  });

  $('#parent_category').change(function() {
    var categoryId = $(this).val();
    $.ajax({
      url: '{{ url("Administrator/get-subcategories") }}',
      type: 'POST',
      data: {
        _token: '{{ csrf_token() }}',
        category_id: categoryId
      },
      success: function(response) {
        var options = '<option value="">-Select Sub-category-</option>';
        $.each(response, function(id, name) {
          options += '<option value="' + id + '">' + name + '</option>';
        });
        $('#subcategory').html(options);
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    });
  });

  document.getElementById('featured_image').addEventListener('change', previewImage);

  function previewImage() {
    var preview = document.getElementById('image-preview');
    var file = document.querySelector('input[type=file]').files[0];
    var reader = new FileReader();

    reader.onloadend = function() {
      preview.innerHTML = '<div><img src="' + reader.result + '" style="max-width:250px; max-height:150px;"><span style="color:red;cursor: pointer; padding: 15px" onclick="trashImage()"><span class="text-red-500 hover:text-red-700 cursor-pointer"><i class="fa fa-trash" aria-hidden="true"></i></span></div></span>';
    }
    if (file) {
      reader.readAsDataURL(file);
    } else {
      preview.innerHTML = '';
    }
  }

  function trashImage() {
    var preview = document.getElementById('image-preview');
    preview.innerHTML = '';
    document.getElementById('featured_image').value = '';
    window.location.reload();
  }

  function showTab(tab) {
    document.querySelectorAll('.tab-content').forEach((content) => {
      content.classList.add('hide');
    });
    document.getElementById(tab).classList.remove('hide');
    document.querySelectorAll('.tab-link').forEach((link) => {
      link.classList.remove('active-tab');
    });
    const activeTab = document.getElementById(`tab-${tab}`);
    activeTab.classList.add('active-tab');
  }
  document.addEventListener('DOMContentLoaded', () => {
    showTab('all');
  });
</script>