<script>
  function pilihJawaban(pg){
    if(navigator.onLine){
      var id_soal = '<?=$soal->id?>'
      var url = "<?=site_url('ujian/jawab_soal/"+id_soal+"/"+pg+"')?>";
        $.get(url, function(data){
          var response = jQuery.parseJSON(data);
          if(response.success == true){
            load_nosoal('<?=$id_peserta?>');
          }else{
            alert('Gagal Menyimpan Jawaban');
          }
        });
    }else{
      alert('Koneksi Terputus');
    }
  }
</script>
<script src="<?php echo base_url();?>assets/vendors/tinymce/js/tinymce/tinymce.js"></script>
   <script type="text/javascript">
    /*
    tinyMCE.init({
      mode : "textareas",
      theme : "advanced",
      plugins : "pagebreak,style,table,save,advhr,advimage,advlink,emotions,inlinepopups,insertdatetime,preview,media,searchreplace,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,wordcount,advlist",

      // Theme options
      theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
      theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
      theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
      theme_advanced_buttons4 : "visualchars,nonbreaking,template,pagebreak,restoredraft",
      theme_advanced_toolbar_location : "top",
      theme_advanced_toolbar_align : "left",
      theme_advanced_statusbar_location : "bottom",
      theme_advanced_resizing : true,

      // Example content CSS (should be your site CSS)
      content_css : "css/content.css",

      // Drop lists for link/image/media/template dialogs
      template_external_list_url : "lists/template_list.js",
      external_link_list_url : "lists/link_list.js",
      external_image_list_url : "lists/image_list.js",
      media_external_list_url : "lists/media_list.js",

      // Style formats
      style_formats : [
        {title : 'Bold text', inline : 'b'},
        {title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
        {title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
        {title : 'Example 1', inline : 'span', classes : 'example1'},
        {title : 'Example 2', inline : 'span', classes : 'example2'},
        {title : 'Table styles'},
        {title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
      ],

      // Replace values for the template plugin
      template_replace_values : {
        username : "Some User",
        staffid : "991234"
      }
    });
    */
    
  tinymce.init({
    selector: "textarea",
    plugins: [
       "advlist autolink lists link image charmap print preview hr anchor pagebreak",
       "searchreplace wordcount visualblocks visualchars code fullscreen",
       "insertdatetime nonbreaking save table contextmenu directionality",
       "emoticons template paste textcolor colorpicker textpattern"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent",
    relative_urls: false,
    remove_script_host: false,
      file_picker_callback: function(cb, value, meta) {
       var input = document.createElement('input');
       input.setAttribute('type', 'file');
       input.setAttribute('accept', 'image/*');
       input.onchange = function() {
        var file = this.files[0];
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function () {
           var id = 'post-image-' + (new Date()).getTime();
           var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
           var blobInfo = blobCache.create(id, file, reader.result);
           blobCache.add(blobInfo);
           cb(blobInfo.blobUri(), { title: file.name });
        };
       };
       input.click();
      },
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        },
   });
   

  </script>

              <div class="card-body h5 text-justify">
                <!-- <h5 class="card-title"></h5> -->
                <h4 class="m-0 mb-2"> <b>No.<?=$soal->id?></b></h4>

                <p class="card-text">
                  <?=$soal->soal?>
                </p>
                <textarea name="jawaban" rows="10"></textarea>
              </div>
