<style>
/*the container must be positioned relative:*/
.custom-select {
  position: relative;
  font-family: Arial;
}

.custom-select select {
  display: none; /*hide original SELECT element:*/
}

.select-selected {
  background-color: DodgerBlue;
}

/*style the arrow inside the select element:*/
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}

/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}

/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
  user-select: none;
}

/*style items (options):*/
.select-items {
  position: absolute;
  background-color: DodgerBlue;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}

/*hide the items when the select box is closed:*/
.select-hide {
  display: none;
}

.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
}
/* form */
.home-form-w3ls .form-control {
    font-size: 15px;
    border: none;
    -webkit-box-shadow: 1px 3px 5px rgba(0, 0, 0, 0.28);
    -moz-box-shadow: 1px 3px 5px rgba(0, 0, 0, 0.28);
    box-shadow: 1px 3px 5px rgba(0, 0, 0, 0.28);
    outline: none;
    letter-spacing: 1px;
    color: #000;
    box-sizing: border-box;
    border-radius: 0px;
    -webkit-border-radius: 0px;
    -o-border-radius: 0px;
    -ms-border-radius: 0px;
    -moz-border-radius: 0px;
    padding: 12px;
}

.home-form-w3ls textarea.form-control {
    height: 46px;
}

.home-form-w3ls button {
    background: #ff7f62;
    color: #fff;
    padding: 13px 40px;
    margin-top: 2em;
    border: none;
    outline: none;
    letter-spacing: 1px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 0;
    -webkit-border-radius: 0;
    -o-border-radius: 0;
    -ms-border-radius: 0;
    -moz-border-radius: 0;
}

/* //form */
</style>

<body id="page">
        <ul class="cb-slideshow">
            <li><span>Image 01</span></li>
            <li><span>Image 02</span></li>
            <li><span>Image 03</span></li>
            <li><span>Image 04</span></li>
        </ul>
        <div class="container">
            <!-- Codrops top bar -->
            <header>
                <h1><?= $title ?></h1>
                <div class="s003">
                <div class="home-form-w3ls mt-5">
                    <form action="<?= base_url('opac/carijuduladv')?>" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="judul" placeholder="judul"
                                  >
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="pengarang" placeholder="pengarang"
                                    >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="penerbit" placeholder="penerbit"
                                    >
                                </div>
                                <div class="form-group">
                                    <input class="form-control" type="text" name="isbn" placeholder="isbn"
                                    >
                                </div>                              
                            </div>
                        </div>
                        <button type="submit" class="btn_apt btn">Pencarian</button><br>
                        <i><a href="<?= base_url('opac')?>">Simple Search</a></i>
                    </form>
                </div>
    </div>
</header>
        </div>
    </body>