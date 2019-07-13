<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Niaga Logistic</title>
    <link rel="icon" href="<?php echo base_url().'assets/img/favicon.png'?>">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
    <!-- animate CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/animate.css'?>">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/owl.carousel.min.css'?>">
    <!-- themify CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/themify-icons.css'?>">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/flaticon.css'?>">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/slick.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/nice-select.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/all.css'?>">
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/intlInputPhone.min.css'?>">
    <!-- style CSS -->
    <link rel="stylesheet" href="<?php echo base_url().'assets/css/style.css'?>">

    <style>
        .bantusection{
            height: 100vh;
            max-height: 100vh;
            min-height: 100vh;
            padding: 100px;

        }
    </style>
</head>

<body>
    <!--::header part start::-->
    <!-- <header class="main_menu home_menu">
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header> -->
    <!-- Header part end-->

    <!-- banner part start-->
    <section class="banner_part">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h1>Run on the <br>
                                rocky streets</h1>
                            <p>Fast landing delivery <br>
                                for your goods business </p>
                            <div class="md-form">
                                <form onsubmit="search()" method="post">
                                    <i class="fas fa-user prefix"></i>
                                    <label for="inputIconEx2" style="color:white">No Do Pengiriman</label>
                                    <input type="text" placeholder="Write Here !!!" id="no_do" class="form-control">
                                    </br>
                                    <button  class="btn btn-outline-warning btn btn-warning">Search</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner part start-->

    <section class='bantusection'>
        <div class="container">
            <div class="row">
                <div class = "col-md-12">
                    <div class="table-responsive" id="tableresult">
                    </div>        
                </div>        
            </div>
        </div>
    </section>



<div class="modal" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-boordered" id="tabel_modal">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>




    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="<?php echo base_url().'assets/js/jquery-1.'?>12.1.min.js"></script>
    <!-- popper js -->
    <script src="<?php echo base_url().'assets/js/popper.mi'?>n.js"></script>
    <!-- bootstrap js -->
    <script src="<?php echo base_url().'assets/js/bootstrap'?>.min.js"></script>
    <!-- easing js -->
    <script src="<?php echo base_url().'assets/js/jquery.ma'?>gnific-popup.js"></script>
    <!-- swiper js -->
    <script src="<?php echo base_url().'assets/js/masonry.p'?>kgd.js"></script>
    <!-- particles js -->
    <script src="<?php echo base_url().'assets/js/owl.carou'?>sel.min.js"></script>
    <!-- swiper js -->
    <script src="<?php echo base_url().'assets/js/gijgo.min'?>.js"></script>
    <script src="<?php echo base_url().'assets/js/jquery.ni'?>ce-select.min.js"></script>
    <script src="<?php echo base_url().'assets/js/intlInput'?>Phone.min.js"></script>
    <!-- contact js -->
    <script src="<?php echo base_url().'assets/js/jquery.aj'?>axchimp.min.js"></script>
    <script src="<?php echo base_url().'assets/js/jquery.fo'?>rm.js"></script>
    <script src="<?php echo base_url().'assets/js/jquery.va'?>lidate.min.js"></script>
    <script src="<?php echo base_url().'assets/js/mail-scri'?>pt.js"></script>
    <script src="<?php echo base_url().'assets/js/contact.j'?>s"></script>
    <!-- custom js -->
    <script src="<?php echo base_url().'assets/js/custom.js'?>"></script>


<script type="text/javascript">
    function search(){
        event.preventDefault();
        const bantu = $('#no_do').val();
        // $('div#tableresult').html('cuk')
        if (bantu == null || bantu == undefined || bantu == '') {
            alert('Tidak Boleh Kosong');
            return;
        }
        $.ajax({
            url:'<?= base_url()?>index.php/Welcome/find_status',
            method : "post",
            data:{
                bantu
            },
            // dataType:'application/json',
            success : function(responeData){


                // this functin for move to next page automaticly
                $('html, body').animate({
                    scrollTop: $("#tableresult").offset().top
                    }, 
                    2000);


                let rowtable =''
                responeData.map((data, no) =>{
                    rowtable += `
                    <tr>
                        <td>${no+1}</td>
                        <td>
                            <a href="#" onclick=showModal(${data.id_order});>${data.no_do}</a>
                        </td>
                        <td>${data.nama_cusstomer}</td>
                        <td>${data.nama_driver}</td>
                        <td>${data.no_kendaraan}</td>
                        <td>${data.tanggal_selesai_order}</td>
                    </tr>
                    `

                })
                const resulttable = `
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>No Do</td>
                            <td>Customer</td>
                            <td>Driver</td>
                            <td>No Kendaraan</td>
                            <td>Tanggal Tiba</td>
                        </tr>
                    </thead>

                <tbody> ${rowtable}</tbody>
                </table>
                `
                $('div#tableresult').html(resulttable)

               
            }
        });



    }

    

    function showModal(id_order){
        event.preventDefault();
        $.ajax({
            url:'<?= base_url()?>index.php/Welcome/get_detail/'+id_order,
            method : "get",
            success : function(respone_getdetail){
                $('#myModal').modal('show');
                let rowtable =''
                respone_getdetail.map((data, no) =>{
                    rowtable += `
                    <tr>
                        <td>${no+1}</td>
                        <td>${data.status}</td>
                        <td>${data.tgl_update}</td>
                    </tr>
                    `
                })

                $('#tabel_modal tbody').html(rowtable);
            }
        })


    }
</script>



</body>
</html>