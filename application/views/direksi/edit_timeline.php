<script src="<?php echo base_url();?>assets/ckeditor/ckeditor.js"></script>

            <form id="form_direksi" method="post" action="<?php echo site_url('direksi/update_timeline/'.$id);?>" enctype="multipart/form-data">
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label lbl">Kategori Riwayat  : </label>
                    <select class="select form-control input" style="margin-top: 7px;" name="riwayat" id="riwayat" required>
                        <option value="">Pilih Riwayat </option>
                        <option value="1" <?php if ($data['ID_RIWAYAT']==1) {
                            echo 'selected';
                        } ?> > Pendidikan </option>
                        <option value="2" <?php if ($data['ID_RIWAYAT']==2) {
                            echo 'selected';
                        } ?> > Jabatan </option>
                        <option value="3" <?php if ($data['ID_RIWAYAT']==3) {
                            echo 'selected';
                        } ?> > Pelatihan </option>
                    </select>
                </div>
                  <div class="form-group">
                    <label for="periodeAwal" class="control-label lbl">Lokasi</label>
                    <input type="text" class="form-control datepicker input" id="lokasi" value="<?php echo $data['LOKASI']; ?>" name="lokasi" type="date" placeholder="Masukan Lokasi Riwayat">
                </div>
                  <div class="form-group">
                    <label for="periodeAwal" class="control-label lbl">Detail</label>
                    <input type="text" class="form-control datepicker input" value="<?php echo $data['DETAIL']; ?>" id="detail" name="detail" type="date" placeholder="Masukan Detail Riwayat">
                </div>
                <div class="form-group">
                    <label for="periodeAwal" class="control-label lbl">Periode Awal</label>
                    <input type="text" readonly="readonly" class="form-control datepicker input" value="<?php echo date('d-m-Y', strtotime($data['AWAL'])); ?>" id="datepicker1"   name="periodeAwal"  placeholder="Masukan Periode Awal">
                </div>
                <div class="form-group">
                    <label for="periodeAkhir" class="control-label lbl">Periode Akhir</label>
                    <input type="text" value="<?php echo (empty($data['AKHIR']))? '' : date('d-m-Y', strtotime($data['AKHIR'])); ?>" class="form-control datepicker input" id="datepicker2"   name="periodeAkhir"  placeholder="Masukan Periode Akhir">
                </div>
                <div class="form-group">
                    <label for="keterangan" class="control-label lbl" style="margin-bottom: 10px;">Keterangan</label>
                    <textarea name="editor2" id="editor1">
                    <?php echo $data['KETERANGAN']; ?>
                    
                   
                    
                   




                    </textarea>
                     <script>
                        // Replace the <textarea id="editor1"> with a CKEditor
                        // instance, using default configuration.
                        CKEDITOR.replace( 'editor1' );
                    </script>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                <button type="simpan" class="btn btn-default oke" id="btn_save_direksi">Simpan</button>
            </div>
        </form>
        <script type="text/javascript">
             var disable = false, picker = new Pikaday({
                field: document.getElementById('datepicker1'),
                firstDay: 1,
                format: 'DD-MM-YYYY',
                minDate: new Date(1900, 0, 1),
                maxDate: new Date(2045, 12, 31),
                yearRange: [1900,2045],
                
                showDaysInNextAndPreviousMonths: true,
                enableSelectionDaysInNextAndPreviousMonths: true
            });

            var disable = false, picker = new Pikaday({
                field: document.getElementById('datepicker2'),
                firstDay: 1,
                format: 'DD-MM-YYYY',
                minDate: new Date(1900, 0, 1),
                maxDate: new Date(2045, 12, 31),
                yearRange: [1900,2045],
                
                showDaysInNextAndPreviousMonths: true,
                enableSelectionDaysInNextAndPreviousMonths: true
            });
        </script>

         <!-- modal-content -->
 