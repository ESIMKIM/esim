<div id="mttd_terima" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box" style="background-color: red;">
                    <i class="fa fa-exclamation" aria-hidden="true"></i>

                </div>
            </div>
            <div class="modal-body">
                <h4 class="modal-title" style="text-align: center;">Informasi</h4>
                </br>
                <p class="text-center" style="color: black;">Ada Transaksi yang belum diselesaikan <br><br> harap
                    melakukan paraf penerimaan barang dengan mengklik tombol <span style="color: red;">"Terima
                        Barang"</span> di menu
                    transaksi </p>
            </div>
            <div class="modal-footer">
                <div class="col text-center">
                    <a href="<?php echo base_url('transactions-user') ?>" class="btn btn-primary"><span
                            style="color:black">Selesaikan</span></a>
                </div>
                <!-- <a href="<?php echo base_url('transactions-user') ?>" class="btn btn-primary"
                    style="background-color: cyan; text-align: center;"><span style="color:black">Get It
                        Now</span> </a> -->
                <!-- <button type="button" class="btn btn-primary">Save changes</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
            </div>
        </div>
    </div>
</div>

<div id="mSuksesSimpan" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="fa fa-check" aria-hidden="true"></i>

                </div>
            </div>
            <div class="modal-body">
                <h4 class="modal-title" style="text-align: center;">Success!</h4>
                </br>
                <p class="text-center">Item berhasil ditambahkan</p>
            </div>
        </div>
    </div>
</div>

<div id="mgagalHabis" class="modal fade">
    <div class="modal-dialog modal-confirm">
        <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box" style="background-color: red;">
                    <i class="fa fa-exclamation" aria-hidden="true"></i>

                </div>
            </div>
            <div class="modal-body">
                <h4 class="modal-title" style="text-align: center;">Informasi</h4>
                </br>
                <p class="text-center" style="color: red;">Stock Tidak Tersedia</p>
            </div>
        </div>
    </div>
</div>

<a href="<?php base_url() ?>/CTR_Auth/logout" class="float">
    <i class="fa fa-power-off my-float"></i>
</a>


<div class="col-xl-12 col-lg-12 col-md-12">
    <!-- Start Filter Bar -->
    <div class="filter-bar d-flex flex-wrap align-items-center">
        <div class="sorting mr-auto">
            <select id="showItem" onchange="showItemqty()">
                <?php if (!empty($this->session->userdata('showItem'))) : ?>
                <option selected style="text-decoration: underline;">Show
                    <?php echo $this->session->userdata('showItem') ?></option>
                <option value="16">Show 16</option>
                <option value="28">Show 28</option>
                <option value="40">Show 40</option>
                <?php else : ?>
                <option value="16">Show 16</option>
                <option value="28">Show 28</option>
                <option value="40">Show 40</option>
                <?php endif; ?>
            </select>
        </div>

        <?php if ($this->session->userdata('cariSesi')) : ?>
        <div class="sorting">
            <h5 style="color: white;">Hasil Pencarian :</h5>
            <input type="text" value="<?php echo $this->session->userdata('cariSesi'); ?>" disabled>
        </div>
        <?php endif; ?>

        <!-- <div class="pagination"> -->
        <nav aria-label="Page navigation example">
            <?php echo $pagination; ?>
        </nav>

    </div>
    <!-- End Filter Bar -->
    <!-- Start Best Seller -->
    <section class="lattest-product-area pb-40 category-list">
        <div class="row">
            <?php $i = 1;
            foreach ($result as $data) : ?>
            <?php
                // $content = substr($data['name'], 0, 17) . " ...";
                $content = $data['name'];
                $str = $data['name'];
                $length = strlen($str);

                $varName = '';
                if ($data['qty'] >= 1) {
                    $varName = '<span style="color:green;">Stock Tersedia<span>';
                    $color = "btn-info";
                } else {
                    $varName = '<span style="color:red;">Stock tidak Tersedia<span>';
                    $color = "btn-warning";
                }

                ?>
            <div class="col-lg-3 col-4">
                <div class="single-product">
                    <table>
                        <tr>
                            <th><img class="img-fluid" src="<?= $data['images']; ?>" style="width: 300px;
								height: 200px;
								object-fit: fill;" alt=""></th>
                        </tr>
                        <tr>
                            <td style="height: 60px; vertical-align:top ;">
                                <div class="product-details">
                                    <input id="prod_id_<?php echo $i ?>" name="prod_id"
                                        value="<?= $data['products_id']; ?>" hidden>
                                    <?php if ($length <= 21) : ?>
                                    <h6><?= $content ?></h6>
                                    <br>
                                    <?php else : ?>
                                    <h6><?= $content ?></h6>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="row">
                                    <div class="col-lg-2"><a href="#" onclick="tambahitem(<?php echo $i ?>)"
                                            class="btn <?php echo $color ?>">
                                            <span class="ti-bag"></span>
                                        </a></div>
                                    <div class="col-lg-6">
                                        <h6><?= $varName ?></h6>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>



                    <!-- <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <img class="img-fluid" src="<?= $data['images']; ?>" style="width: 300px;
								height: 200px;
								object-fit: fill;" alt="">
                            <div class="product-details">
                                <input id="prod_id_<?php echo $i ?>" name="prod_id" value="<?= $data['products_id']; ?>"
                                    hidden>
                                <?php if ($length <= 21) : ?>
                                <h6><?= $content ?></h6>
                                <br>
                                <?php else : ?>
                                <h6><?= $content ?></h6>
                                <?php endif; ?>

                                <div class="price">
                                    <h6><?= $varName ?></h6>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-lg-12 col-md-12">
                            <div class="product-details">
                                <div class="row">
                                    <div class="col-lg-2"><a href="#" onclick="tambahitem(<?php echo $i ?>)"
                                            class="btn btn-info">
                                            <span class="ti-bag"></span>
                                        </a></div>
                                    <div class="col-lg-6">
                                        <h6><?= $varName ?></h6>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
            <?php $i++ ?>
            <?php endforeach; ?>
        </div>
    </section>


    <!-- End Best Seller -->
    <!-- Start Filter Bar -->
    <div class="filter-bar d-flex flex-wrap align-items-center">
        <div class="sorting mr-auto">
            <select id="showItem2" onchange="showItemqty2()">
                <?php if (!empty($this->session->userdata('showItem'))) : ?>
                <option selected style="text-decoration: underline;">Show
                    <?php echo $this->session->userdata('showItem') ?></option>
                <option value="16">Show 16</option>
                <option value="28">Show 28</option>
                <option value="40">Show 40</option>
                <?php else : ?>
                <option value="16">Show 16</option>
                <option value="28">Show 28</option>
                <option value="40">Show 40</option>
                <?php endif; ?>
            </select>
        </div>
        <nav aria-label="Page navigation example">
            <?php echo $pagination; ?>
        </nav>

    </div>
    <!-- End Filter Bar -->
</div>
</div>
</div>


<!-- start footer Area -->
<?php $this->load->view('user/template/4_footer'); ?>
<!-- End footer Area -->

<script src="<?php echo base_url('assets/js/vendor/jquery-3.6.4.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
    integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous">
</script>
<script src="<?php echo base_url('assets/js/vendor/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.ajaxchimp.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.nice-select.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.sticky.js') ?>"></script>
<script src="<?php echo base_url('assets/js/nouislider.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.magnific-popup.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/owl.carousel.min.js') ?>"></script>
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<!-- <script src="<?php echo base_url('assets/js/gmaps.min.js') ?>"></script> -->
<script src="<?php echo base_url('assets/js/main.js') ?>"></script>
<!-- <script src="<?php echo base_url('assets/js/detectmobilebrowser.js') ?>"></script> -->

<script>
$(document).ready(function() {

    var nowDate = Date.now();
    var limitDate = "<?= $notif_last[0]->off_date ?>";

    var jslimit = new Date(limitDate);
    var jsnow = new Date(nowDate);
    var showed_session = "<?= $this->session->userdata('is_showed') ?>";
    if (showed_session == "") {
        showed_session = 0;
    }

    if (showed_session == 0) {
        if (jsnow < jslimit) {
            $('#modalNotif').modal('show');
            <?= $this->session->set_userdata('is_showed', 1); ?>
        }
    }

});
</script>


<script type="text/javascript">
cek();

function cek() {
    var data = <?php echo $ttd_belum ?>;
    // console.log(data);
    if (data > 2) {
        $('#mttd_terima').modal('show');
    }

}

function showItemqty() {
    var data = new FormData();

    data.append("showItem", $('#showItem').val());

    $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>set_showItem',
        dataType: "JSON",
        data: data,
        processData: false,
        contentType: false,
        success: function(data) {
            location.reload();
        },
        error: function(data, jqXHR, textStatus, errorThrown) {
            alert('Error adding / update data');
            console.log(textStatus);
        },
    });
    return false;
}

function showItemqty2() {
    var data = new FormData();

    data.append("showItem", $('#showItem2').val());

    $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>set_showItem',
        dataType: "JSON",
        data: data,
        processData: false,
        contentType: false,
        success: function(data) {
            location.reload();
        },
        error: function(data, jqXHR, textStatus, errorThrown) {
            alert('Error adding / update data');
            console.log(textStatus);
        },
    });
    return false;
}



function tambahitem(id) {
    // preventDefault();
    var string = '#prod_id_' + id;
    var prod_id = $(string).val();
    var qty = 1;

    $.ajax({
        type: "POST",
        url: '<?php echo base_url() ?>/add_to_cart',
        dataType: "JSON",
        data: {
            prod_id: prod_id,
            qty: qty
        },
        success: function(data) {
            console.log(data);
            if (data.error) {
                if (data.pesan == "error barang habis") {
                    $('#mgagalHabis').modal('show');
                }
            }
            if (data.success) {

                $('#mSuksesSimpan').modal('show');
            }
        },
        error: function(data, jqXHR, textStatus, errorThrown) {
            alert('Error adding / update data');
            console.log(textStatus);
        },
    });


    return false;
}
</script>



</body>

</html>