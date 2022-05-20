            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Soal Pilihan Ganda</h5>
              </div>
              <div class="card-body">
                <div class="row">
                <?php // for ($i=1; $i < 31; $i++) {
                  $no = 1;
                  foreach ($soal as $row) {
                  $no_soal = $no++;
                ?>
                  <div style="padding-left: 4.5px; max-width: 14%; margin-bottom: 0.1rem!important;" class="col-2">
                    <a href="javascript:void(0)" onclick="load_soal('<?=$no_soal?>/<?=$row->id?>')" class="btn btn-sm <?=$row->jwb == 0 ? 'btn-secondary' : 'btn-success'?> text-white">
                      <h5><?=$no_soal?></h5>
                      <i class="fa fa-info-circle fa-2x"></i>
                    </a>
                  </div>
                <?php }?>
                </div>
              </div>
            </div>
            <!--
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Soal Esay</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div style="padding-left: 4.5px; max-width: 14%; margin-bottom: 0.1rem!important;" class="col-2">
                    <a href="javascript:void(0)" onclick="load_esay('1')" class="btn btn-sm btn-secondary text-white">
                      <h5>1</h5>
                      <i class="fa fa-info-circle fa-2x"></i>
                    </a>
                  </div>
                  <div style="padding-left: 4.5px; max-width: 14%; margin-bottom: 0.1rem!important;" class="col-2">
                    <a href="javascript:void(0)" onclick="load_esay('2')" class="btn btn-sm btn-secondary text-white">
                      <h5>2</h5>
                      <i class="fa fa-info-circle fa-2x"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
            -->
