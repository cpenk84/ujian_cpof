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

              <div class="card-body h5">
                <!-- <h5 class="card-title"></h5> -->
                <h4 class="m-0 mb-2"> <b>No.<?=$no?></b></h4>

                <p class="card-text text-justify">
                  <?=$soal->soal?>
                </p>
                <div class="row ml-2">
                  <div class="col-sm-6">
                    <div class="row mb-2">
                      <div class="icheck-success d-inline col-12 col-md-12">
                        <input type="radio" id="a" name="soal" onclick="pilihJawaban('a');" value="a" required <?=$pg=='a'?'checked':''?>>
                        <label style="font-weight: 500;" for="a">
                          <ol type="a" start="a" style="margin-left: -19px">
                            <li><?=$soal->ja?></li>
                          </ol>
                        </label>
                      </div>
                      <div class="icheck-success d-inline col-12 col-md-12">
                        <input type="radio" id="b" name="soal" onclick="pilihJawaban('b');" value="b" required <?=$pg=='b'?'checked':''?>>
                        <label style="font-weight: 500;" for="b">
                          <ol type="a" start="2" style="margin-left: -19px">
                            <li><?=$soal->jb?></li>
                          </ol>
                          <!-- <b>b.</b> <?=$soal->jb?></label> -->
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="row mb-2">
                      <div class="icheck-success d-inline col-12 col-md-12">
                        <input type="radio" id="c" name="soal" onclick="pilihJawaban('c');" value="c" required <?=$pg=='c'?'checked':''?>>
                        <label style="font-weight: 500;" for="c">
                          <ol type="a" start="3" style="margin-left: -19px">
                            <li><?=$soal->jc?></li>
                          </ol>
                          <!-- <b>c.</b> <?=$soal->jc?></label> -->
                      </div>
                      <div class="icheck-success d-inline col-12 col-md-12">
                        <input type="radio" id="d" name="soal" onclick="pilihJawaban('d');" value="d" required <?=$pg=='d'?'checked':''?>>
                        <label style="font-weight: 500;" for="d">
                          <ol type="a" start="4" style="margin-left: -19px">
                            <li><?=$soal->jd?></li>
                          </ol>
                          <!-- <b>d.</b> <?=$soal->jd?></label> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
