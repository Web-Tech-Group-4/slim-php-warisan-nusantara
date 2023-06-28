<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Warisan Tradisional Bumi Nusantara</title>
    <style>
      .logo {
        width: 100px;
        height: 100px;
        border-radius: 50%;
      }
    </style>

    <!-- Latest compiled and minified CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#"
          ><img class="logo" src="images/logo.jpg" alt="gambar"
        /></a>

        <!--navbar collapse-navbar-->
        <div class="" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a
              class="nav-item nav-link"
              href="additem.html"
              data-category="all collections"
              >Add Item</a
            >
            <a
              class="nav-item nav-link"
              href="nusantara.php"
              data-category="all collections"
              >all collections</a
            >
            <a
              class="nav-item nav-link"
              href="nusantara.php"
              data-category="weapons and arms"
              >weapons and arms</a
            >
            <a
              class="nav-item nav-link"
              href="nusantara.php"
              data-category="household items"
              >household items</a
            >
            <a class="nav-item nav-link" href="#" data-category="textiles"
              >textiles</a
            >
            <a
              class="nav-item nav-link"
              href="#"
              data-category="carving and woodworks"
              >carving and woodworks</a
            >
          </div>
        </div>
      </div>
    </nav>

    <div class="container">
      <div class="row">
        <div class="col">
          <h1 id="view-collection">update items <?php echo $_GET['id']; ?></h1>
          <div>
            <form id="update-item-form" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="item-name" class="form-label">Item Name:</label
                ><input
                  type="text"
                  class="form-control"
                  id="item-name"
                  name="item-name"
                />
              </div>
              <div class="mb-3">
                <label for="item-category" class="form-label"
                  >Item Category:</label
                ><input
                  type="text"
                  class="form-control"
                  id="item-category"
                  name="item-category"
                />
              </div>
              <div class="mb-3">
                <label for="item-date" class="form-label">Item Date:</label
                ><input
                  type="text"
                  class="form-control"
                  id="item-date"
                  name="item-date"
                />
              </div>
              <div class="mb-3">
                <label for="item-description" class="form-label"
                  >Item Description:</label
                ><textarea
                  class="form-control"
                  id="item-description"
                  name="item-description"
                  rows="4"
                ></textarea>
              </div>
              <div class="mb-3">
                <label for="item-image" class="form-label">Item Image:</label>
                <input
                  type="file"
                  class="form-control"
                  id="item-image"
                  name="item-image"
                  accept="image/*"
                />
              </div>
              <input type="hidden" id="item-id" name="item-id" value="<?php echo $_GET['id']; ?>" />


              <button type="submit" class="btn btn-primary">Update Item</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
  <script
    src="https://code.jquery.com/jquery-3.6.4.js"
    integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"
  ></script>

  <script src="script/updateitem.js"></script>
  <script src="script/script.js"></script>
</html>
