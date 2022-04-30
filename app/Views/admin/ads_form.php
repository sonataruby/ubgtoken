<?= $this->extend("App\Views\admin\layout") ?>
<?= $this->section('main') ?>
<?= $this->section('javascript') ?>
<link rel="stylesheet" type="text/css" href="/assets/editer/summernote.css">
<link rel="stylesheet" type="text/css" href="/assets/editer/summernote-lite.css">
<script src="/assets/editer/summernote.js" referrerpolicy="origin"></script>
<script>

  $(document).ready(function() {
      $('.summernote').summernote({
        height: 950
      });
    });
  </script>
<?= $this->endSection() ?>

<form  action="<?php echo admin_url("ads/save/".$data->id);?>" method="post" enctype="multipart/form-data">

<div class="card">
    <div class="card-header pb-0 border-bottom">
              <div class="d-lg-flex">
                <div>
                  <h5 class="mb-0">All Products</h5>
                  <p class="text-sm mb-0">
                    A lightweight, extendable, dependency-free javascript HTML table plugin.
                  </p>
                </div>
                <div class="ms-auto my-auto mt-lg-0 mt-4">
                    <button type="submit" class="btn btn-outline-primary btn-sm mb-0">
                      Public Data
                    </button>
                </div>
              </div>
            </div>
    <div class="card-body">

        <div class="row">
            <div class="col-7">
                
                <div class="mb-3 row">
                    <div class="col-12 col-form-label">Name</div>
                    <div class="col-12">
                      <input name="form[name]" type="text" value="<?php echo $data->name;?>" class="form-control">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-12 col-form-label">Item ID</div>
                    <div class="col-12">
                      <input name="form[item_id]" type="text" value="<?php echo $data->item_id;?>" class="form-control">
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-sm-12 col-form-label">Price</div>
                    <div class="col-sm-12">
                      <input name="form[price]" type="text" value="<?php echo $data->price;?>" class="form-control">
                    </div>
                </div>


                <div class="mb-3 row">
                    <div class="col-sm-12 col-form-label">Night</div>
                    <div class="col-sm-12">
                      <input name="form[night]" type="text" value="<?php echo $data->night;?>" class="form-control">
                    </div>
                </div>


                <div class="mb-3 row">
                    <div class="col-sm-12 col-form-label">Bed</div>
                    <div class="col-sm-12">
                      <input name="form[bed]" type="text" value="<?php echo $data->bed;?>" class="form-control">
                    </div>
                </div>


                


                <div class="mb-3 row">
                    <div class="col-sm-12 col-form-label">Star</div>
                    <div class="col-sm-12">
                      <input name="form[star]" type="text" value="<?php echo $data->star;?>" class="form-control">
                    </div>
                </div>

                 <div class="mb-3 row">
                    <div class="col-sm-12 col-form-label">Ads Type</div>
                    <div class="col-sm-12">
                      <select name="form[ads_type]" class="form-select">
                        <option value="marketplance" <?php echo $data->ads_type;?>>Marketplance </option>
                        <option value="nftmarket" <?php echo $data->ads_type;?>>Nftmarket</option>
                      </select>
                    </div>
                </div>
               


            </div>
            <div class="col-sm-5">

                <div class="mb-3 row">

                    <?php echo components("upload_image",["id" => "Banner","name" => "banner", "image" => $data->banner]);?>
                </div>

                

                

                

            </div>
        </div>


    </div>
    <div class="card-footer border-top">
        <button type="submit" class="btn btn-sm btn-primary">Public Data</button>
    </div>
</div>
</form>

<?= $this->endSection() ?>